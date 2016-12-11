<div class="modal fade" id="{{ $a->user_id }}-remove" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subject Assign Removal</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove subject assignment? <strong class="text-capitalize">{{ $a->user->firstname }} {{ $a->user->lastname }}::{{ $a->subject->title }}</strong></p>
               
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('admin_get_subject_assign_remove', $a->id) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
