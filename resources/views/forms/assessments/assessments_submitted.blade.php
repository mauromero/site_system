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


            <div class="card">
                <div class="card-body">

                    <div class="card bg-light mb-3" >
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  value="" id="defaultCheck2" checked disabled>
                                    <label class="form-check-label" for="defaultCheck2">
                                        Submitted&nbsp;</label>
                                    </label>
                                    </div>
                                    <p>{{ Carbon\Carbon::now()->toFormattedDateString()}}</p>
                                    <p>User:&nbsp;<span class="font-weight-bold">{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}</span> </p>
                                    <p>Customer: <span class="font-weight-bold">{{ $assessment->customer->name }} {{ $assessment->customer->last_name }}</span></p>
                                    
                                </div>
                                <div class="col-sm-6">    
                                    <p>Job Number: <span class="font-weight-bold">{{ $assessment->job_number }}</span></p>
                                    <p>Start Date: <span class="font-weight-bold">{{ \Carbon\Carbon::parse($assessment->start_date)->format('m/d/Y') }}</span></p>
                                    <p>Exp. Date: <span class="font-weight-bold">{{ \Carbon\Carbon::parse($assessment->exp_date)->format('m/d/Y') }}</span></p>
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
                                    <button type="submit" class="btn btn-danger d-print-none">Delete</button>
                                </div>
                                <div class="col-sm-6 text-right">
                                <a href="/users/forms" class="btn btn-primary d-print-none">My Forms</a>
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
