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
    <nav class="nav nav-tabs d-print-none">
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/tasks">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Print</a>
        </nav>

            <div class="card">
                <div class="card-body">

                    <div class="card bg-light mb-3" >
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    @if( $assessment->submitted)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  value="" id="submitted" checked disabled>                             
                                        <label class="form-check-label" for="submitted">
                                            Submitted&nbsp;</label>
                                        </label>
                                    </div>
                                    @endif 
                                    <p>{{ $assessment->created_at}}</p>
                                    <p>User:&nbsp;<span class="font-weight-bold">{{ $assessment->user->name }}&nbsp;{{ $assessment->user->last_name }}</span> </p>
                                    @if($assessment->customer)
                                    <p>Customer: <span class="font-weight-bold">{{ $assessment->customer->name }} {{ $assessment->customer->last_name }}</span></p>
                                    @else
                                    <p>Customer: Undefined</p>
                                    @endif

                                    
                                </div>
                                <div class="col-sm-6">    
                                    <p>Job Number: <span class="font-weight-bold">{{ $assessment->job_number }}</span></p>
                                    @if( $assessment->start_date)
                                    <p>Start Date: <span class="font-weight-bold">{{ \Carbon\Carbon::parse($assessment->exp_date)->format('m/d/Y') }}</span></p>
                                    @else
                                    <p>Start Date: <span class="font-weight-bold">Undefined</span></p>
                                    @endif 
                                    @if( $assessment->exp_date)
                                    <p>Exp. Date: <span class="font-weight-bold">{{ \Carbon\Carbon::parse($assessment->exp_date)->format('m/d/Y') }}</span></p>
                                    @else
                                    <p>Start Date: <span class="font-weight-bold">Undefined</span></p>
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

                    <div class="card bg-light">
                        <div class="card-body">
                            <p>Location: <span class="font-weight-bold">{{ $assessment->location }}</span></p>
                            <p>GPS Coordinates (N): <span class="font-weight-bold">{{ $assessment->gps_n }}</span></p>
                            <p>GPS Coordinates (W): <span class="font-weight-bold">{{ $assessment->gps_w }}</span></p>
                        </div>
                    </div>

                    <div class="card bg-light">
                        <div class="card-body">
                            <p>USA Ticket#: <span class="font-weight-bold">{{ $assessment->usa_ticket}}</span></p>
                            <p>USA Marked: <span class="font-weight-bold">{{ $assessment->usa_marked }}</span></p>
                        </div>
                    </div>

                    <div class="card bg-light">
                        <div class="card-body">
                            <p>Emergency Phone #: <span class="font-weight-bold">{{ $assessment->emergency_phone }}</span></p>
                            <p>First Aid Kit Location: <span class="font-weight-bold">{{ $assessment->kit_location }}</span></p>
                            <p>Nearest medical facility: <span class="font-weight-bold">{{ $assessment->medical_facility_name }}</span></p>
                            <p>Medical facility location: <span class="font-weight-bold">{{ $assessment->medical_facility_location }}</span></p>
                        </div>
                    </div>

                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <p>Water Sources: <span class="font-weight-bold">{{ $assessment->water_sources }}</span></p>
                            <p>Bleed Off: <span class="font-weight-bold">{{ $assessment->bleed_off }}</span></p>
                            <p>Cutting: <span class="font-weight-bold">{{ $assessment->cutting }}</span></p>
                            <p>Test Hole: <span class="font-weight-bold">{{ $assessment->test_hole }}</span></p>
                           
                        </div>
                    </div>

    <!-- TASKS -->      
                    @if(!$tasks->isEmpty())

                        <div>

                            <h5>Tasks</h5>
                            @foreach ($tasks as $task)
                                <div class="card mb-3">
                                    <div class="card-header">     
                                        <h5 class="card-title"> {{ $task->name }} </h5>
                                    </div>

                                    <div class="card-body">
                                    
                                        <table class="table table-sm d-print-table">
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

                                <div class="col-sm-6 text-right">
                                <a href="{{ URL::previous() }}" class="btn btn-primary d-print-none">Back</a>
                                </div>


                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
