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


            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Are you sure you want to delete this form?.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="card border-danger">
                <div class="card-body">

                    <div class="card bg-light mb-3" >
                        <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12">
                            @if($assessment->submitted)
                            <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" {{ $assessment->submitted ? 'checked' : '' }} name="submitted" id="submitted">
                            <label class="form-check-label" for="submitted">
                                Submitted
                            </label>
                            </div>  
                                <p class="font-weight-bold"><label> &nbsp;</label>{{ $assessment->created_at->toFormattedDateString()}}</p>
                                <p class="font-weight-bold"><label> By: &nbsp;</label>{{ $assessment->user->name }}&nbsp;{{ $assessment->user->last_name }}  </p>
                                @else
                                <p class="font-weight-bold"><label> Date :&nbsp;</label>{{ Carbon\Carbon::now()->toFormattedDateString()}}</p>
                                <p class="font-weight-bold"><label> User Name :&nbsp;</label>{{ $assessment->user->name }}&nbsp;{{ $assessment->user->last_name }}  </p>
                            @endif    
                            </div>

                        </div>
                        </div>
                    </div>

                    @if($assessment->image_name)    
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid rounded " alt="location image" src="/storage/locations/{{ $assessment->image_name}}"> 
                            </div>
                        </div>
                    </div>
                    @endif 


                            <div class="form-row">

                                <div class="form-group col-sm-4">
                                    <label for="job_number">Job Number</label>
                                    <div>
                                        <input type="text" class="form-control" id="job_number" name="job_number"  placeholder="#"  value="{{ $assessment->job_number }}" >
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
                                    <label for="medical_facility_name">Nearest medical facility</label>
                                    <div>
                                        <input type="text" class="form-control" id="medical_facility_name" name="medical_facility_name" value="{{ $assessment->medical_facility_name }}"  placeholder="Name" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="medical_facility_location">Medical facility location</label>
                                    <div>
                                        <textarea class="form-control" id="medical_facility_location" name="medical_facility_location" rows="3">{{ $assessment->medical_facility_location }}</textarea>
                                    </div>
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

                            </div>

    <!-- TASKS -->      
                    @if(!$tasks->isEmpty())

                        <div>
                            @foreach ($tasks as $task)
                                <div class="card  border-danger mb-3">
                                    <div class="card-body">
                                    <h5 class="card-title bg-light p-1">{{ $loop->iteration }}.&nbsp;{{ $task->name }} </h5>
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                <th scope="col">Hazard</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Measure</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                            @foreach ($tasks_hazards as $hazard)
                                            @if($hazard->task_id == $task->id)
                                            <tr>
                                            <td>{{ $hazards->find($hazard->hazard_id)->name }}</td>
                                            <td>{{ $hazard->hazard }}</td>
                                            <td>{{ $hazard->measure }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    

                                    </div>  
                                </div>  
                            @endforeach
                        </div>
                    @endif

                       
                  
                </div>
                
                    <div class="card-footer text-right">
                        <form method="POST" action="/assessments/delete/{{ $assessment->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group row">
                                <div class="col-sm-6 text-left">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                <div class="col-sm-6 text-right">
                                <a href="/assessments" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
