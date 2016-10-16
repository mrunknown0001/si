<div class="modal fade" id="{{ $student->student_id }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Details - {{ $block->leveltitle->title }} - {{ $block->blockname->name }}</h4>
            </div>
            <div class="modal-body">
                <p>LRN: {{ $student->student_id }}</p>
                <p>Name: {{ $student->student->firstname }}  {{ $student->student->lastname }}</p>
                <p>Email: {{ $student->student->email }}</p>
                <p>Mobile: {{ $student->student->mobile }}</p>
                <p>Birthday: {{ date('F j, Y', strtotime($student->student->birthday)) }}</p>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
