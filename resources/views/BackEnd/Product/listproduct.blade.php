@extends('BackEnd.admin')

@section('css')
    <link href="{{ asset('public/BackEnd_assets/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('title')
Book List
@endsection

@section('page_heading')
    <h3>LIST OF BOOKS AVAILABLE</h3>
@endsection


@section('button')
    <a href="{{route('admin.product.add')}}" class="btn btn-primary"><i class="fa fa-plus">Add Book</i></a>

@endsection

@section('content')

<div class="row ">
        <div class="white-box">
            <table class="table table-bordered  " id="user-datatable" title="PRODUCT TABLE">
                <thead>
                {{--<tr>--}}
                <th>S.N.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Summary</th>
                <th>Added By</th>
                <th>Category</th>
                <th>Product Image</th>
                <th>Action</th>
                {{--</tr>--}}
                </thead>
                
                <tbody>
                @foreach($product as $value)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->author}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->added_by}}</td>
                    <td>{{$value->category->category_title}}</td>
                    <td>
                            @if($value->product_image == null)
                                <img src="{{asset('image_upload/image_not_found.jpg')}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @else
                                <img src="{{asset('storage/'.$value->product_image)}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @endif
                        </td>
                       
                           <!--  <a  href="{{route('admin.edit-product',$value->id)}}" >Edit</a>
                            ||<a  href="{{route('admin.delete-product',$value->id)}}"  class="" data-toggle="modal"  data-id="{{$value->id}}" data-title="{{$value->title}}">Delete</a> -->

                              <td><span><a href="{{route('admin.edit-product',$value->id)}}">Edit</a></span> ||
                            <span>
                            <a  href="#deleteUser"  class="" data-toggle="modal"  data-id="{{$value->id}}" data-name="{{$value->name}}">Delete</a>
                            </span>
                           
                        
                        </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>

 <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Book Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete-product',$value->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" class="id">
                        <p >Are you sure to delete this Book <span class="product_name"></span>?</p>
                    </div> 
                    <div class="modal-footer" style="text-align: left;">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-check-circle"> Yes</i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"> No</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
   <script>
        $('#deleteUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id');
            var name = button.data('name');
            // var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.id').val(id);
            modal.find('.product_name').text(name);
        })
    </script>


@endsection
              

