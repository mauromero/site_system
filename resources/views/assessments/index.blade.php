@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1>My Forms</h1>
            <div class="list-group">

                @foreach($assessments as $assessment)
                <a href="/assessments/edit/{{ $assessment->id }}" class="list-group-item list-group-item-action"> {{ $assessment->job_number }}  
                    &nbsp;{{ $assessment->created_at}}
                    &nbsp;{{ $assessment->customer->name}}
                    &nbsp;{{ $assessment->customer->last_name}}
             </a>
                @endforeach

        </div>      
    </div>      
</div>      
@endsection