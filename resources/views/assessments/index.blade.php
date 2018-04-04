@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1>My Forms</h1>
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
                        
                        <td>{{ $assessment->customer->name}}&nbsp;{{ $assessment->customer->last_name}}</td>
                        <td>{{ $assessment->created_at->toFormattedDateString() }}</td>
                        </tr>
                       
                    @endforeach    
                    </tbody>
                    </table>
        </div>      
    </div>      
</div>      
@endsection