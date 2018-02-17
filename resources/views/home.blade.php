@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <h2 class="text-center">Assessments</h2>
                            <p class="text-center">Information about this type of form. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                            <p class="text-center"><a class="btn btn-primary" href="/assessments" role="button">Form &raquo;</a></p>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="text-center">Form 2</h2>
                            <p class="text-center"> Information about this type of form. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                            <p class="text-center"><a class="btn btn-primary" href="#" role="button">Form &raquo;</a></p>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="text-center">Form 3</h2>
                            <p class="text-center">Information about this type of form. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                            <p class="text-center"><a class="btn btn-primary" href="#" role="button">Form &raquo;</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
