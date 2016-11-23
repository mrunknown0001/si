@extends('layouts.app')

@section('title') Export Grade - Co-Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Co-Admin Menu --}}
    @include('coadmin.co-admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Export Grade</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
        		
                <form action="{{ route('co_admin_post_export_grade') }}" method="POST">
                    <div class="form-group">
                        <select name="level" id="" style="width: 50%;" class="form-control">
                            <option value="">Select Grade Level</option>
                            @foreach($levels as $l)
                                <option value="{{ $l->id }}">{{ $l->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="block" id="" style="width: 50%;" class="form-control">
                            <option value="">Select Block</option>
                            @foreach($class_block as $cb)
                                <option value="{{ $cb->id }}">{{ $cb->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="subject" id="" style="width: 50%;" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach($subjects as $s)
                                <option value="{{ $s->id }}">{{ $s->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="quarter" id="" style="width: 50%;" class="form-control">
                            <option value="">Select Quarter</option>
                            <option value="1">First Quarter</option>
                            <option value="2">Second Quarter</option>
                            <option value="3">Third Quarter</option>
                            <option value="4">Forth Quarter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Current School Year: {{ $year->from }} - {{ $year->to }}</strong>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Download</button>
                    </div>
                </form>

        	</div>
        </div>

    </div>

</div>
@endsection