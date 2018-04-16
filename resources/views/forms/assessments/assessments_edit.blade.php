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
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Assesment Form</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/tasks">Tasks</a>
        </nav>

            <div class="card">
                <div class="card-body">

                    <div class="card bg-light mb-3" >
                        <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <p class="font-weight-bold"><label> Date :&nbsp;</label>{{ Carbon\Carbon::now()->toFormattedDateString()}}</p>
                                <p class="font-weight-bold"><label> User Name :&nbsp;</label>{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}  </p>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold"><label> Job Number:&nbsp;</label>{{ $assessment->job_number }} </p>
                                <p class="font-weight-bold"><label> Customer:&nbsp;</label>{{ $assessment->customer->name }}&nbsp;{{ $assessment->customer->last_name }} </p>
                            </div>

                        </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <img class="img-fluid rounded" alt="location image" src="/storage/locations/{{ $assessment->image_name}}"> 
                    </div>  

                        <form method="POST" action="/assessments/edit/{{ $assessment->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-row">

                                <div class="form-group col-sm-12">
                                    <label for="customer_id">Select Custormer</label>
                                    <select class="form-control" id="customer_id"  name="customer_id">
                                        <option value="">---</option>
                                        @foreach ($customers as $customer) 
                                            <option value="{{ $customer->id }}"
                                                @if($assessment->customer_id == $customer->id)
                                                    selected
                                                @endif    
                                            >{{$customer->name}}&nbsp;{{$customer->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="start_date">Start Date</label>
                                    <div>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ \Carbon\Carbon::parse($assessment->start_date)->format('m/d/Y') }}" >
                                    </div>
                                </div>  

                                <div class="form-group col-sm-6">
                                    <label for="exp_date">Exp. Date</label>
                                    <div>
                                        <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{ $assessment->exp_date }}"  placeholder="Number" >
                                    </div>
                                </div> 

                                <div class="form-group col-sm-12">
                                    <label for="location">Location</label>
                                    <textarea class="form-control" id="location" name="location" rows="3">{{ $assessment->location }}</textarea>
                                </div>
                                
                                <div class="form-group col-sm-6 ">
                                    <label for="gps_n">GPS Coordinates <strong>(N)</strong></label>
                                    <div>
                                        <input type="text" class="form-control" id="gps_n" name="gps_n" value="{{ $assessment->gps_n }}"  placeholder="N coordinate" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="gps_w">GPS Coordinates <strong>(W)</strong></label>
                                    <div>
                                        <input type="text" class="form-control" id="gps_w" name="gps_w" value="{{ $assessment->gps_w }}"  placeholder="W coordinate"  >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 ">
                                    <label for="usa_ticket">USA Ticket#</label>
                                    <div>
                                        <input type="text" class="form-control" id="usa_ticket"  name="usa_ticket" value="{{ $assessment->usa_ticket }}"  placeholder="#" >
                                    </div>
                                </div>  

                                <div class="form-group col-sm-6 ">
                                    <label for="usa_marked">USA Marked</label>
                                    <div>
                                        <input type="text" class="form-control" id="usa_marked"  name="usa_marked" value="{{ $assessment->usa_marked }}"  placeholder="#" >
                                    </div>
                                </div>  

                                <div class="form-group col-sm-6 ">
                                    <label for="emergency_phone">Emergency Phone #</label>
                                    <div>
                                        <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" value="{{ $assessment->emergency_phone }}"  placeholder="#" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 ">
                                    <label for="kit_location">First Aid Kit Location</label>
                                    <div>
                                        <input type="text" class="form-control" id="kit_location" name="kit_location" value="{{ $assessment->kit_location }}"  placeholder="Location" >
                                    </div>
                                </div>


                                <div class="form-group col-sm-12">
                                    <label for="medical_facility_id">Nearest Medical Facility</label>
                                    <select class="form-control" id="medical_facility_id"  name="medical_facility_id">
                                        <option value="0">---</option>
                                        @foreach ($med_facilities as $facility) 
                                            <option value="{{ $facility->id }}" 
                                                @if($assessment->medical_facility_id == $facility->id)
                                                    selected
                                                @endif  
                                            >{{ $facility->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-sm-12">
                                    <label for="water_services">Water Sources</label>
                                    <div>
                                        <input type="text" class="form-control" id="water_sources" name="water_sources" value="{{ $assessment->water_sources }}"  placeholder="" >
                                    </div>
                                </div>    

                                <div class="form-group col-sm-12">
                                    <label for="bleed_off">Bleed Off</label>
                                    <div>
                                        <input type="text" class="form-control" id="bleed_off" name="bleed_off" value="{{ $assessment->bleed_off }}"  placeholder="" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="cutting">Cutting</label>
                                    <div>
                                        <input type="text" class="form-control" id="cutting" name="cutting"  value="{{ $assessment->cutting }}"  placeholder="" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="test_hole">Test Hole</label>
                                    <div>
                                        <input type="text" class="form-control" id="test_hole" name="test_hole" value="{{ $assessment->test_hole }}"  placeholder="" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 text-center">
                                    <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                </div>
                                <div class="form-group col-sm-6 text-center">
                                    <button type="submit" class="btn btn-primary pull-left">Submit Form</button>
                                </div>
                                
                            </div>
                        </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection