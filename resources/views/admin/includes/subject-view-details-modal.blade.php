<div class="modal fade" id="{{ $subject->code }}-view" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subject Details</h4>
            </div>
            <div class="modal-body">
                <p>Grade Level: <span class="text-capitalize">{{ $subject->level}}</span></p>
                <p>Subject Title: <span class="text-capitalize">{{ $subject->title }}</span></p>
                <p class="text-capitalize">Description: <i>{{ $subject->description }}</i></p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Activity: {{ $subject->activity }}%</p>
                        <p>Assignment: {{ $subject->assignment }}%</p>
                        <p>Attendance: {{ $subject->attendance }}%</p>
                    </div>
                    <div class="col-md-6">
                        <p>Quiz: {{ $subject->quiz }}%</p>
                        <p>Project: {{ $subject->project }}%</p>
                        <p>Exam: {{ $subject->exam }}%</p>
                        <p>Other: {{ $subject->others }}%</p>

                    </div>
                </div>
                
                
            </div>
            <div class="modal-footer">
            
            </div>
        </div>

    </div>
</div>
