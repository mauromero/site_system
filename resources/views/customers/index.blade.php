@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Customers List </h1>
            <div class="list-group">
                @foreach ($customers as $customer)
                <a href="/customers/{{ $customer->id }}" class="list-group-item list-group-item-action"> {{ $customer->name }} {{ $customer->last_name }}  </a>

                @endforeach
            </ul>    
        </div>
    </div>
</div>     
@endsection