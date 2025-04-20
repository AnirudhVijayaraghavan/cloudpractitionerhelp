<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function showTrack($track) {
        return view('education-center');
    }
    public function showEducationSection() {
        return view('education-center');
    }
}
