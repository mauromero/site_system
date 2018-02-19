@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tasks</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     @include('layouts.errors')

                    <div class="row">

                        <div class="col-sm-12">

                            <form method="POST" action="/tasks">
                            {{ csrf_field() }}

                                <div class="row" >
                                    <div class="col-sm-8">
                                        <p class="font-weight-bold"><label> Date :&nbsp;</label>{{ \Carbon\Carbon::now()->format('m/d/Y')}}</p>
                                        <p class="font-weight-bold"><label> User Name :&nbsp;</label>{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}  </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="hazard_id">Select Hazard</label>
                                    <select class="form-control" id="hazard_id"  name="hazard_id">
                                        <option value="">---</option>
                                        @foreach ($hazards as $hazard) 
                                            <option value="{{ $hazard->id }}">{{ $hazard->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="hazard">Hazard</label>
                                    <textarea class="form-control" id="hazard" name="hazard" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="measure">Hazard</label>
                                    <textarea class="form-control" id="measure" name="measure" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
