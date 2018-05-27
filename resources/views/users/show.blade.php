@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
                   
            <div class="card">
                <div class="card-header bg-primary text-white">
                    User Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $user->name }} {{ $user->last_name }}
                    </h5>   

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" {{ $user->active ? 'checked' : '' }} name="active" disabled>
                                <label class="form-check-label" for="active">
                                {{ $user->active ? 'Active' : 'Inactive' }} 
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item"><label>Name :&nbsp; </label>{{ $user->name }}</li>
                        <li class="list-group-item"><label>Last Name :&nbsp; </label>{{ $user->last_name }}</li>
                        <li class="list-group-item"><label>Email :&nbsp; </label>{{ $user->email }}</li>
                        <li class="list-group-item"><label>Phone :&nbsp; </label>{{ $user->phone }}</li>
                        <li class="list-group-item"><label>User Type :&nbsp; </label>{{ $user->role }}</li>

                    </ul>

                </div>
                <div class="card-footer text-center">
                    <a href="/users/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
                    <a href="/users" class="btn btn-primary">Back</a>
                </div>
            </div>

        </div>
    </div>
</div>            

 @endsection 
