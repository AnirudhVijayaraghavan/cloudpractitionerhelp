<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function updateProfilePass(Request $request, User $id)
    {
        $gateAuthorization = Gate::inspect('update', $id);

        if ($gateAuthorization->allowed()) {
            $incomingFields = $request->validate([
                "current_password" => ['required'],
                "password" => ['required', 'min:8', 'confirmed']
            ]);

            $correctCurrentPassword = Hash::check($incomingFields['current_password'], $id->password);
            if ($correctCurrentPassword) {
                $id->password = Hash::make($incomingFields['password']);
                $id->save();
                return back()->with('success', 'Your password has been updated.');
            } else {
                return back()->with('failure', 'Incorrect current password.');
            }
        } else {
            return back()->with('failure', 'Unauthorized.');
        }
    }
    public function updateProfileInfo(Request $request, User $id)
    {
        $gateAuthorization = Gate::inspect('update', $id);

        if ($gateAuthorization->allowed()) {
            $incomingFields = $request->validate([
                "name" => ['nullable', 'min:3', 'max:25'],
                "email" => ['nullable', 'email', Rule::unique('users', 'email')]
            ]);

            $id->name = $incomingFields['name'] ?? $id->name;
            $id->email = $incomingFields['email'] ?? $id->email;
            $id->save();
            return back()->with('success', 'Your details have been updated.');
        } else {
            return back()->with('failure', 'Unauthorized.');
        }
    }
    public function showProfile(User $id)
    {
        $existCheck = User::where("id", $id->id)->first();
        //return $existCheck;

        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        } else {
            if ($existCheck) {
                return view('profile', [
                    'userData' => $existCheck
                ]);
            }
        }
    }
}
