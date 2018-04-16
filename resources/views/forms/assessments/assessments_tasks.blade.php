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
            <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Assesment Form</a>
            <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Tasks</a>
        </nav>        


            <div class="card">
                <div class="card-body">

                <div class="card bg-light">
                    <div class="card-body">
                            <form  class="form-row align-items-center" method="POST" action="/assessments/{{ $assessment->id }}/tasks">
                            {{ csrf_field() }}
                            
                                <div class="col-auto">
                                    <label for="name" class="sr-only">Task Name</label>
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Task name" >
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success">Add Task</button>
                                </div>                                     
                                                        
                            </form>

                        
                </div>            
                </div>            

                            <hr>

                            <div>
                            <div class="table-responsive">    
                            <table class="table table-sm">
                                      @foreach ($tasks as $task)
                                        <tr> 
                                            <td >
                                                
                                            <div class="row">
                                            <div class="col-sm-6">
                                                <h4> <a href ="/hazards_tasks/edit/{{ $task->id }}" >{{ $task->name }}</h4></a>
                                            </div>
                                            <div class="col-sm-6 pull-right">
                                                <a href ="/hazards_tasks/edit/{{ $task->id }}" class="btn btn-sm btn-primary pull-right">Edit</a>
                                            </div> 
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
@endsection
