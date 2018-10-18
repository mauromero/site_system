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

                        
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                    <th scope="col">@sortablelink('company','Company')</th>
                                    <th scope="col">@sortablelink('name','Name')</th>
                                    <th scope="col">@sortablelink('last_name','Last')</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>
                                            <a href="/customers/{{ $customer->id }}" >
                                            {{ $customer->company }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/customers/{{ $customer->id }}" >
                                            {{ $customer->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/customers/{{ $customer->id }}" >
                                            {{ $customer->last_name }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="row">
                        <div class="text-left col-sm-6">
                        {{ $customers->appends(\Request::except('page'))->links("pagination::bootstrap-4") }}
                        </div>
                        <div class="text-right col-sm-6">
                            <a class="btn btn-success" href="customers/create">New Customer</a>    
                        </div>
                    </div>
                        
                    </div>

                </div> <!-- card -->
            </div>
        </div>
    </div>     
@endsection