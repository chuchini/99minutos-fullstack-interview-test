@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create a new pull request
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-danger" role="alert" id="alert" hidden>
                            Please, make sure all fields are filled.
                        </div>
                        <div class="alert alert-danger" role="alert" id="alert-not-different" hidden>
                            Please, make sure head and base are different branches.
                        </div>
                        

                        <form id="createpr-form" action="/pullrequests/newpr" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="title"
                                    name="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Enter a description" style="resize: none;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">head branch</label>
                                <select name="head" class="custom-select mr-sm-2" id="head">
                                    @foreach ($branches as $item)
                                        <option value="{{$item['name']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">base branch</label>
                                <select name="base" class="custom-select mr-sm-2" id="base">
                                    @foreach ($branches as $item)
                                    <option value="{{$item['name']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-around">
                                <input type="submit" onclick="checkInputs()" name="create" class="btn btn-primary" value="Create pull request">
                                <input type="submit" onclick="checkInputs()" name="create_merge" class="btn btn-success" value="Create and merge">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
