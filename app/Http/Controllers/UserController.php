<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function logout() {
        auth()->logout();
        return redirect('/')->with('success','You have successfully logged out');
    }
    public function showDashboard()
    {
        return view('dashboard');
    }
    public function login(Request $request)
    {
        $outgoingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (
            auth()->attempt(
                [
                    'email' => $outgoingFields['email'],
                    'password' => $outgoingFields['password']
                ]
            )
        ) {
            $request->session()->regenerate();
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
