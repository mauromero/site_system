@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <!-- FORM -->            
            <form method="POST" action="/users/edit/{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                    
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Edit User
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-4" for="name">Name</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="name" name="name"  value="{{ $user->name }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="last_name">Last Name</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="last_name" name="last_name"  value="{{ $user->last_name }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="phone">Phone</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="phone" name="phone"  value="{{ $user->phone }}" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4" for="email">Email</label>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" id="email" name="email"  value="{{ $user->email }}" >
                            </div>
                        </div>
                        <hr>   
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" {{ $user->active ? 'checked' : '' }} name="active" id="active">
                            <label class="form-check-label" for="active">
                                Active
                            </label>
                        </div>  

                        <div class="form-group row">
                            <label class="col-sm-4" for="role">Role</label>
                            <div class="col-sm-8" >
                                
                            <select class="custom-select" name="role" id="role">
                                <option value="user" {{ $user->role == 'user'?'selected':''}} >User</option>
                                <option value="admin" {{ $user->role == 'admin'?'selected':''}} >Administrator</option>
                            </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success ">Save</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="/users"  class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    

        </div>
    </div>
</div>
@endsection
