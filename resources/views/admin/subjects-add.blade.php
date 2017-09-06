<?php

	$level = App\GradeLevel::all();

?>

@extends('layouts.app')

@section('title') Add Subject - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add Subject</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')

	        	<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong><i class="fa fa-book fa-lg" aria-hidden="true"></i> Subject Details</strong>
	        		</div>
                    <form action="{{ route('admin_post_add_subject') }}" method="POST" autocomplete="off">
	        		<div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="level" class="form-control">
                                            <option value="">Subject For...</option>
                                            <option value="Grade7">Grade 7</option>
                                            <option value="Grade8">Grade 8</option>
                                            <option value="Grade9">Grade 9</option>
                                            <option value="Grade10">Grade 10</option>
                                            <option value="Grade11">Grade 11</option>
                                            <option value="Grade12">Grade 12</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="text" name="code" class="form-control text-uppercase" placeholder="Subject Code" />
                                    </div> -->
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control text-capitalize" placeholder="Subject Title" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control text-capitalize" placeholder="Description of the Subject..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="btn btn-primary">Add Subject</button>
                                        <a href="{{ route('subjects_view') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                
                            </div>
                            <!-- <div class="col-md-1"></div> -->
<!--                             <div class="col-md-3">
                                <strong>Percentage</strong>
                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Activity     </span>
                                        <input type="number" name="activity" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Assignment</span>
                                        <input type="number" name="assignment" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Attendance</span>
                                        <input type="number" name="attendance" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Quiz</span>
                                        <input type="number" name="quiz" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Project</span>
                                        <input type="number" name="project" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Exam</span>
                                        <input type="number" name="exam" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Other</span>
                                        <input type="number" name="other" value=0 class="form-control" placeholder="%" aria-label="%" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div> -->
                        </div>
	        			</form>
	        		</div>
	        	</div>
        		
        	</div>
        	
        </div>

       
    </div>

</div>
@endsection