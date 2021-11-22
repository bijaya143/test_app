
@extends('layouts.app')
 
 @section('content')
   
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Upload mulitple Images</h3>
                        <a href="{{route('images.index')}}" class="btn btn-primary">Images</a>
                    </div>
                    <div class="card-body">
                        @if(count($errors)>0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{session()->get('message')}}
                        </div>
                        @endif
                        <form method="post" action="{{route('images.upload')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="filenames[]" class="myfrm form-control">
                            <div class="input-group-btn"> 
                                <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                            </div>
                            <div class="clone hide">
                                <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>


                        </form>        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- <script src="jquery/1.9.1/jquery.js"></script> -->
   
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-success").click(function(){ 
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".hdtuto control-group lst").remove();
            });
            });
    </script>
@endsection