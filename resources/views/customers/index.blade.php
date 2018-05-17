@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                    
                <div class="card">
                    <div class="card-header bg-primary text-white">

                        <div class="row">
                        <div class="text-left col-sm-6">
                            Customers
                        </div>

                        <div class="text-right col-sm-6">
                            <a class="btn btn-outline-light" href="customers/create">
                                New Customer
                            </a>    
                        </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>
                                            <a href="/customers/{{ $customer->id }}" >
                                                {{ $customer->name }} {{ $customer->last_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/customers/{{ $customer->id }}" >
                                                {{ $customer->company }}
                                            </a>
                                        </td>
                                        <td><a href="/customers/edit/{{ $customer->id }}" class="btn btn-sm btn-primary">Edit</a></td>
                                        <td><a href="/customers/delete/{{ $customer->id }}" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>     
@endsection