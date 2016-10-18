<?php

	$subjects = App\Subject::all();

?>


@extends('layouts.app')

@section('title') Import Grades - Co-Admin - Student Information System @endsection

@section('content')
<div id="wrapper">
    
    {{-- Include co-admin-menu --}}
    @include('coadmin.co-admin-menu')

    <div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h3 class="page-header">Import Grades</h3>
	        </div>
		</div>
		<div class="row">
        	<div class="col-lg-6 col-md-8">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
        		<div class="panel panel-primary">
        			<div class="panel-heading">
        				<strong><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i> Import Grades</strong>
        			</div>
        			<div class="panel-body">
        				<form action="{{ route('co_admin_post_import_grades') }}" method="POST" enctype="multipart/form-data">
        					<div class="form-group">

								<input type="file" name="students" id="students" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" title="Select Excel Files Only" data-toggle="tooltip" data-placement="bottom" />

        					</div>
                            <div class="form-group">
                            	<select name="subject" class="form-control">
                            		<option value="">Select Subject</option>
                            		@foreach($subjects as $s)
									<option value="{{ $s->id }}">{{ $s->title }}</option>
									@endforeach
                            	</select>
                            </div>
        					<div class="form-group">
        						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
        						<button class="btn btn-primary">Import Grades</button>
        					</div>
        				</form>
        			</div>
        		</div>
                <hr/>

                <table class="table table-hover table-bordered">
                    <caption><strong>Imported Subjects</strong></caption>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Quarter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($first_quarter as $q)
                        <tr>
                            <td>{{ $q->subject->title }}</td>
                            <td>First Quarter</td>
                        </tr>
                        @endforeach
                        @foreach($second_quarter as $q)
                        <tr>
                            <td>{{ $q->subject->title }}</td>
                            <td>Second Quarter</td>
                        </tr>
                        @endforeach
                        @foreach($third_quarter as $q)
                        <tr>
                            <td>{{ $q->subject->title }}</td>
                            <td>Third Quarter</td>
                        </tr>
                        @endforeach
                        @foreach($forth_quarter as $q)
                        <tr>
                            <td>{{ $q->subject->title }}</td>
                            <td>Forth Quarter</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        	</div>
        </div>

	</div>
</div>
@endsection