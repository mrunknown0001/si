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
                        <strong>Assign Subject {{ ucwords($level) }}</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin_post_assign_subject') }}" method="POST">
                            <div class="form-group">
                                <select name="teacher" class="form-control text-capitalize">
                                    <option value="">Select Teacher</option>
                                    @foreach($co_admin as $ca)
                                    <option value="{{ $ca->id }}">{{ $ca->user_id }} - {{ $ca->firstname }} {{ $ca->lastname }}</option>
                                    @endforeach
                                    @if(count($co_admin) == 0)
                                    <option value="">No Teacher Registered</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="grade_section" id="" class="form-control">
                                    <option value="">Select Grade Section</option>
                                    @foreach($class as $c)
                                    <option value="{{ $c->id }}">{{ $c->level }} - {{ ucwords($c->name) }}</option>
                                    @endforeach
                                    @if(count($class) == 0)
                                    <option value="">No Section For This Grade Level</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="subject" class="form-control text-capitalize">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $s)
                                    <option value="{{ $s->id }}">{{ $s->title }}</option>
                                    @endforeach
                                    @if(count($subjects) == 0)
                                    <option value="">No Subject For This Grade Level</option>
                                    @endif
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