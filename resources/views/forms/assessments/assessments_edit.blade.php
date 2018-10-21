@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('layouts.errors')
    
    <div class="row">
    <div class="col-sm-12"> 
        <nav class="nav nav-tabs">
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Form</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/tasks">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
        </nav>

        <div class="card">
            <div class="card-body">
            <form method="POST" action="/assessments/edit/{{ $assessment->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                    <div class="card bg-light mb-2" >
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label> Created by :&nbsp;</label>{{ $assessment->user->name }}&nbsp;{{ $assessment->user->last_name }}<br/>
                                        <label> Created date:&nbsp;</label>{{ $assessment->created_at->toFormattedDateString() }}<br/>                             
                                        <label> Updated date:&nbsp;</label>{{ $assessment->updated_at->toFormattedDateString() }}<br/>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($assessment->submitted)
                                        <div class="form-group form-check">                            
                                            <input class="form-check-input is-valid" type="checkbox" name="submitted" id="submitted"  value="1" checked>
                                        <label class="form-check-label" for="submitted">
                                            Completed
                                        </label>
                                        </div> 
                                        <label> Completed date:&nbsp;</label>{{ $assessment->submitted_at->toFormattedDateString() }}
                                        @else
                                        <button type="submit" class="btn btn-primary pull-left" name="submit" value="submit">Mark as complete</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

               
                       <div class="form-row">
                             <div class="form-group col-sm-4">
                                        <label for="job_number">Job Number</label>
                                        <div>
                                            <input type="text" class="form-control" id="job_number" name="job_number"  placeholder="#"  value="{{ old('job_number',$assessment->job_number) }}" >
                                        </div>
                                    </div>

                                <div class="form-group col-sm-8">
                                <label for="customer_id">Custormer</label>
                                <select class="form-control" id="customer_id"  name="customer_id">
                                    <option value="">---</option>
                                    @foreach ($customers as $customer) 
                                        <option value="{{ $customer->id }}"
                                            @if($assessment->customer_id == $customer->id)
                                                selected
                                            @endif    
                                        >{{$customer->company}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-sm-6">
                                <label for="start_date">Start Date</label>
                                <div>
                                @if( $assessment->start_date || old('start_date') )
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old( 'start_date',\Carbon\Carbon::parse($assessment->start_date)->toDateString() ) }}" >
                                @else
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="" >
                                @endif 
                                </div>
                            </div>  

                            <div class="form-group col-sm-6">
                                <label for="exp_date">Exp. Date</label>
                                <div>
                                @if( $assessment->exp_date || old('exp_date') )
                                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ old( 'exp_date',\Carbon\Carbon::parse($assessment->exp_date)->toDateString() ) }}" >
                                @else
                                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="" >
                                @endif 
                                </div>
                            </div> 

                            <div class="form-group col-sm-12">
                                <label for="location">Location</label>
                                <textarea class="form-control" id="location" name="location" rows="3">{{ old('location',$assessment->location) }}</textarea>
                            </div>
                            
                            <div class="form-group col-sm-6 ">
                                <label for="gps_n">GPS Coordinates <strong>(N)</strong></label>
                                <div>
                                    <input type="text" class="form-control" id="gps_n" name="gps_n" value="{{ old('gps_n',$assessment->gps_n) }}"  placeholder="N coordinate" >
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="gps_w">GPS Coordinates <strong>(W)</strong></label>
                                <div>
                                    <input type="text" class="form-control" id="gps_w" name="gps_w" value="{{ old('gps_w',$assessment->gps_w) }}"  placeholder="W coordinate"  >
                                </div>
                            </div>

                            <div class="form-group col-sm-6 ">
                                <label for="usa_ticket">USA Ticket#</label>
                                <div>
                                    <input type="text" class="form-control" id="usa_ticket"  name="usa_ticket" value="{{ old('usa_ticket',$assessment->usa_ticket) }}"  placeholder="#" >
                                </div>
                            </div>  

                            <div class="form-group col-sm-6 ">
                                <label for="usa_marked">USA Marked</label>
                                <div>
                                    <input type="text" class="form-control" id="usa_marked"  name="usa_marked" value="{{ old('usa_marked',$assessment->usa_marked) }}"  placeholder="#" >
                                </div>
                            </div>  

                            <div class="form-group col-sm-6 ">
                                <label for="emergency_phone">Emergency Phone #</label>
                                <div>
                                    <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" value="{{ old('emergency_phone',$assessment->emergency_phone) }}"  placeholder="#" >
                                </div>
                            </div>

                            <div class="form-group col-sm-6 ">
                                <label for="kit_location">First Aid Kit Location</label>
                                <div>
                                    <input type="text" class="form-control" id="kit_location" name="kit_location" value="{{ old('kit_location',$assessment->kit_location) }}"  placeholder="Location" >
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="medical_facility_name">Nearest medical facility</label>
                                <div>
                                    <input type="text" class="form-control" id="medical_facility_name" name="medical_facility_name" value="{{ old('medical_facility_name',$assessment->medical_facility_name) }}"  placeholder="Name" >
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="medical_facility_location">Medical facility location</label>
                                <div>
                                    <textarea class="form-control" id="medical_facility_location" name="medical_facility_location" rows="3">{{ old('medical_facility_location',$assessment->medical_facility_location) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="water_services">Water Sources</label>
                                <div>
                                    <textarea class="form-control" id="water_sources" name="water_sources" rows="3">{{ old('water_sources',$assessment->water_sources) }}</textarea>
                                </div>
                            </div>    

                            <div class="form-group col-sm-12">
                                <label for="bleed_off">Bleed Off</label>
                                <div>
                                    <textarea class="form-control" id="bleed_off" name="bleed_off" rows="3">{{ old('bleed_off',$assessment->bleed_off) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="cutting">Cutting</label>
                                <div>
                                    <textarea class="form-control" id="cutting" name="cutting" rows="3">{{ old('cutting',$assessment->cutting) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="test_hole">Test Hole</label>
                                <div>
                                    <textarea class="form-control" id="test_hole" name="test_hole" rows="3">{{ old('test_hole',$assessment->test_hole) }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn btn-success pull-right" name="save" value="save">Save Changes</button>
                            </div>
                            <div class="form-group col-sm-6 text-right">
                                <a href="/assessments" class="btn btn-primary">Cancel</a>
                                <a class="btn btn-danger" href="/assessments/delete/{{ $assessment->id }}">Delete</a>
                            </div>
                            
                        </div>
                    
                    </form>
            </div>   
        </div>
    </div>
    </div>
</div>
@endsection
