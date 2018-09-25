@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-center">Create Assessment</h2>
                            <p class="text-center">Select this form to create a new assessment.</p>
                            <p class="text-center"><a class="btn btn-success" href="/assessments/create" role="button">Create Form &raquo;</a></p>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="text-center">Search Assessment</h2>
                            <p class="text-center">Search the list of assessments.</p>
                            <p class="text-center"><a class="btn btn-success" href="/assessments" role="button">Assessments List &raquo;</a></p>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
