<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hazard;
use App\KitLocation;
use App\Facility;
use App\Assessment;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hazards = Hazard::all();
        $kit_locations = KitLocation::all();
        $facilities = Facility::all();
        return view('forms.assessments', compact('hazards','kit_locations', 'facilities') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Assessment::create(request([
            "job_number",
            "start_date",
            "exp_date",
            "location" ,
            "gps_n",
            "gps_w",
            "usa_ticket",
            "emergency_phone",
            "kit_location_id",
            "med_facility_id",
            "water_sources",

         ]));
         return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
