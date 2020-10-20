@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Commit Info
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                            
                            <div class="list-group">
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="font-weight-bold">Message:</p>
                                    </div>
                                    <div class="col">
                                        <p>{{ $commitInfo['commit']['message'] }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="font-weight-bold">Author Nickname:</p>
                                    </div>
                                    <div class="col">
                                        <p class="">{{ $commitInfo['author']['login'] }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="font-weight-bold">Author Name:</p>
                                    </div>
                                    <div class="col">
                                        <p>{{ $commitInfo['commit']['author']['name'] }}</p>
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="font-weight-bold">Email:</p>
                                    </div>
                                    <div class="col">
                                        <p>{{ $commitInfo['commit']['author']['email'] }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="font-weight-bold">Number of files changed:</p>
                                    </div>
                                    <div class="col">
                                        <p>{{ count($commitInfo['files']) }}
                                    </div>
                                </div>

                                
                                
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection