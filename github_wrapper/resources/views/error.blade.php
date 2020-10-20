@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Error!
                    </div>

                    <div class="card-body">
                        <div class="error-template">
                            <h1>
                                Oops!</h1>
                            <h5>
                                It ocurred an error while we were trying to create or merge your pull request</h5>
                            <div class="error-details">
                                Please make sure the pull request
                                is valid and as well the merge.
                            </div>
                            <center>
                                <div class="error-actions mt-2">
                                <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                    Take Me Home </a>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
