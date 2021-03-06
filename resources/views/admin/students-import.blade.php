<?php

    $level = App\GradeLevel::all();
    $block = App\ClassBlock::all();
?>

@extends('layouts.app')

@section('title') Import Students - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Import Students</h3>
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
        				<strong><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i> Import Students List</strong>
        			</div>
        			<div class="panel-body">
        				<form action="{{ route('admin_import_student') }}" method="POST" enctype="multipart/form-data">
        					
                            <div class="form-group">
                                <select name="grade_level" class="form-control text-capitalize">
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
                                <select name="class_block" class="form-control text-capitalize">
                                    <option value="">Select Class Block</option>
                                    @foreach($block as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                <input type="file" name="students" id="students" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" title="Select Excel Files Only" data-toggle="tooltip" data-placement="bottom" />

                            </div>
        					<div class="form-group">
        						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
        						<button class="btn btn-primary">Import Students</button>
        					</div>
        				</form>
        			</div>
        		</div>
        	</div>
        </div>

       
    </div>

</div>
@endsection