@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Images</h3>
                        <a href="{{route('images.create')}}">Add Images</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($images as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>
                                        {{$data->filenames}}
                                        <img src="{{asset('files')}}/{{$data->filenames}}" alt="">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



