@extends('layouts.app')

@section('title') Edit Student Info - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Student Info</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-8">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-graduation-cap fa-lg"></i> Student Info</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin_post_update_student_info') }}" method="POST" autocomplete="off">
                            <div class="form-group">
                                <select name="grade_section" id="" class="form-control" autofocus="">
                                    <option value="">Select Grade &amp; Section</option>
                                    @foreach($sections as $sec)
                                    <option @if($sec->id == $info->section) selected @endif value="{{ $sec->id }}">{{ ucwords($sec->level) }} - {{ ucwords($sec->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="student_number" value="{{ $s->user_id }}" class="form-control text-capitalize" placeholder="Student Number" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="firstname" value="{{ $s->firstname }}" class="form-control text-capitalize" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" value="{{ $s->lastname }}" class="form-control text-capitalize" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" value="{{ $s->address }}" class="form-control text-capitalize" placeholder="Address" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="birthday" value="{{ date('m/d/Y', strtotime($s->birthday)) }}" class="form-control" placeholder="MM/DD/YYY" />
                            </div>
                            <div class="form-group">
                                <select name="sex" id="sex" class="form-control">
                                    <option value="">Select Gender...</option>
                                    <option @if($s->sex == 'Male') selected @endif value="Male">Male</option>
                                    <option @if($s->sex == 'Female') selected @endif value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" value="{{ $s->email }}" class="form-control" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" value="{{ $s->mobile }}" class="form-control" placeholder="11 Digit Mobile Number" />
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="id" value="{{ $s->id }}" />
                                <button class="btn btn-primary">Update Student Details</button>
                            </div>
                        </form>
                    </div>
                </div>         
            </div>
		</div>
       
    </div>

</div>
@endsection