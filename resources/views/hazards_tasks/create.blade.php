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
                    <a class="nav-link success" href="/assessments/{{ $task->assessment_id }}/tasks">Tasks</a>
                </li>
            </ul>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/users/forms">My Forms</a></li>
                    <li class="breadcrumb-item"><a href="/assessments/{{ $task->assessment_id }}/tasks">#{{ $assessment->job_number }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Task</li>
                </ol>
                </nav>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $task->name  }} 
                  </div>

                <div class="panel-body">
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     @include('layouts.errors')

                    <div class="row">

                        <div class="col-sm-12">
                            
<!-- FORM -->
                            <form method="POST" action="/hazards_tasks/">
                                {{ csrf_field() }}

                                <input name="task_id" type="hidden" value="{{ $task->id }}">

                                    <div class="form-group">
                                        <label for="hazard_id">Select Hazard Type</label>
                                        <select class="form-control" id="hazard_id"  name="hazard_id">
                                            <option value="">---</option>
                                            @foreach ($hazards as $hazard) 
                                                <option value="{{ $hazard->id }}">{{ $hazard->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="hazard">Hazard Description</label>
                                        <textarea class="form-control" id="hazard" name="hazard" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="measure">Preventive Measures</label>
                                        <textarea class="form-control" id="measure" name="measure" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success pull-right">+ Add</button>
                                </form>

                                
    <!-- FORM  -->
                        </div>
                        <hr>

                        @if($tasks_hazards)
                        <div class="col-sm-12">

                             <table class="table table-striped">
                                <thead>
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
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
