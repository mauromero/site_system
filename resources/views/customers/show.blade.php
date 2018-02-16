@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1> Customer Information</h1>

            <div class="card">
            <div class="card-header">
                {{ $customer->name }} {{ $customer->last_name }}
            </div>
            <div class="card-body">
                <p><label>Phone:&nbsp; </label>{{ $customer->phone }}</p>
                <p><label>Cellphone:&nbsp; </label>{{ $customer->cellphone }}</p>
                <a href="/customers/edit/{{ $customer->id }}" class="btn btn-primary">Edit</a>
            </div>
            </div>

            
           
        </div>
    </div>
</div>            

 @endsection 
