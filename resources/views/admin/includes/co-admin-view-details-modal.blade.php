<div class="modal fade" id="{{ $c->user_id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Teacher Details</h4>
            </div>
            <div class="modal-body">
                <p>ID Number: {{ $c->user_id }}</p>
                <p class="text-capitalize">Name: {{ $c->firstname }} {{ $c->lastname }}</p>
                <p>Birthday: {{ date('F j, Y', strtotime($c->birthday)) }}</p>
                <p>Sex: {{ $c->sex }}</p>
                <p class="text-capitalize">Address: {{ $c->address }}</p>
                <p>Email: {{ $c->email }}</p>
                <p>Mobile: {{ $c->mobile }}</p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
