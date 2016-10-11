<div class="modal fade" id="{{ $subject->code }}-remove" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subject Removal Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove the subject with code: <strong class="text-uppercase">{{ $subject->code }}</strong>?</p>
               
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('admin_get_remove_subject', $subject->code) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
