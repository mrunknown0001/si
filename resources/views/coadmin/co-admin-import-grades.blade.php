<?php

	$subjects = App\SubjectAssign::where('user_id', Auth::user()->id)->get();

?>


@extends('layouts.app')

@section('title') Import Grades - Student Information System @endsection

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
                            	<select name="subject" class="form-control">
                            		@if(count($subjects) < 1)
                                    <option>No Assigned Subject</option>
                                    @else
                                    <option value="">Select Assigned Subject</option>
                                    @endif

                            	</select>
                            </div>
                            
                            <div class="form-group">

                                <input type="file" name="students" id="students" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" title="Select Excel Files Only" data-toggle="tooltip" data-placement="bottom" />

                            </div>

        					<div class="form-group">
        						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
        						<button class="btn btn-primary">Import Grades</button>
        					</div>
        				</form>
        			</div>
        		</div>
                <hr/>
                
        	</div>
        </div>

	</div>
</div>
@endsection