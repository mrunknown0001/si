<div class="modal fade" id="{{ $subject->code }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subject Details</h4>
            </div>
            <div class="modal-body">
                <p>Subject For: <span class="text-capitalize">{{ $subject->level->title }}</span></p>
                <p>Subject Code: <span class="text-uppercase">{{ $subject->code }}</span></p>
                <p>Subject Title: <span class="text-capitalize">{{ $subject->title }}</span></p>
                <p class="text-capitalize">Description: <i>{{ $subject->description }}</i></p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
