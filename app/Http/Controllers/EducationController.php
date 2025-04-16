<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function showEducationSection() {
        return view('education-center');
    }
}
