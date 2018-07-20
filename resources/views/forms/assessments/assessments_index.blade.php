@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Assessments Forms</div>
                <div class="card-body">

                <h5>Search</h5>
                <form action="/assessments" method="get">
                    <div class="form-row align-items-center mb-2">
                    <div class="col">
                        <label for="job_number" class="sr-only">Job Number</label>
                        <input class="form-control mr-sm-2" name="job_number" type="search" placeholder="Job#" aria-label="Job Number">
                    </div>    
                    <div class="col">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </div>  
                    </div>  
                </form>



                <form action="/assessments" method="get">
                <div class="form-row align-items-center mb-2">
                <div class="col">
                    <label for="company" class="sr-only">Customer</label>
                    <input class="form-control mr-sm-2" name="company" type="search" placeholder="Company" aria-label="Company"> 
                </div>    
                <div class="col">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </div>  
                </div>  
                </form>


                <form action="/assessments" method="get">
                <div class="form-row align-items-center mb-2">
                <div class="col">
                    <label for="userName" class="sr-only">User</label>
                    <input class="form-control mr-sm-2" name="userName" type="search" placeholder="Name OR Last Name" aria-label="User Name"> 
                </div>    
                <div class="col">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </div> 
                </div> 
                </form>



                
                    <div>
                        <!-- Filter: -->
                        <!-- <a href="/assessments?submitted=0">Not Submitted</a> | 
                        <a href="/assessments?submitted=1">Submitted</a> |  -->
                        <a class="btn btn-primary" href="/assessments">Reset Filters</a>

                    <div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Job #</th>
                                <th scope="col">Customer</th>
                                <th scope="col">User</th>
                                <th scope="col">Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($assessments as $assessment)
                            
                                <tr>
                                <th scope="row">
                                    <a href="/assessments/edit/{{ $assessment->id }}" > 
                                        {{ $assessment->job_number}}
                                    </a> 
                                </th>
                                
                                <td>
                                    @if ($assessment->customer)
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                        {{ $assessment->customer->company}}
                                    </a> 
                                    @endif
                                </td>

                                <td>
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                        {{ $assessment->user->name}}&nbsp;{{ $assessment->user->last_name}}
                                    </a> 
                                </td>
                                    
                                <td>
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                        {{ $assessment->created_at->toFormattedDateString() }}
                                    </a>
                                </td>
                                <td>
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                    @if($assessment->submitted)
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                        Submitted
                                    </a>
                                    @else
                                    <a href="/assessments/edit/{{ $assessment->id }}" >
                                    Not Submitted
                                    </a>
                                    @endif
                                </td>
                                @if($assessment->submitted)
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/assessments/edit/{{ $assessment->id }}" >
                                        View</a>
                                </td>
                                @else
                                
                                <td>
                                    <a class="btn btn-sm btn-primary" href="/assessments/edit/{{ $assessment->id }}" >
                                        Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/assessments/delete/{{ $assessment->id }}" >
                                        Delete
                                    </a>
                                </td>
                                @endif
                                </tr>
                                
                            @endforeach    
                            </tbody>
                            </table>
                        </div>

                    <div class="pagination justify-content-center">
                      {{ $assessments->links("pagination::bootstrap-4") }} 
                    </div>    
                </div>
            </div>
        </div>      
    </div>      
</div>      
@endsection