@extends('layouts.app')

@section('title') Settings - Student - Student Information System @endsection

@section('content')
{{-- Includes Student's Menu --}}
@include('students.students-menu')
<div class="container-fluid">

    <div class="row">
    	<div class="col-lg-8 col-md-12 col-lg-offset-2">
            <h3>Settings</h3>
    		<div class="row">
                <div class="col-lg-6 col-md-10">
                    {{-- Includes Errors and Success Message templates --}}
                    @include('includes.errors')
                    @include('includes.error')
                    @include('includes.success')
                    @include('includes.notice')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong><i class="fa fa-key fa-lg" aria-hidden="true"></i> Change Password</strong>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('students_post_change_password') }}" method="POST">
                                <div class="form-group">
                                    <input type="password" name="old_pass" class="form-control" placeholder="Old Password" autofocus="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="New Password" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confrim Password" />
                                </div>
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <button class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p><i>Note: Use alpha-numeric password, minimum password: 8</i></p>
                    
                </div>
            </div>
    	</div>
    </div>

</div>
@endsection