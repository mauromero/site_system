@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header bg-primary text-white">My Forms</div>
            <div class="card-body">

                <div class="list-group">

                    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">@sortablelink('job_number', 'Job #')</th>
                            <th scope="col">Customer</th>
                            <th scope="col">@sortablelink('created_at','Created')</th>
                            <th scope="col">@sortablelink('submitted','Status')</th>
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
                                    {{ $assessment->customer->name}}&nbsp;{{ $assessment->customer->last_name}}
                                </a> 
                                @endif
                            </td>
                            <td>
                                <a href="/assessments/edit/{{ $assessment->id }}" >
                                    {{ $assessment->created_at->toFormattedDateString() }}
                                </a>
                            </td>
                            <td>
                                <a href="/assessments/edit/{{ $assessment->id }}" >
                                @if ($assessment->submitted)
                                    Submitted
                                @else
                                    <strong>Not Submitted</strong>
                                @endif    
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="/assessments/edit/{{ $assessment->id }}" >
                                    Edit</a>
                                <a class="btn btn-sm btn-danger" href="/assessments/delete/{{ $assessment->id }}" >
                                    Delete
                                </a>
                            </td>
                            </tr>
                            
                        @endforeach    
                        </tbody>
                        </table>
                        {{ $assessments->links("pagination::bootstrap-4") }} 
                        
                </div>
                </div>
            </div>
            </div>
        </div>      
    </div>      
</div>      
@endsection