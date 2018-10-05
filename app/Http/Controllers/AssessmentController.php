<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Hazard;
use App\KitLocation;
use App\Assessment;
use App\Customer;
use App\Task;
use App\hazard_task;
use Illuminate\Support\Facades\Storage;
use Gate;

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
        $user= auth()->user();
        if($user->can('view',$user)){

            $assessments = new Assessment;
            $queries = [];

            if(request()->has('job_number')){
                $jobNumber = request('job_number');
                $assessments = Assessment::where('job_number','like',$jobNumber.'%');  
                $queries['job_number'] = $jobNumber;
            }

            if(request()->has('company')){
                $assessments = Assessment::with('Customer:id,company')
                    ->whereHas('Customer',function($customer){
                        $company = request('company');
                        $customer->where('company','like',$company.'%');
                    });
                $queries['company']=request('company');
            }

            if(request()->has('userName')){
                $assessments = Assessment::with('User:id,name,last_name')
                    ->whereHas('User',function($user){
                        $userName = request('userName');
                        $user->where('name','like','%'.$userName.'%')
                        ->orWhere('last_name','like','%'.$userName.'%');
                    });           
                $queries['userName']=request('userName');
            }

            

            $assessments = $assessments->sortable(['created_at' => 'desc'])->paginate(5)->appends($queries);
            return view('forms.assessments.assessments_index', compact('assessments'));

            

        }

        return redirect('home');
        
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( auth()->user() ){
            $customers = Customer::orderBy('name', 'asc')->get();
            return view('forms.assessments.assessments_create', compact('customers') );
        }else{
            return redirect('/home');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        if( auth()->user() ){
         $user_id = auth()->user()->id;
         $newAssessment = Assessment::create([
            'job_number'=> request('job_number'),
            'start_date'=> request('start_date'),
            'exp_date'=> request('exp_date'),
            'location' => request('location'),
            'gps_n'=> request('gps_n'),
            'gps_w'=> request('gps_w'),
            'usa_ticket'=> request('usa_ticket'),
            'usa_marked'=> request('usa_marked'),
            'emergency_phone'=> request('emergency_phone'),
            'kit_location'=> request('kit_location'),
            'medical_facility_name'=> request('medical_facility_name'),
            'medical_facility_location'=> request('medical_facility_location'),
            'water_sources'=> request('water_sources'),
            'bleed_off'=> request('bleed_off'),
            'cutting'=> request('cutting'),
            'test_hole'=> request('test_hole'),
            'user_id'=> $user_id,
            'customer_id'=> request('customer_id'),
            'created_at' => Carbon::now()
         ]);
  
         return redirect('/assessments/edit/'.$newAssessment->id);
        }else{
            return redirect('/home');
        }  
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
    public function edit(Assessment $assessment)
    {
        $user = auth()->user();
        $assessment = Assessment::find($assessment->id);
        $customers = Customer::all();
        $tasks = Task::where('assessment_id',$assessment->id)->with('hazards')->get();
        $hazards = Hazard::orderBy('name', 'asc')->get();
        $tasks_hazards = hazard_task::all();

        if (  $user->can('edit',$assessment )){
            if ( $assessment->submitted){
                
                if($user->can('edit_submitted',$assessment)){
                    return view('forms.assessments.assessments_edit', compact('assessment', 'customers', 'tasks', 'hazards', 'tasks_hazards'));
                }else{
                    return view('forms.assessments.assessments_preview', compact('assessment', 'customers', 'tasks', 'hazards', 'tasks_hazards'));
                }
            }else{
                return view('forms.assessments.assessments_edit', compact('assessment', 'customers'));
            }
        }else{
            return view('forms.assessments.assessments_preview', compact('assessment', 'customers', 'tasks', 'hazards', 'tasks_hazards'));
        }  
   
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
            $assessment = Assessment::find($id);
            $user = auth()->user();
/* If request is submitted */
            if($request->submit){

                $this->validate(request(),[
                    'job_number' => 'max:20|unique:assessments,job_number,'.$assessment->id,
                    'location' => 'required|max:255',
                    'gps_n' => 'required|max:15',
                    'gps_w' => 'required|max:15',
                    'usa_ticket' => 'required|max:45',
                    'usa_marked' => 'required|max:45',
                    'emergency_phone' => 'required|max:20',
                    'kit_location' => 'required|max:255',
                    'medical_facility_name' => 'required|required|max:255',
                    'medical_facility_location' => 'required|max:255',
                    'water_sources' => 'required|max:255',
                    'bleed_off' => 'required|max:255',
                    'cutting' => 'required|max:255',
                    'test_hole' => 'required|max:255',
                ]);

                if ($user->can('update',$assessment) ){
                    $assessment->start_date = request('start_date');
                    $assessment->job_number = request('job_number');
                    $assessment->exp_date = request('exp_date');
                    $assessment->location = request('location');
                    $assessment->gps_n = request('gps_n');
                    $assessment->gps_w = request('gps_w');
                    $assessment->usa_ticket = request('usa_ticket');
                    $assessment->usa_marked = request('usa_marked');
                    $assessment->emergency_phone = request('emergency_phone');
                    $assessment->kit_location = request('kit_location');
                    $assessment->medical_facility_name = request('medical_facility_name');
                    $assessment->medical_facility_location = request('medical_facility_location');
                    $assessment->water_sources = request('water_sources');
                    $assessment->bleed_off = request('bleed_off');
                    $assessment->cutting = request('cutting');
                    $assessment->test_hole = request('test_hole');
                    $assessment->customer_id = request('customer_id');
                    $assessment->submitted = true;
                    $assessment->updated_at = Carbon::now();
                    
                    $assessment->created_at == null ? $assessment->created_at = Carbon::now() : $assessment->created_at;
                    $assessment->save(); 
                    return redirect('/users/forms');
                }
            }
        /* If request is Saved */
            elseif($request->save){
                $this->validate(request(),[
                    'job_number' => 'nullable|max:20|unique:assessments,job_number,'.$assessment->id,
                    'location' => 'max:255',
                    'gps_n' => 'max:15',
                    'gps_w' => 'max:15',
                    'usa_ticket' => 'max:45',
                    'usa_marked' => 'max:45',
                    'emergency_phone' => 'max:20',
                    'kit_location' => 'max:255',
                    'medical_facility_name' => 'max:255',
                    'medical_facility_location' => 'max:255',
                    'water_sources' => 'max:255',
                    'bleed_off' => 'max:255',
                    'cutting' => 'max:255',
                    'test_hole' => 'max:255',
                ]);
                if ( $user->can('update',$assessment) ){
                    $assessment = Assessment::find($id);
                    $assessment->start_date = request('start_date');
                    $assessment->job_number = request('job_number');
                    $assessment->exp_date = request('exp_date');
                    $assessment->location = request('location');
                    $assessment->gps_n = request('gps_n');
                    $assessment->gps_w = request('gps_w');
                    $assessment->usa_ticket = request('usa_ticket');
                    $assessment->usa_marked = request('usa_marked');
                    $assessment->emergency_phone = request('emergency_phone');
                    $assessment->kit_location = request('kit_location');
                    $assessment->medical_facility_name = request('medical_facility_name');
                    $assessment->medical_facility_location = request('medical_facility_location');
                    $assessment->water_sources = request('water_sources');
                    $assessment->bleed_off = request('bleed_off');
                    $assessment->cutting = request('cutting');
                    $assessment->test_hole = request('test_hole');
                    $assessment->customer_id = request('customer_id');
                    $assessment->updated_at = Carbon::now();
                    $request->submitted==null ? $assessment->submitted = false : $assessment->submitted = true;
                    $assessment->save();
                    if(Gate::allows('isAdmin')){
                        return redirect('assessments');
                    }else{
                        return redirect('/users/forms');
                    }
                }else{
                    return redirect('/home');
                } 
            }else{
                return redirect('/home');
            } 

    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        if(auth()->user()){
            $assessment = Assessment::find($id);
            if ( $assessment->user_id == auth()->user()->id || auth()->user()->role == 'admin'){
                $customers = Customer::all();
                $tasks = Task::where('assessment_id',$assessment->id)->with('hazards')->get();
                $hazards = Hazard::orderBy('name', 'asc')->get();
                $tasks_hazards = hazard_task::all();
                return view('forms.assessments.assessments_delete', compact('assessment', 'customers', 'tasks', 'hazards', 'tasks_hazards'));
            }else{
                return redirect('/home');
            }  
        }else{
            return redirect('/home');
        }  

    }

    public function destroy($id)
    {
        if(auth()->user()){
            $assessment = Assessment::find($id);
            if ( $assessment->user_id == auth()->user()->id || auth()->user()->role == 'admin'){
                if($assessment->image_name){
                    Storage::disk('public')->delete('locations/'.$assessment->image_name);
                }
                $assessment->delete();
                return redirect('/users/forms');
            }else{
                return redirect('/home');
            }  
        }else{
            return redirect('/home');
        }  
    }
    
    public function tasks(Assessment $assessment)
    {
        if(auth()->user()){
            $assessment = Assessment::find($id);
            if ( $assessment->user_id == auth()->user()->id){
                $tasks = Task::where('assessment_id',$assessment->id)->with('hazards')->get();
                $hazards = Hazard::orderBy('name', 'asc')->get();
                $tasks_hazards = hazard_task::all();
                return view('forms.assessments.assessments_tasks', compact('assessment','hazards', 'tasks','tasks_hazards'));
            }else{
                return redirect('/home');
            }  
        }else{
            return redirect('/home');
        }         
    }

    public function tasks_save(Assessment $assessment)
    {
            $this->validate(request(),[
                'name' => 'required'
            ]);
            $user = auth()->user();
            $assessment = Assessment::find($assessment->id);
            if ($assessment->user_id == $user->id || $user->role == 'admin' ) {
                $new_task=Task::create([
                    'assessment_id'=> $assessment->id,
                    'name' => request('name'),
                    'updated_at'=> Carbon::now(),
                    'created_at' => Carbon::now()
                    ]);
                return redirect('/assessments'.'/'.$assessment->id.'/tasks');
            }else{
                return redirect('/home');
            }  
    }

    public function image_show($id){
            $user = auth()->user();
            $assessment = Assessment::find($id);
            if ($assessment->user_id == $user->id  || $user->role == 'admin' ){
                return view('forms.assessments.assessments_image', compact('assessment'));
            }else{
                return redirect('home');
            }

    }

    public function image_store(Request $request, $id)
    {
            $this->validate(request(),[
                'location_img' => 'required'
            ]);
                $user = auth()->user();
                $assessment = Assessment::find($id);
                if ($assessment->user_id == $user ->id || $user->role == 'admin' ){
                    if($assessment->image_name){
                        Storage::disk('public')->delete('locations/'.$assessment->image_name);
                    }

                    $file_name = $request->file('location_img')->hashName();
                    request()->file('location_img')->store('locations', 'locations');
                    $assessment = Assessment::find($id);
                    $assessment->image_name = $file_name;
                    $assessment->updated_at = Carbon::now();
                    $assessment->save(); 
                    return view('forms.assessments.assessments_image', compact('assessment'));
                }else{
                    return redirect('home');
            }  
 
    }

    public function image_delete($id)
    {
        if(auth()->user()){
                $assessment = Assessment::find($id);
                if ($assessment->user_id == auth()->user()->id){
                    if($assessment->image_name){
                        Storage::disk('public')->delete('locations/'.$assessment->image_name);
                        $assessment->image_name = null;
                        $assessment->updated_at = Carbon::now();
                        $assessment->save(); 
                    }
                    return view('forms.assessments.assessments_image', compact('assessment'));
                }else{
                    return redirect('home');
            }  
        }else{
            return redirect('home');
        }      
    }


}
