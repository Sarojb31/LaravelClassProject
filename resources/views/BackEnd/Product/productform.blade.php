@extends('BackEnd.admin')


@section('title')
    Books Add
@endsection

@section('page_heading')
    <h3>Add Books</h3>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('button')
    <a href="{{route('admin.product')}}" class="btn btn-primary"><i class="fa fa-list"> Product List</i></a>

@endsection

@section('content')
 @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    @endif
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.product.add')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Book Name</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Name of the Book" value="{{old('title')}}">
                        </div>
                    </div>

                   

                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price for the Book" value="{{old('price')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" placeholder="No. of book" value="{{old('title')}}">
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label">Author</label>
                            <input type="text" class="form-control" name="author" placeholder="Enter Author Name" value="{{old('brand')}}">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" ></textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Category</label>
                            <select name="category" id="parent_category" class="form-control">
                                <option value="0" selected>---Select Any One Category---</option>
                                @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->category_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-file-now" class="col-md-12">Product Image</label>
                            <input type="file" name="product_image" id="input-file-now" class="dropify"/>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-file-now" class="col-md-12">Other Image</label>
                            <input type="file" name="other_images[]" multiple>
                        </div>
                    </div>
                </div>
 -->

                <div class="form-group">
                    <input type="submit" value="Add Book" class="btn btn-success">
                </div>


            </form>
        </div>
    </div>

@endsection

