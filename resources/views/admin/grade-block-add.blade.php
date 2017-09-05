@extends('layouts.app')

@section('title') Add New Grade Block - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add New Grade Block</h3>
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
	        			<strong><i class="fa fa-list fa-lg" aria-hidden="true"></i> Grade Block Details</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="{{ route('admin_post_add_grade_block') }}" method="POST" autocomplete="off">
	        				<!-- <div class="form-group">
	        					<input type="text" name="code" class="form-control text-uppercase" placeholder="Grade Block Code" />
	        				</div> -->
	        				<div class="form-group">
	        					<select name="grade_level" id="grade_level">
	        						<option value="">Select Grade Level</option>
	        						<option value="Grade7">Grade 7</option>
                                    <option value="Grade8">Grade 8</option>
                                    <option value="Grade9">Grade 9</option>
                                    <option value="Grade10">Grade 10</option>
                                    <option value="Grade11">Grade 11</option>
                                    <option value="Grade12">Grade 12</option>
	        					</select>
	        				</div>
	        				<div class="form-group">
	        					<input type="text" name="title" class="form-control text-capitalize" placeholder="Grade Block Title" />
	        				</div>
		        			<div class="form-group">
		        				<textarea name="description" id="description" cols="30" rows="10" class="form-control text-capitalize" placeholder="Description of the Grade Block..."></textarea>
		        			</div>
		        			<div class="form-group">
		        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		        				<button class="btn btn-primary">Add Grade Block</button>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>
       
    </div>

</div>
@endsection