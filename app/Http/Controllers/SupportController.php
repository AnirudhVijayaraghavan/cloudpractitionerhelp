<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Log;
use App\Jobs\NewCustomerSupportMailJob;

class SupportController extends Controller
{
    //
    public function create()
    {
        return view('support.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:1',
        ]);
        $data['user_id'] = auth()->id();

        if ($request->input('email') !== auth()->user()->email) {
            return back()->with('failure', 'You may only submit tickets under your own email address.');
        }

        $newTicket = SupportTicket::create($data);
        Log::info("new ticket created");
        // Enqueue the email:
        NewCustomerSupportMailJob::dispatch($newTicket);

        return redirect()->route('dashboard')
            ->with('success', 'Your ticket has been sent! We’ll be in touch shortly.');
    }
}
