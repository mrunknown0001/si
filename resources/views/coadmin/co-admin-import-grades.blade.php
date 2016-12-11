<?php

	$subjects = App\SubjectAssign::where('user_id', Auth::user()->id)->get();
    $imports = App\GradeImport::where('user_id', Auth::user()->id)->get();

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
                            	<select name="assigned_subject" class="form-control text-capitalize">
                            		@if(count($subjects) < 1)
                                    <option>No Assigned Subject</option>
                                    @else
                                    <option value="">Select Assigned Subject</option>
                                    @foreach($subjects as $s)
                                    <option value="{{ $s->id }}">{{ $s->subject->title }} - {{ $s->block->name }} - {{ $s->level->title }}</option>
                                    @endforeach
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
                @if(!empty($imports))
                <table class="table table-hover table-bordered">
                    <caption><strong>Your Imported Subjects</strong></caption>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Quarter</th>
                            <th>Grade/Year Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($imports as $i)
                        <tr>
                            <td class="text-capitalize">{{ $i->subject->title }}</td>
                            <td>
                                @if($i->quarter_id == 1)
                                1st
                                @elseif($i->quarter_id == 2)
                                2nd
                                @elseif($i->quarter_id == 3)
                                3rd
                                @elseif($i->quarter_id == 4)
                                4th
                                @endif
                            </td>
                            <td class="text-capitalize">
                                {{ $i->block->name }}/{{ $i->level->title }}
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                @else
                <h4>You haven't imported grades yet.</h4>
                @endif
                
        	</div>
        </div>

	</div>
</div>
@endsection