@extends('BackEnd.admin')


@section('title')
    Books Edit
@endsection

@section('page_heading')
   <h3>Books Edit</h3> 
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('button')
    <a href="{{route('admin.product')}}" class="btn btn-primary"><i class="fa fa-list"> Product List</i></a>

@endsection

@section('content')
    <div class="row">
        <div class="white-box">
            @if($errors->has('edit_error'))
                <p style="color:red;">{{$errors->first('edit_error')}}</p>
            @endif
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.store-product')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="form-group">
                    <label class="col-md-12">Title</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="product_name" value="{{old('title') ?? $product->product_name}}" placeholder="Enter"> </div>
                </div>

                <div class="form-group">
                  <label class="col-md-12">Author</label>
                    <div class="col-md-12">
                       <input type="text" class="form-control" name="author" placeholder="Enter Author Name" value="{{old('brand')}}">
                        </div>
                </div>


                        <div class="form-group">
                            
                    </div>


                <div class="form-group">
                    <label class="col-md-12" for="">Description</label>
                    <div class="col-md-12">
                        <textarea name="summary" class="form-control" cols="30" rows="10" placeholder="Enter Summary">{{$product->description}}</textarea>
                    </div>
                </div>

               
            

                

                <div class="form-group">
                    <label for="input-file-now" class="col-md-12">Product Image</label>
                    <img src="{{ asset('public/storage/'.$product->product_image)}}" class="img img-responsive" style="max-width: 100px;">
                    <input type="file" name="category_image" id="input-file-now" class='dropify'/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Edit Book" class="btn btn-success">
                </div>


            </form>
        </div>
    </div>

@endsection

