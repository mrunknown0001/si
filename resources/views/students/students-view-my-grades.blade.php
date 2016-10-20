@extends('layouts.app')

@section('title') My Grades - Student Information System @endsection

@section('content')
{{-- Includes Student's Menu --}}
@include('students.students-menu')
<div class="container-fluid">

    <div class="row">
    	<div id="myGrades" class="col-lg-8 col-md-12 col-lg-offset-2">
            <div id="info">
                <h4 class="text-center">Bamban National High School - San Clemente, Tarlac</h4>
                <p>Student Name: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                <p>LRN: {{ Auth::user()->user_id }}</p>
                <h4 class="text-center">Printable Grades</h4>
            </div>
            <strong id="headtitle">My Grades</strong>

            <table class="table table-hover table-bordered text-center" style="border: 3px solid #dddddd !important">
            	<thead>
            		<tr>
            			<th style="vertical-align: middle;" rowspan="2" class="text-center">Subject</th>
            			<th colspan="4" class="text-center">Quarters</th>
                        <th style="vertical-align: middle;" rowspan="2" class="text-center">Final Grade</th>
                        <!-- <th style="vertical-align: middle;" rowspan="2" class="text-center">Remarks</th> -->
            		</tr>
            		<tr>
            			<th class="text-center">First</th>
            			<th class="text-center">Second</th>
            			<th class="text-center">Third</th>
            			<th class="text-center">Forth</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr>
            			@foreach($subjects as $s)
            			<th class="text-center">{{ $s->subject->title }}</th>
            			<th class="text-center">
            				@foreach($first_quarter_grade as $fqg)
								@if($fqg->subject_id == $s->subject_id)
									{{ $fqg->grade }}
								@endif
            				@endforeach
            			</th>
            			<th class="text-center">
            				@foreach($second_quarter_grade as $sqg)
								@if($sqg->subject_id == $s->subject_id)
									{{ $sqg->grade }}
								@endif
            				@endforeach
            			</th>
            			<th class="text-center">
            				@foreach($third_quarter_grade as $tqg)
								@if($tqg->subject_id == $s->subject_id)
									{{ $tqg->grade }}
								@endif
            				@endforeach
            				
            			</th>
            			<th class="text-center">
            				@foreach($forth_quarter_grade as $fqg)
								@if($fqg->subject_id == $s->subject_id)
									{{ $fqg->grade }}
								@endif
            				@endforeach
            			</th>
                        <th class="text-center"></th>
                        <!-- <th class="text-center"></th> -->
						@endforeach
            		</tr>
                    <tr>
                        <td style="visibility: hidden !important;"></td>
                        <td colspan="4" class="text-center"><strong>General Average</strong></td>
                        <td></td>
                        
                    </tr>
            	</tbody>
            </table>
    		<p id="footnote"><i>Note: Some grades are subject for availability in database.</i></p>
    	</div>
        <div class="col-lg-8 col-md-12 col-lg-offset-2">
            <a id="printbutton" href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</a>   
        </div>
        
    </div>

</div>
@endsection