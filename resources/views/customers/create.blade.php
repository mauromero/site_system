@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @include('layouts.errors')

            <!-- FORM -->            
            <form method="POST" action="/customers">
                        {{ csrf_field() }}
                    
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        New Customer
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-4" for="company">Company :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="name">Name :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="last_name">Last Name :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="phone">Phone :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="cellphone">Cellphone :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{ old('cellphone') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="email">Email :</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="address">Address :</label>
                            <div class="col-sm-8" >
                                <textarea class="form-control" id="address" name="address" rows="3">
                                {{ old('address') }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="address">Notes :</label>
                            <div class="col-sm-8" >
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success ">Save</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="/customers"  class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    

        </div>
    </div>
</div>
@endsection
