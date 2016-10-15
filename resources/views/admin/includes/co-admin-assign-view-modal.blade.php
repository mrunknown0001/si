<div class="modal fade" id="{{ $a->id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adviser Class/Block Assignment Details</h4>
            </div>
            <div class="modal-body">
                <p>Adviser: {{ $a->adviser->firstname }} {{ $a->adviser->lastname }}</p>
                <p>Block Assigned: {{ $a->blockname->name }}</p>
                <p>Grade Level: {{ $a->leveltitle->title }}</p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
