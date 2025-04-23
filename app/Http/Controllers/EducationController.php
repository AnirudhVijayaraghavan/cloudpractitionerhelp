<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function showTrack($track) {
        if ($track !== 'aws-sa' && $track !== 'aws-ccp') {
            return redirect()->route('educationsection')->with('failure','Track does not exist.');
        }
        return view('track',[
            'track' => $track
        ]);
    }
    public function showEducationSection() {
        return view('education-center');
    }
}
