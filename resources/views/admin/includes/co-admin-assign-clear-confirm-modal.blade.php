<div class="modal fade" id="{{ $a->id }}-clear" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Clear Assignment confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to clear block/class assignment to <strong>{{ $a->adviser->firstname }} {{ $a->adviser->lastname }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin_clear_block_assign', $a->id) }}" method="GET">
                    <div class="form-group">
                        <button class="btn btn-warning">Clear Block Assign</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
