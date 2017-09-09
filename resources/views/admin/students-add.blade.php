@extends('layouts.app')

@section('title') Add Student - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add Student</h3>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-8">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-graduation-cap"></i> Student's Info</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('post_add_student') }}" method="POST" autocomplete="off">
                            <div class="form-group">
                                <select name="grade_section" id="" class="form-control" autofocus="">
                                    <option value="">Select Grade &amp; Section</option>
                                    @foreach($sections as $s)
                                    <option value="{{ $s->id }}">{{ ucwords($s->level) }} - {{ ucwords($s->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="student_number" class="form-control text-capitalize" placeholder="Student Number" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control text-capitalize" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control text-capitalize" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control text-capitalize" placeholder="Address" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="birthday" class="form-control" placeholder="MM/DD/YYYY" />
                            </div>
                            <div class="form-group">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="">Select Gender...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="11 Digit Mobile Number" />
                            </div>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button class="btn btn-primary">Add Student</button>
                                <a href="{{ route('students_view') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>
@endsection