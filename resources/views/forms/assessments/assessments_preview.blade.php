@extends('layouts.app')

@section('content')
<div class="container page-break">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @include('layouts.errors')
    
    <div class="row page-break">
    <div class="col-sm-12 page-break">

        <nav class="nav nav-tabs d-print-none">
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/tasks">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Print</a>
        </nav>

        <!-- HEADER -->
        <div class="row">
        <div class="col-sm-12">
            <table class="table borderless p-0 m-0">
            <tbody>
                <tr class="d-flex">
                    <td class="col-6"><h5>SITE SYSTEM - ASSESSMENT FORM</h5></td>
                    <td class="col-6 text-right text-muted"><small># {{$assessment->id}}</small></td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>

        <div class="row">
        <div class="col-sm-12">
            <div class="card mb-2">
            <div class="card-body pb-1 pt-1">

                <table class="table table-sm borderless p-0 m-0">
                    <tr class="d-flex"> 
                        <td class="col-6">
                            <strong>Created by</strong> :&nbsp;{{ $assessment->user->name }}&nbsp;{{ $assessment->user->last_name }}<br/>
                            <strong>Created date</strong> :&nbsp;{{ $assessment->created_at->toFormattedDateString() }}<br/>
                            <strong>Job Number</strong> :&nbsp;{{ $assessment->job_number }}<br/>
                            <strong>Client</strong> :&nbsp;{{ $assessment->customer->company }}
                        </td>                  

                        <td class="col-6">
                            @if($assessment->submitted)
                            <div class="form-group form-check">                            
                            <input class="form-check-input" type="checkbox" name="submitted" id="submitted"  value="1" checked disabled>
                            <label class="form-check-label" for="submitted"><strong>Completed</strong></label>
                            </div> 
                            <label> <strong>Completed date</strong> :&nbsp;</label>{{ $assessment->submitted_at->toFormattedDateString() }}<br/>
                            @else
                            <label class="form-check-label" for="submitted"><strong>Status</strong>&nbsp;:&nbsp;</label><strong>In Progress</strong><br/>
                            @endif
                            <label><strong>Updated date</strong> :&nbsp;</label>{{ $assessment->updated_at->toFormattedDateString() }}
                        </td>
                    </tr>
                </table>

            </div>
            </div>
        </div>
        </div>

        <!-- INFO 1 -->
        <div class="row">
        <div class="col-sm-12">
        <div class="card mb-2">
            <div class="card-body pb-1 pt-1">

                <table class="table table-sm borderless p-0 m-0">
                    <tr class="d-flex"> 
                        <td class="col-6">
                            <strong>USA Marked</strong>&nbsp;:&nbsp;{{ $assessment->usa_marked }}
                        </td>
                        <td class="col-6">
                            <strong>Start Date</strong>&nbsp;:&nbsp;
                            @if($assessment->start_date)
                            {{ $assessment->start_date->toFormattedDateString() }}
                            @endif
                        </td>
                    </tr>        
                    <tr class="d-flex"> 
                        <td class="col-6">
                            <strong>USA Ticket#</strong>&nbsp;:&nbsp;{{ $assessment->usa_ticket  }}
                        </td>
                        <td class="col-6">
                            <strong>Exp. Date</strong>&nbsp;:&nbsp;
                            @if($assessment->exp_date)
                                {{ $assessment->exp_date->toFormattedDateString() }}
                            @endif
                        </td>
                    </tr>        
                </table> 
                     
            </div>
        </div>
        </div>
        </div>


        <!-- LOCATION -->
        <div class="row">
        <div class="col-sm-12">
        <div class="card mb-2">
            <div class="card-body pb-1 pt-1">

                    @if($assessment->image_name)    
                    <div class="col-sm-12">
                        <div class="text-center">
                            <img class="img-fluid rounded " alt="location image" src="/storage/locations/{{ $assessment->image_name}}"> 
                        </div>
                    </div>
                    @endif 

                <table class="table table-sm borderless pm-0 mb-0 mt-2">
                    <tr class="d-flex"> 
                        <td class="col-6">
                            <strong>Location</strong> :
                        </td>
                        <td class="col-6">
                            <strong>GPS Coordinates (N)</strong>&nbsp;:&nbsp;;{{ $assessment->gps_n }}
                        </td>
                    </tr>        
                    <tr class="d-flex"> 
                        <td class="col-6">
                            
                            <span class="mt-3" style="white-space: pre-line;">&nbsp;{{ $assessment->location }}</span>
                        </td>
                        <td class="col-6">
                            <strong>GPS Coordinates (W)</strong>&nbsp;:&nbsp;{{ $assessment->gps_w }}
                        </td>
                    </tr>        
                </table> 

            </div>
        </div>
        </div>
        </div>


        <!-- EMERGENCY -->
        <div class="row">
        <div class="col-sm-12">
        <div class="card mb-2">
            <div class="card-body pb-1 pt-1">

                <table class="table table-sm borderless p-0 m-0">
                    <tr><td><strong>Emergency Phone #</strong>&nbsp;:&nbsp;{{ $assessment->emergency_phone }}</td></tr> 
                    <tr><td><strong>First Aid Kit Location</strong>&nbsp;:&nbsp;{{ $assessment->kit_location }}</td></tr>
                    <tr><td><strong>Nearest medical facility</strong>&nbsp;:&nbsp;{{ $assessment->medical_facility_name }}</td></tr>
                    <tr><td><strong>Medical facility location</strong>&nbsp;:</td></tr>
                    <tr><td style="white-space: pre-line;">{{ $assessment->medical_facility_location }}</td></tr>
                </table> 

            </div>
        </div>
        </div>
        </div>

        <!-- OTHERS -->
        <div class="card page-break">
            <div class="card-body mb-2">
                <p style="white-space: pre-line;"><strong>Water Sources</strong> : &nbsp;{{ $assessment->water_sources }}</p>
                <p style="white-space: pre-line;"><strong>Bleed Off</strong> : &nbsp;{{ $assessment->bleed_off }}</p>
                <p style="white-space: pre-line;"><strong>Cutting</strong> : &nbsp;{{ $assessment->cutting }}</p>
                <p style="white-space: pre-line;"><strong>Test Hole</strong> : &nbsp;{{ $assessment->test_hole }}</p>
                
            </div>
        </div>

 
         <!-- TASKS TABLE-->    

        @if(!$tasks->isEmpty())
       
        <div class="row page-break mb-2">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-body pb-1 ">
                <h5 class="card-tittle">Tasks</h5>
                    @foreach ($tasks as $task)
                    <strong>{{ $loop->iteration }}.&nbsp;{{ $task->name }} </strong>

                        <table class="table borderless table-sm">
                            <thead>
                                <tr class="d-flex">
                                <th class="col-2">Hazard</th>
                                <th class="col-5">Description</th>
                                <th class="col-5">Measure</th>
                                </tr>
                            </thead>
                            <tbody>                                            
                            @foreach ($tasks_hazards as $hazard)
                            @if($hazard->task_id == $task->id)
                            <tr class="d-flex">
                            <td class="col-2">{{ $hazards->find($hazard->hazard_id)->name }}</td>
                            <td class="col-5">{{ $hazard->hazard }}</td>
                            <td class="col-5">{{ $hazard->measure }}</td>
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>  
            </div>  
        </div>
        </div>
        
        @endif

        <div class="row d-print-none">
            <div class="col-sm-12 text-center">
            <div class="card-footer">
                <button type="button" onClick="window.print()" class="btn btn-success">&nbsp;Print&nbsp;</button>
            </div>
            </div>
        </div>

    </div>
    </div>
</div>
@endsection
