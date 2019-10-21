@extends('BackEnd.admin')
@section('title')
Category List
@endsection


@section('css')
    <link href="{{ asset('public/BackEnd_assets/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('title')
Category List
@endsection

@section('page_heading')
    <h3>Category List</h3>
@endsection

@section('button')
    <a href="{{route('admin.category.add')}}" class="btn btn-primary"><i class="fa fa-plus"> Category Add</i></a>

@endsection

@section('content')

    <div class="row ">
        <div class="white-box">
            <table class="table table-bordered  " id="user-datatable">
                <thead>
                {{--<tr>--}}
                <th>S.N.</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Added By</th>
                <th>Category Image</th>
                <th>Action</th>
                {{--</tr>--}}
                </thead>

                <tbody>
                @foreach($category as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->category_title}}</td>
                       <td>{{$value->category_summary}}</td>
                        <td>{{$value->added_by}}</td>
                        <td>
                            @if($value->category_image == null)
                                <img src="{{asset('image_upload/image_not_found.jpg')}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @else
                                <img src="{{asset('storage/'.$value->category_image)}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @endif
                        </td>
                        <td>
                            <a  href="{{route('admin.edit-category',$value->id)}}" >Edit</a>
                            ||<a  href="#deleteUser"  class="" data-toggle="modal"  data-id="{{$value->id}}" data-title="{{$value->title}}">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.delete-category',$value->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" class="id">
                        <p >Are you sure to delete this Category <span class="category_title"></span>?</p>
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


@section('scripts')
   
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
            modal.find('.id').text(name);
        })
    </script>
@endsection