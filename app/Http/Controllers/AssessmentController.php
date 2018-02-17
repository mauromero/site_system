<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hazard;
use App\KitLocation;
use App\MedicalFacility;
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

    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hazards = Hazard::all();
        $med_facilities = MedicalFacility::all();
        return view('forms.assessments', compact('hazards', 'med_facilities') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
         Assessment::create(request([
            'job_number'=> request('job_number'),
            'start_date'=> request('start_date'),
            'exp_date'=> request('exp_date'),
            'location' => request('location'),
            'gps_n'=> request('gps_n'),
            'gps_w'=> request('gps_w'),
            'usa_ticket'=> request('usa_ticket'),
            'emergency_phone'=> request('emergency_phone'),
            'kit_location_id'=> request('kit_location_id'),
            'med_facility_id'=> request('med_facility_id'),
            'water_sources'=> request('water_sources'),
            'bleed_off'=> request('bleed_off'),
            'cutting'=> request('cutting'),
            'test_hole'=> request('test_hole')
         ]));
         return redirect('/');
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
