@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12"> 
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link border-primary" href="/assessments/edit/{{ $assessment->id }}">Form</a>
                <a class="nav-item nav-link border-primary" href="/assessments/{{ $assessment->id }}/tasks">Tasks</a>
                <a class="nav-item nav-link border-primary text-white bg-primary" href="#">Image</a>
            </nav>

            <div class="card bg-light mb-3">
                <div class="card-body">
                    <form method="POST" action="/assessments/{{ $assessment->id }}/image" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="location_img">Choose a file to upload from your computer or device.</label>
                            <input type="file" id="location_img" name="location_img"  class="form-control-file"></input> 
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-success">Upload File</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('layouts.errors')

            @if($assessment->image_name)    
            <div class="card bg-light">
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid rounded " alt="location image" src="/storage/locations/{{ $assessment->image_name}}"> 
                    </div>
                </div>
            </div>
            @endif 

        </div>
    </div>
</div>
@endsection