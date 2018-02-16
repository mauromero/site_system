<?php

namespace App\Http\Controllers;

use App\Facility;

class FacilityController extends Controller
{
    public function index(){
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function details( Facility $facility){
        return view('facilities.details',compact ('facility'));
    }
}
