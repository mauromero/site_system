@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Assessments Form</div>

                <div class="card-body">
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
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">Select Customer</label>
                                    <select class="form-control" id="customer_id"  name="customer_id">
                                        <option value="">---</option>
                                        @foreach ($customers as $customer) 
                                            <option value="{{ $customer->id }}">{{$customer->company}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                

                                 <div class="form-group col-sm-12">
                                    <label for="location">Location</label>
                                    <textarea class="form-control" id="location" name="location" rows="3"></textarea>
                                </div>
                                
                                <div class="form-group col-sm-6 ">
                                    <label for="gps_n">GPS Coordinates <strong>(N)</strong></label>
                                    <div>
                                        <input type="text" class="form-control" id="gps_n" name="gps_n" value=""  placeholder="N coordinate" >
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="gps_w">GPS Coordinates <strong>(W)</strong></label>
                                    <div>
                                        <input type="text" class="form-control" id="gps_w" name="gps_w" value=""  placeholder="W coordinate"  >
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Continue</button>
                                </div>

                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
