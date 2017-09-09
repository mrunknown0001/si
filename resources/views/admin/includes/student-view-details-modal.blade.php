<?php
    $info = App\StudentInfo::where('student_id', $s->user_id)->first();
?>

<div class="modal fade" id="{{ $s->user_id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Details</h4>
            </div>
            <div class="modal-body">
                <strong>
                <p class="text-capitalize">Grade: {{ $info->level }} - {{ $info->block->name }}</p>
                <p>Student Number: {{ $s->user_id }}</p>
                <p class="text-capitalize">Name: {{ $s->firstname }} {{ $s->lastname }}</p>
                <p>Birthday: {{ date('F j, Y', strtotime($s->birthday)) }}</p>
                <p>Sex: {{ $s->sex }}</p>
                <p class="text-capitalize">Address: {{ $s->address }}</p>
                <p>Email: {{ $s->email }}</p>
                <p>Mobile: {{ $s->mobile }}</p>
                </strong>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>

    </div>
</div>
