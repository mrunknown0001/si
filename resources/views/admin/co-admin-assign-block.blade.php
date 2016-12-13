<?php

    $co_admin = App\User::where('privilege', 2)->where('status', 1)->get();
    $grade_level = App\GradeLevel::all();
    $block = App\ClassBlock::all();
?>

@extends('layouts.app')

@section('title') Assign Block Co-Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Assign Block</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i> Assign Block/Section to Adviser</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin_post_assign_block') }}" method="POST">
                            <div class="form-group">
                                <select name="co_admin" class="form-control text-capitalize">
                                    <option value="">Select Co-Admin</option>
                                    @foreach($co_admin as $c)
                                    <option value="{{ $c->id }}">{{ $c->user_id }} - {{ $c->firstname }} {{ $c->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="grade_level" class="form-control text-capitalize">
                                    <option value="">Select Grade Level</option>
                                    @foreach($grade_level as $l)
                                    <option value="{{ $l->id }}">{{ $l->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="block" class="form-control text-capitalize">
                                    <option value="">Select Block/Class</option>
                                    @foreach($block as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button class="btn btn-primary">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>           
	    </div>
    </div>

</div>
@endsection