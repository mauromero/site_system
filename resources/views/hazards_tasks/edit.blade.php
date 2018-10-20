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
    <div class="col-sm-12"> 

        <nav class="nav nav-tabs">
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="/assessments/{{ $task->assessment_id }}/tasks">Tasks</a>
            <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/image">Image</a>
        </nav>  

            <div class="card">
                <div class="card-body">

                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/assessments/{{ $task->assessment_id }}/tasks">Assessment</a></li>
                    <li class="breadcrumb-item"><a href="/tasks/edit/{{ $task->id }}">{{ $task->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hazard</li>
                </ol>
                </nav>
<!-- EDIT HAZARD -->
                 <form method="POST" action="/hazards_tasks/edit/{{ $hazard_task->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <input name="task_id" type="hidden" value="{{ $task->id }}">

                        <div class="form-group">
                            <label for="hazard_id">Select Hazard Type</label>

                            <select class="form-control" id="hazard_id"  name="hazard_id">
                                <option value="">---</option>
                                @foreach ($hazards as $hazard) 
                                    <option value="{{ $hazard->id }}"
                                    @if ($hazard_task->hazard_id == old('hazard_id', $hazard->id))
                                        selected="selected"
                                    @endif
                                    >{{ $hazard->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hazard">Hazard Description</label>
                            <textarea class="form-control" id="hazard" name="hazard" rows="4">{{ $hazard_task->hazard }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="measure">Preventive Measures</label>
                            <textarea class="form-control" id="measure" name="measure" rows="4" >{{ $hazard_task->measure }}</textarea>
                        </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-success ">Save</button>
                        <a href="/hazards_tasks/delete/{{ $hazard->id }}" class="btn btn-danger">Delete</a>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
