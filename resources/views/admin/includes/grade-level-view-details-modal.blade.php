<div class="modal fade" id="{{ $l->code }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Grade Levels Details</h4>
            </div>
            <div class="modal-body">
                <p class="text-uppercase">Grade Level Code: {{ $l->code }}</p>
                <p class="text-capitalize">Grade Level Title: {{ $l->title }}</p>
                <p class="text-capitalize">Description: <i>{{ $l->description }}</i></p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
