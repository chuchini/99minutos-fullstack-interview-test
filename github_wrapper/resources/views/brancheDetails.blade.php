@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Commits for this branch
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                            
                            <div class="list-group">
                                @foreach ($branchInfo as $item)
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1">{{$item['commit']['message']}}</h5>
                                      <small>{{ $item['commit']['author']['date'] }}</small>
                                    </div>
                                    <p class="mb-1">{{$item['commit']['author']['email']}}</p>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" onclick="window.location.href = '/commit/{{ $item['sha'] }}'"
                                                class="btn btn-primary">Details</button>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
