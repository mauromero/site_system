@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                    
                <div class="card">
                    <div class="card-header bg-primary text-white">
                            Users
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">@sortablelink('name','Name')</th>
                                        <th scope="col">@sortablelink('last_name','Last Name')</th>
                                        @if(Auth::user()->role == 'admin')  
                                        <th scope="col">@sortablelink('role','Role')</th>
                                        @endif
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <a href="/users/{{ $user->id }}" >
                                                {{ $user->name }} 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/users/{{ $user->id }}" >
                                                {{ $user->last_name }}
                                            </a>
                                        </td>
                                        @if( Auth::user()->role == 'admin' )  
                                        <td><a href="/users/{{ $user->id }}" >
                                                {{ $user->role}}
                                            </a></td>
                                          
                                        <td><a href="/users/edit/{{ $user->id }}" class="btn btn-sm btn-primary">Edit</a></td>
                                        @else
                                        <td><a href="/users/{{ $user->id }}" class="btn btn-sm btn-primary">See</a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->appends(\Request::except('page'))->links("pagination::bootstrap-4") }}


                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection