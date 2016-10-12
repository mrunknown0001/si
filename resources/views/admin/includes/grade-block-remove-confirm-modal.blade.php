<div class="modal fade" id="{{ $block->code }}-remove" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Grade Block Confirmation Removal</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this grade block: <strong>{{ $block->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('admin_get_grade_block_remove', $block->id) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
