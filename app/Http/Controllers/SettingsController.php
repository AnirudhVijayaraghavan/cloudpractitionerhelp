<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function showSettings()
    {
        if (auth()->check()) {
            return view('settings');
        } else {}

    }
}
