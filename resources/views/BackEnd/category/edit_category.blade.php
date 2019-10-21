@extends('BackEnd.admin')


@section('title')
    Category Edit
@endsection

@section('page_heading')
    <h3>Category Edit</h3>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('button')
    <a href="{{route('admin.category')}}" class="btn btn-primary"><i class="fa fa-list"> Category List</i></a>

@endsection

@section('content')
    <div class="row">
        <div class="white-box">
            @if($errors->has('edit_error'))
                <p style="color:red;">{{$errors->first('edit_error')}}</p>
            @endif
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.store-category')}}" method="post">
                @csrf
                <input type="hidden" name="category_id" value="{{$category->id}}">
                <div class="form-group">
                    <label class="col-md-12">Title</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="title" value="{{old('title') ?? $category->category_title}}" placeholder="Enter Banner Title"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="">Summary</label>
                    <div class="col-md-12">
                        <textarea name="summary" class="form-control"  cols="30" rows="10" placeholder="Enter Summary">{{$category->category_summary}}</textarea>
                    </div>
                </div>

            

                

                <div class="form-group">
                    <label for="input-file-now" class="col-md-12">Category Image</label>
                    <img src="{{ asset('public/storage/'.$category->category_image)}}" class="img img-responsive" style="max-width: 100px;">
                    <input type="file" name="category_image" id="input-file-now" class='dropify'/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Edit Category" class="btn btn-success">
                </div>


            </form>
        </div>
    </div>

@endsection

