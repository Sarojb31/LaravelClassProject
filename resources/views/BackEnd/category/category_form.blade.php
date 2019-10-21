@extends('BackEnd.admin')


@section('title')
    Category Add
@endsection

@section('page_heading')
    <h3>Category Add </h3>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('public/assets/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
@endsection

@section('button')
    <a href="{{route('admin.category')}}" class="btn btn-primary"><i class="fa fa-list"> Category List</i></a>

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
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.category.add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Title</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="title" placeholder="Enter Category Title"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="">Summary</label>
                    <div class="col-md-12">
                        <textarea name="summary" class="form-control"  cols="30" rows="10" placeholder="Enter Summary"></textarea>
                    </div>
                </div>

               

                <div class="form-group">
                    <label for="input-file-now" class="col-md-12">Category Image</label>
                    <input type="file" name="category_image" id="input-file-now" class="dropify"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Category" class="btn btn-success">
                </div>


            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('public/assets/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $('.dropify').dropify();

        $('#is_parent').change(function(){
            let temp = $('#is_parent').prop('checked');
            // alert(temp);
            if(temp){
                $('#parent_category').slideUp();
            }
            else{
                $('#parent_category').slideDown();

            }
        })
    </script>
@endsection