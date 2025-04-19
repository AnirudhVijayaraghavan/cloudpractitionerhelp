<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Exception\SignatureVerificationException;

class PremiumController extends Controller
{
    //
    public function show()
    {
        return view('checkout.show');
    }

    public function checkoutCredits(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $credits = $request->input('credits');
        $amount = $request->input('amount');
        $session = CheckoutSession::create([
            'payment_method_types' => ['card'],
            'client_reference_id' => Auth::id(),
            'metadata' => ['credits' => $credits],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => '10 Quiz Credits'],
                        'unit_amount' => $amount,        // $10.00
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('checkoutsuccess') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkoutcancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if ($sessionId && !session()->has("paid_{$sessionId}")) {
            // 1) Set your Stripe key
            Stripe::setApiKey(config('services.stripe.secret'));

            // 2) Retrieve the session from Stripe
            $session = CheckoutSession::retrieve($sessionId);

            // 3) Pull the credits count from metadata
            $credits = (int) ($session->metadata->credits ?? 0);

            if ($credits > 0) {
                // 4) Increment the user's credits by that dynamic amount
                Auth::user()->credits += $credits;
                Auth::user()->save();
            }

            // 5) Remember we've paid this session so refreshing won't double‑credit:
            session()->put("paid_{$sessionId}", true);
        }

        return view('checkout.success', [
            'credits' => $credits
        ]);
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

    public function webhook(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (SignatureVerificationException $e) {
            return response('Invalid signature', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $userId = $session->client_reference_id;
            $credits = (int) ($session->metadata->credits ?? 0);

            if ($userId && $credits > 0) {
                $user = User::find($userId);
                if ($user) {
                    // Idempotency: you might record the session ID in a table 
                    // to ensure you don’t credit twice for the same session.
                    $user->increment('credits', $credits);
                }
            }
        }

        return response('Webhook received', 200);
    }

}
