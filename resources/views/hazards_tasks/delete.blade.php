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

            <div class="card ">
                <div class="card-header bg-danger text-white">
                    Delete hazard type
                </div>

                <div class="card-body border-danger">

                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/assessments/{{ $task->assessment_id }}/tasks">Tasks</a></li>
                    <li class="breadcrumb-item"><a href="/tasks/edit/{{ $task->id }}">{{ $task->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hazard Type</li>
                </ol>
                </nav>

                 <form method="POST" action="/hazards_tasks/delete/{{ $hazard_task->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input name="task_id" type="hidden" value="{{ $task->id }}">

                        <div class="form-group">
                            <label for="hazard_id">Hazard Type</label>

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
                            <p><strong>Hazard Description:</strong></p>
                            <p>{{ $hazard_task->hazard }}</p>
                        </div>
                        <div class="form-group">
                            <p><strong>Preventive Measures:</strong></p>
                            <p>{{ $hazard_task->measure }}</p>
                        </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
