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
        <a class="nav-item nav-link border-primary text-white bg-primary" href="/assessments/{{ $task->assessment_id }}/tasks">Tasks</a>
        <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
    </nav> 

    <div class="row">
        <div class="col-sm-12">
                
        <div class="card">
            <div class="card-body">
                <form  class="form-row align-items-center" method="POST" action="/tasks/rename/{{ $task->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    
                    <div class="col-sm-10">
                        <label for="name" class="sr-only">Task Name</label>
                        <input type="text" class="form-control" id="name" name="name"  value="{{ $task->name  }}" >
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">Change Name</button>
                    </div>                                                        
                </form> 

                <div class="card bg-light border-primary mt-3">
                    <div class="card-body "> 
                    <div class="card-title"><h5>New hazard type</h5></div>                                          
<!-- FORM -->
                        <form method="POST" action="/hazards_tasks/">
                        {{ csrf_field() }}

                        <input name="task_id" type="hidden" value="{{ $task->id }}">

                            <div class="form-group">
                                <label for="hazard_id">Select</label>
                                <select class="form-control" id="hazard_id"  name="hazard_id">
                                    <option value="">-- Hazard Type --</option>
                                    @foreach ($hazards as $hazard) 
                                        <option value="{{ $hazard->id }}">{{ $hazard->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="hazard">Hazard Description</label>
                                <textarea class="form-control" id="hazard" name="hazard" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="measure">Preventive Measures</label>
                                <textarea class="form-control" id="measure" name="measure" rows="2"></textarea>
                            </div>
                            <div class="text-right">
                            <button type="submit" class="btn btn-success ">+ Add hazard</button>
                            </div>
                        </form>

                    </div>        
                </div>
<!-- TABLE -->
                @if(!$tasks_hazards->isEmpty())

                    <div class="card mt-3 border-primary">
                        <div class="card-header">
                            <h4>Hazards</h4>
                        </div>
                        <div class="card-body">
                        
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col">Hazard</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Measure</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>              
                                    @foreach ($tasks_hazards as $hazard)
                                    <tr>
                                    <th  scope="row">{{ $hazards->find($hazard->hazard_id)->name }}</th>
                                    <td>{{ $hazard->hazard }}</td>
                                    <td>{{ $hazard->measure }}</td>
                                    <td><a href="/hazards_tasks/edit/{{ $hazard->id }}" class="btn btn-sm btn-primary">Edit</a></td>
                                    <td><a href="/hazards_tasks/delete/{{ $hazard->id }}" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="card-footer text-right">
                            <a href="/assessments/{{ $assessment->id }}/tasks" class="btn btn-success">Back to tasks</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
