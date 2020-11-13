@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Pull requests info for 99minutos-fullstack-interview-test repo from chuchini.
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="list-group">
                            @foreach ($pullrequests as $item)
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $item['title'] }}</h5>
                                        @if ($item['state'] == 'open')
                                            <span class="badge badge-success">open</span>
                                        @elseif ($item['merged_at'] != null)
                                            <span class="badge badge-primary">merged</span>
                                        @elseif ($item['state'] == 'closed')
                                            <span class="badge badge-danger">closed</span>
                                        @endif
                                        
                                    </div>
                                    <p class="mb-1">{{ $item['user']['login'] }}</p>
                                    <div class="d-flex justify-content-end">
                                        @if ($item['state'] != 'closed')
                                            <button type="button" onclick="window.location.href = '/closepr/{{ $item['number'] }}'"
                                                    class="btn btn-danger">Close pull request</button>
                                        @endif
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