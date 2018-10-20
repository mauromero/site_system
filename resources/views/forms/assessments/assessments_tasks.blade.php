@extends('layouts.app')

@section('content')
<div class="container">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@include('layouts.errors')
        <nav class="nav nav-tabs">
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
        </nav>       

        <div class="row">
        <div class="col-md-12"> 
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a href="/assessments/edit/{{ $assessment->id }}">Assessment</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-body">

<!-- CREATE TASK FORM -->
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                        <h5 class="card-title">New task</h5>
                                <form  class="form-row align-items-center" method="POST" action="/assessments/{{ $assessment->id }}/tasks">
                                {{ csrf_field() }}
                                    
                                    <div class="col-sm-8">
                                    <p>Create a new task. Give the task a name and add it to the list.<p>
                                        <label for="name" class="sr-only">Task Name</label>
                                        <input type="text" class="form-control" id="name" name="name"  placeholder="Task name" >
                                    </div>
                                    <div class="col-sm-4 mt-3">
                                        <button type="submit" class="btn btn-success">Add Task</button>
                                    </div>                                                        
                                </form>
        
                        </div>            
                    </div>            
          
<!-- TASK LIST TABLE -->
                    <div>
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white border-primary">     
                            Tasks list
                        </div>
                        @forelse ($tasks as $task)
                        <div class="card-body">
                            <h5 class="card-title bg-light p-1"><strong>{{ $loop->iteration }}.&nbsp;{{ $task->name }} </strong></h5>
                            @if(!empty($tasks_hazards))
                                <table class="table table-sm">
                                        <tr>
                                        <th scope="col">Hazard</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Measure</th>
                                        </tr>
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
                            @endif  
                            
                        </div>  
                        <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href ="/tasks/edit/{{ $task->id }}" class="btn btn-primary btn-sm">Edit Task</a>
                            </div>   
                        </div>                           
                        </div>  
                        @empty
                            <p>- No tasks listed</p>
                            @endforelse
                                
                        </div> 
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
