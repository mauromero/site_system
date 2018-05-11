@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">My Forms</div>
            <div class="card-body">

                <div class="list-group">

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Job #</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Created</th>
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
                                {{ $assessment->created_at->toFormattedDateString() }}</td>
                                </a>
                            </tr>
                            
                        @endforeach    
                        </tbody>
                        </table>
                </div>
            </div>
            </div>
        </div>      
    </div>      
</div>      
@endsection