@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Assessments Form</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.errors')

                    <div class="row">

                        <div class="col-sm-12">

                            <form method="POST" action="/assessments" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                <div class="row" >
                                    <div class="col-sm-8">
                                        <p class="font-weight-bold"><label> Date :&nbsp;</label>{{ \Carbon\Carbon::now()->format('m/d/Y')}}</p>
                                        <p class="font-weight-bold"><label> User Name :&nbsp;</label>{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}  </p>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="job_number">Job Number</label>
                                        <div>
                                            <input type="text" class="form-control" id="job_number" name="job_number"  placeholder="#" >
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="customer_id">Select Customer</label>
                                    <select class="form-control" id="customer_id"  name="customer_id">
                                        <option value="">---</option>
                                        @foreach ($customers as $customer) 
                                            <option value="{{ $customer->id }}">{{$customer->name}}&nbsp;{{$customer->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <label for="location_img">Upload location</label>
                                    <input type="file" name="location_img"></input> 
                                </div>

                                <button type="submit" class="btn btn-success pull-right">Continue</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
