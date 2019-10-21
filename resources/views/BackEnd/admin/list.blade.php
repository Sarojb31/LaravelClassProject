@extends('BackEnd.admin')

@section('css')
    <link href="{{ asset("public/assets/plugins/bower_components/datatables/jquery.dataTables.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('title')
    Admin List
@endsection

@section('page_heading')
    User List
@endsection

@section('content')
    <div class="row helo">
        <div class="white-box">
            <table class="table table-bordered  " id="user-datatable">
                <thead>
                    {{--<tr>--}}
                        <th>S.N.</th>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact no.</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Action</th>
                    {{--</tr>--}}
                </thead>

                <tbody>

                @foreach($user as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($value->user_avatar == null)
                                <img src="{{asset('public/image_upload/default_user.png')}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @else
                                <img src="{{asset('public/storage/'.$value->user_avatar)}}" alt="" style="max-width: 100px;" class="img img-responsive">
                            @endif
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->contact_number}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->created_at}}</td>
                        <td><span><a href="{{route('admin.user.edit',$value->id)}}">Edit</a></span> ||
                            <span>
                            <a  href="#deleteUser"  class="" data-toggle="modal"  data-id="{{$value->id}}" data-name="{{$value->name}}">Delete</a>
                            </span>
                            <!-- Modal -->
                        </td>


                    </tr>
                  
                @endforeach
                </tbody>
            </table>
         <div class="row">
            <a href="{{route('admin.user.register')}}"><i class="fa fa-user" data-icon="v"></i><span class="hide-menu">Add User</span></a> 
            </span></div>
        </div>

    </div>
    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.delete',$value->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" class="user_id">
                        <p >Are you sure to delete user <span class="user_name"></span>?</p>
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
            modal.find('.user_id').val(id);
            modal.find('.user_name').text(name);
        })
    </script>


@endsection