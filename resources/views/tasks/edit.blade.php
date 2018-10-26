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
        <a class="nav-item nav-link border-primary" href="/assessments/show/{{ $assessment->id }}">Print</a>
    </nav> 
    <div class="row">
        <div class="col-sm-12">
<!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="/assessments/edit/{{ $assessment->id }}">Assessment</a></li>
                <li class="breadcrumb-item"><a href="/assessments/{{ $task->assessment_id }}/tasks">Tasks</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{ $task->name }} </li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header bg-primary text-white border-primary">     
                Editing task : {{ $task->name }} 
            </div>
            <div class="card-body">
            <p>Rename the task by changing the name and pressing the button "Rename"</p>
<!-- RENAME TASK FORM -->            
                <form  class="form-row align-items-center" method="POST" action="/tasks/rename/{{ $task->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    
                    <div class="col-sm-8">
                        <label for="name" ><strong>Task Name :</strong></label>
                        <input type="text" class="form-control" id="name" name="name"  value="{{ $task->name  }}" >
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-success">Rename</button>
                        <a href ="/tasks/delete/{{ $task->id }}" class="btn btn-danger">Delete</a>
                    </div>                                                        
                </form> 
                <hr>
                <!-- Button trigger modal -->
                <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#hazardModal">
                + Add hazard
                </button>
                </div>
<!-- HAZARDS LIST TABLE -->
                @if(!$tasks_hazards->isEmpty())
                    <div class="card mt-3 border-primary">
                        <div class="card-header bg-primary text-white">
                        Hazards list
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                        <th scope="col">Hazard</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Measure</th>
                                        <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>              
                                        @foreach ($tasks_hazards as $hazard)
                                        <tr>
                                        <th  scope="row">{{ $hazards->find($hazard->hazard_id)->name }}</th>
                                        <td>{{ $hazard->hazard }}</td>
                                        <td>{{ $hazard->measure }}</td>
                                        <td><a href="/hazards_tasks/edit/{{ $hazard->id }}" class="btn btn-sm btn-primary">Edit hazard</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
            <!-- MODAL -->
            <div class="modal fade" id="hazardModal" tabindex="-1" role="dialog" aria-labelledby="hazardModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hazardModalLabel">New Hazard</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- FORM -->
                        <form method="POST" action="/hazards_tasks">
                            {{ csrf_field() }}
                            <input name="task_id" type="hidden" value="{{ $task->id }}">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="hazard_id">Select Hazard Type</label>
                                <div class="col-sm-8">
                                    <select id="hazard_id"  name="hazard_id">
                                        <option value="">---</option>
                                        @foreach ($hazards as $hazard) 
                                            <option value="{{ $hazard->id }}">{{ $hazard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4" for="hazard">Hazard Description</label>
                                <div class="col-sm-8" >
                                    <textarea class="form-control" id="hazard" name="hazard" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4"  for="measure">Preventive Measures</label>
                                <div class="col-sm-8" >
                                <textarea class="form-control" id="measure" name="measure" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                            <button type="submit" class="btn btn-success ">Save</button>
                            </div>
                        </form>
                    </div><!-- Modal body -->
                </div><!-- Modal Contennt -->
                </div><!-- Modal Dialog -->
            </div><!-- Modal -->
      </div> <!-- Card -->
    </div> <!-- Column -->
  </div> <!-- Row -->
  </div> <!-- Container -->
@endsection
