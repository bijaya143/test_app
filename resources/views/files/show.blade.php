@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>List</h3>
                    <a href="{{route('files.create')}}" class="btn btn-primary">ADD</a>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Files</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <td>{{$file->id}}</td>
                            <td>
                                <?php
                                foreach (json_decode($file->filenames) as $image) {
                                ?>
                                <img src="{{asset('files/'.$image)}}" alt="">
                                <?php } ?>
                            </td>
                            <td>
                                <a href="">Edit</a>
                                <a href="">Delete</a>
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
