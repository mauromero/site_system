@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <!-- FORM -->            
            <form method="POST" action="/customers/edit/{{ $customer->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit Customer
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label class="col-sm-4" for="company">Company</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="company" name="company"  value="{{ $customer->company }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="name">Name</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="name" name="name"  value="{{ $customer->name }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="last_name">Last Name</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="last_name" name="last_name"  value="{{ $customer->last_name }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="phone">Phone</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="phone" name="phone"  value="{{ $customer->phone }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="cellphone">Cellphone</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="cellphone" name="cellphone"  value="{{ $customer->cellphone }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="email">Email</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="email" name="email"  value="{{ $customer->email }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="address">Address</label>
                            <div class="col-sm-8" >
                                <textarea class="form-control" id="address" name="address" rows="3">{{ $customer->address }}</textarea>
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
