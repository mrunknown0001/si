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
                        <span class="text-capitalize">{{ $level->title }} - {{ $class_block->name }}</span>
                        <input type="hidden" name="level" value="{{ $level->id }}" />
                        <input type="hidden" name="block" value="{{ $class_block->id }}" />
                    </div>
                    <div class="form-group">
                        <select name="subject" id="" style="width: 50%;" class="form-control text-capitalize">
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