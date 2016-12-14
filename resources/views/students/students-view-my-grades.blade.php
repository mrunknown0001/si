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
                <h4 class="text-center">Report of Grades</h4>
            </div>
            <p><strong id="headtitle">My Grades</strong></p>

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
            			<th class="text-center">Fourth</th>
            		</tr>
            	</thead>
            	<tbody>
                    @foreach($all_subjects as $as)
                    <tr>
                        <th class="text-center text-capitalize">{{ $as->title }}</th>

                        @foreach($subjects as $s)
                        <th class="text-center">
                            @foreach($first_quarter_grade as $fqg)
                                @if($fqg->subject_id == $as->id)
                                    <button class="btn btn-link" data-toggle="modal" data-target="#first">{{ $fi = $fqg->grade }}</button>
                                    @include('students.includes.first-raw-grade')                           
                                @endif
                            @endforeach
                        </th>
                        <th class="text-center">
                            @foreach($second_quarter_grade as $sqg)
                                @if($sqg->subject_id == $as->id)
                                    <button class="btn btn-link" data-toggle="modal" data-target="#second">
                                    {{ $se = $sqg->grade }}</button>
                                    @include('students.includes.second-raw-grade')
                                @endif
                            @endforeach
                        </th>
                        <th class="text-center">
                            @foreach($third_quarter_grade as $tqg)
                                @if($tqg->subject_id == $as->id)
                                    <button class="btn btn-link" data-toggle="modal" data-target="#third">
                                    {{ $t = $tqg->grade }}</button>
                                    @include('students.includes.third-raw-grade')
                                @endif
                            @endforeach
                            
                        </th>
                        <th class="text-center">
                            @foreach($forth_quarter_grade as $fqg)
                                @if($fqg->subject_id == $as->id)
                                    <button class="btn btn-link" data-toggle="modal" data-target="#forth">
                                    {{ $fo = $fqg->grade }}</button>
                                    @include('students.includes.forth-raw-grade')
                                @endif
                            @endforeach
                        </th>
                        <th class="text-center">
                            @if(!empty($fi) && !empty($se) && !empty($t) && !empty($fo))
                                {{ ($fi + $se + $t + $fo)/4 }}
                            @endif
                        </th>
                        <!-- <th class="text-center"></th> -->
                        @endforeach
                    </tr>
                    @endforeach
                    
            	</tbody>
            </table>
            <p class="text-center"><strong>System Generated. Not Official copy of Report of Grades</strong></p>
    		<p id="footnote"><i>Note: Some grades are subject for availability in database.</i></p>
    	</div>
        <div class="col-lg-8 col-md-12 col-lg-offset-2">
            <a id="printbutton" href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</a>   
        </div>
        
    </div>

</div>
@endsection