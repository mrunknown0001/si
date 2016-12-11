<?php

    $co_admin = App\User::where('privilege', 2)->where('status', 1)->get();
    $grade_level = App\GradeLevel::all();
    $block = App\ClassBlock::all();
    $subjects = App\Subject::all();
?>

@extends('layouts.app')

@section('title') Assign Subject - Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Assign Subject</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>Assign Subject</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin_post_assign_subject') }}" method="POST">
                            <div class="form-group">
                                <select name="teacher" class="form-control text-capitalize">
                                    <option value="">Select Teacher</option>
                                    @foreach($co_admin as $ca)
                                    <option value="{{ $ca->id }}">{{ $ca->user_id }} - {{ $ca->firstname }} {{ $ca->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="level" class="form-control text-capitalize">
                                    <option value="">Select Grade Level</option>
                                    @foreach($grade_level as $l)
                                    <option value="{{ $l->id }}">{{ $l->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="block" class="form-control text-capitalize">
                                    <option value="">Select Class Block</option>
                                    @foreach($block as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="subject" class="form-control text-capitalize">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $s)
                                    <option value="{{ $s->id }}">{{ $s->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Assign Subject</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection