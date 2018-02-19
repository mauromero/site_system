@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks: {{ $task->name }}</div>

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
                                

                                    <div class="row" >
                                        <div class="col-sm-8">
                                            <p class="font-weight-bold"><label> Date :&nbsp;</label>{{ \Carbon\Carbon::now()->format('m/d/Y')}}</p>
                                            <p class="font-weight-bold"><label> User Name :&nbsp;</label>{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}  </p>
                                        </div>
                                    </div>

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

                             <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Hazard</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Measure</th>
                                    </tr>
                                </thead>
                                <tbody>              
                                    @foreach ($tasks_hazards as $hazard)
                                    <tr>
                                    <td>{{ $hazard->hazards->name }}</td>
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
