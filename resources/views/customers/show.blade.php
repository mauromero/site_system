@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
                   
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Customer Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $customer->name }} {{ $customer->last_name }}
                    </h5>   

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><label>Company :&nbsp; </label>{{ $customer->company }}</li>
                        <li class="list-group-item"><label>Phone :&nbsp; </label>{{ $customer->phone }}</li>
                        <li class="list-group-item"><label>Cellphone :&nbsp; </label>{{ $customer->cellphone }}</li>
                        <li class="list-group-item"><label>Email :&nbsp; </label>{{ $customer->email }}</li>
                        <li class="list-group-item"><label>Address :&nbsp; </label>{{ $customer->address }}</li>
                    </ul>

                </div>
                <div class="card-footer text-center">
                    <a href="/customers/edit/{{ $customer->id }}" class="btn btn-primary">Edit</a>
                    <a href="/customers" class="btn btn-primary">Back</a>
                </div>
            </div>

        </div>
    </div>
</div>            

 @endsection 
