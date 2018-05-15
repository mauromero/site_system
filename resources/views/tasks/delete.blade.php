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
            <div class="card-header bg-danger text-white">
                        Delete Task
            </div>
            <div class="card-body">
                <h5 class="card-title" >{{ $task->name  }}</h5>
                                                    
<!-- TABLE -->
                @if(!$tasks_hazards->isEmpty())

                    <div class="card mt-3 border-primary">
                        <div class="card-header">
                            Hazards
                        </div>
                        <div class="card-body">
                        
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col">Hazard</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Measure</th>
                                    </tr>
                                </thead>
                                <tbody>              
                                    @foreach ($tasks_hazards as $hazard)
                                    <tr>
                                    <th  scope="row">{{ $hazards->find($hazard->hazard_id)->name }}</th>
                                    <td>{{ $hazard->hazard }}</td>
                                    <td>{{ $hazard->measure }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>
                @endif
            </div>
            <div class="card-footer text-right">

                <form method="POST" action="/tasks/delete/{{ $task->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input name="task_id" type="hidden" value="{{ $task->id }}">

                    <div class="form-group row">
                        <div class="col-sm-6 text-left">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                        <div class="col-sm-6 text-right">
                        <a href="/assessments/{{ $assessment->id }}/tasks" class="btn btn-primary">Back to tasks</a>
                        </div>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</div>
@endsection
