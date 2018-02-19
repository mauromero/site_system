@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <ul class="nav nav-pills pull-right">
            <li class="nav-item list-group-item-info">
                    <a class="nav-link" href="/assessments/edit/{{ $assessment->id }}">Assesment Form</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link success" href="#">Tasks</a>
                </li>
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">#{{ $assessment->job_number }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.errors')

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="well" >
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

                            <form  class="form-inline" method="POST" action="/assessments/{{ $assessment->id }}/tasks">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Task name" size="70">
                                    <button type="submit" class="btn btn-success">Add Task</button>
                                </div>                                
                            </div>                                 
                            </form>

                            <hr>

                            <div>
                                <ul class="group-list">
                                    @foreach ($tasks as $task)
                                        <li class="group-list-item">
                                            {{ $task->name }}
                                            <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                        </li>

                                    @endforeach
                                </ul>    
                            </div>    

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
