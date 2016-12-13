@extends('layouts.app')

@section('title') Update Profile - Students - Student Information System @endsection

@section('content')
{{-- Include Student Menu --}}
@include('students.students-menu')
<div class="container-fluid">
    
    <div class="page-wrapper">
    	<div class="row">
    		<div class="col-lg-8 col-md-12 col-lg-offset-2">
                <h3>Update My Profile</h3>

    			{{-- Includes errors and session flash message display container --}}
		    	@include('includes.errors')
		    	@include('includes.error')
		    	@include('includes.success')
		    	@include('includes.notice')

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-user fa-lg" aria-hidden="true"></i> Update Profile</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('students_post_profile_update') }}" method="POST" autocomplete="off">
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control text-capitalize" value="{{ $student->firstname }}" placeholder="First Name" autofocus="" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control text-capitalize" value="{{ $student->lastname }}" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{ $student->email }}" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <input type="Number" name="mobile" class="form-control" value="{{ $student->mobile }}" placeholder="11 Digit Mobile Number" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="birthday" class="form-control" value="{{ date('m/d/Y', strtotime($student->birthday)) }}" placeholder="MM/DD/YYY" autofocus="" />
                            </div>
                            <div class="form-group">
                                <hr/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password to Confirm" />
                            </div>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>

		    	
    		</div>
    	</div>
    	
    </div>

</div>
@endsection