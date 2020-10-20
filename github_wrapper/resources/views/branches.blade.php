@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Available Branches for 99minutos-fullstack-interview-test repo from chuchini.
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="list-group">
                            @foreach ($branches as $item)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <h5 class="mb-1">{{$item['name']}}</h5>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" onclick="window.location += '/info/{{ $item['commit']['sha'] }}'"
                                                class="btn btn-primary">More info</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
