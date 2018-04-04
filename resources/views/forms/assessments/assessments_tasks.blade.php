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

                            <div class="well well-sm" >
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
                            <div class="table-responsive">    
                            <table class="table table-sm">
                                      @foreach ($tasks as $task)
                                        <tr class="table-success"> 
                                            <td class="table-success">
                                                
                                            <div class="col-sm-6">
                                                <h4> <a href ="/hazards_tasks/edit/{{ $task->id }}" >{{ $task->name }}</h4></a>
                                            </div>
                                            <div class="col-sm-6 pull-right">
                                                <a href ="/hazards_tasks/edit/{{ $task->id }}" class="btn btn-sm btn-primary pull-right">Edit</a>
                                            </div>  

                                            </td>  
                                        </tr> 
                                        <tr>
                                            <td>
                                                
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
                                                
                                            </td>        
                                                 

                                        </tr>       

                                        @endforeach
                                    </table>
                                    </div>    
                            </div>    

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
