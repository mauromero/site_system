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
        <div class="col-md-12">

        <nav class="nav nav-tabs">
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
        </nav>        


            <div class="card">
                <div class="card-body">

                    <div class="card bg-light">
                        <div class="card-body">
                                <form  class="form-row align-items-center" method="POST" action="/assessments/{{ $assessment->id }}/tasks">
                                {{ csrf_field() }}
                                
                                    <div class="col-sm-8">
                                        <label for="name" class="sr-only">Task Name</label>
                                        <input type="text" class="form-control" id="name" name="name"  placeholder="Task name" >
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success">Add Task</button>
                                    </div>                                                        
                                </form>
        
                        </div>            
                    </div>            
            <hr>

                    <div>
                        @foreach ($tasks as $task)
                            <div class="card  border-primary mb-3">
                                <div class="card-header bg-light border-primary">     
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5> {{ $task->name }} </h5>
                                            </div>
                                        </div>
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
                                <div class="card-footer">
                                   <div class="row">
                                    <div class="col-sm-12 text-right">
                                            <a href ="/tasks/edit/{{ $task->id }}" class="btn btn-primary btn-sm">Edit</a>

                                            <a href ="/tasks/delete/{{ $task->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>   
                                   </div>                           
                                </div>  
                            </div>  
                        @endforeach
                    </div>    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
