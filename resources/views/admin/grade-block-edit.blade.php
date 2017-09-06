@extends('layouts.app')

@section('title') Edit Grade Block - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Grade Block</h3>
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
	        			<form action="{{ route('admin_post_grade_block_update') }}" method="POST" autocomplete="off"><div class="form-group">
                                <select name="level" class="form-control">
                                    <option value="">Subject For...</option>
                                    <option @if($block->level == 'Grade7') selected @endif value="Grade7">Grade 7</option>
                                    <option @if($block->level == 'Grade8') selected @endif value="Grade8">Grade 8</option>
                                    <option @if($block->level == 'Grade9') selected @endif value="Grade9">Grade 9</option>
                                    <option @if($block->level == 'Grade10') selected @endif value="Grade10">Grade 10</option>
                                    <option @if($block->level == 'Grade11') selected @endif value="Grade11">Grade 11</option>
                                    <option @if($block->level == 'Grade12') selected @endif value="Grade12">Grade 12</option>
                                </select>
                            </div>
	        				<div class="form-group">
	        					<input type="text" name="title" class="form-control text-capitalize" value="{{ $block->name }}" placeholder="Section Name" />
	        				</div>
		        			<div class="form-group">
		        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		        				<input type="hidden" name="id" value="{{ $block->id }}" />
		        				<button class="btn btn-primary">Update Grade Block</button>
		        				<a href="{{ route('grade_blocks_view') }}" class="btn btn-danger">Cancel</a>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>
       
    </div>

</div>
@endsection