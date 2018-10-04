@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Dashboard</div>
                <div class="card-body text-center">
                    <div class="card-columns">

                        <div class="card">
                            <div class="card-header">Customers</div>
                            <div class="card-body">
                                <p class="text-center">Manage the list customers</p>
                                <p class="text-center"><a class="btn btn-success" href="customers" role="button">Customers</a></p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">My Assessments</div>
                            <div class="card-body">
                                <p class="text-center">List of my assessment forms</p>
                                <p class="text-center"><a class="btn btn-success" href="{{ route('userforms') }}" role="button">My Forms</a></p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Create Assessment</div>
                            <div class="card-body">
                                <p class="text-center">Form to create a new assessment</p>
                                <p class="text-center"><a class="btn btn-success" href="/assessments/create" role="button">New Assessment</a></p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">Search Assessment</div>
                            <div class="card-body">
                                <p class="text-center">Search the list of assessments</p>
                                <p class="text-center"><a class="btn btn-success" href="assessments" role="button">Search Assessments</a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
