
{{--category delete modal--}}
<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.category.delete-category')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id">
                    <p>Are you sure to delete Category <span class="title"></span>?</p>
                </div>
                <div class="modal-footer" style="text-align: left;">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-check-circle"> Yes</i></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"> No</i></button>
                </div>
            </form>
        </div>
    </div>
</div>