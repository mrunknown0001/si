<div class="modal fade" id="{{ $c->user_id }}-delete" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Teacher Removal Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove <strong class="text-capitalize">{{ $c->firstname }} {{ $c->lastname }}</strong> with ID Number: <strong>{{ $c->user_id }}</strong>?</p>
               
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('admin_get_remove_co_admin', $c->id) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
