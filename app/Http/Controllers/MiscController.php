<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscController extends Controller
{
    //
    public function tos() {
        return view('tos');
    }
    public function privacy() {
        return view('privacy');
    }
}
