<div class="modal fade" id="{{ $block->code }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Grade Block Details</h4>
            </div>
            <div class="modal-body text-capitalize">
                <p>Grade Level: {{ $block->level }}</p>
                <p>Section Name: {{ $block->name }}</p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
