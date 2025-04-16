<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function logout()
    {
        $user = auth()->user();
        $user->setRememberToken(null); // This sets the token to null.
        $user->save();
        auth()->logout();

        return redirect('/')->with('success', 'You have successfully logged out');
    }
    public function showDashboard()
    {
        return view('dashboard');
    }
    public function login(Request $request)
    {
        //dd($request->all());
        $outgoingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember' => ['nullable', 'boolean']
        ]);
        $remember = $request->get('remember');

        if (
            Auth::attempt(
                [
                    'email' => $outgoingFields['email'],
                    'password' => $outgoingFields['password']
                ],
                $remember
            )
        ) {
            $request->session()->regenerate();

            // If the user did NOT want to be remembered, clear the remember token.
            if (!$remember) {
                $user = auth()->user();
                $user->setRememberToken(null);
                $user->save();
            }

            return redirect('/dashboard')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/login')->with('failure', 'Incorrect login attempt.');
        }
    }
    public function register(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:25', Rule::unique('users', 'name')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'confirmed']
            ]
        );
        User::create($incomingFields);
        return redirect('/login')->with('success', 'You have created a new account. Welcome!');
    }
    public function showRegister()
    {
        return view('register');
    }

    public function showLogin()
    {
        return view('login');
    }
}
