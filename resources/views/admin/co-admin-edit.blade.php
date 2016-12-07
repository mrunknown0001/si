@extends('layouts.app')

@section('title') Edit Co-Admin - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Edit Adviser</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
	        	<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong><i class="fa fa-users fa-lg" aria-hidden="true"></i> Adviser Details</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="{{ route('admin_post_update_co_admin_profile') }}" method="POST" autocomplete="off">
	        				<div class="form-group">
	        					<input type="text" name="tin" class="form-control" value="{{ $user->user_id }}" placeholder="Employee Number" />
	        				</div>
		        			<div class="form-group">
		        				<input type="text" name="firstname" class="form-control" value="{{ $user->firstname }}" placeholder="First Name" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="lastname" class="form-control" value="{{ $user->lastname }}" placeholder="Last Name" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email Address" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}" placeholder="11 Digit Mobile Number" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="birthday" class="form-control" value="{{ $user->birthday }}" placeholder="MM/DD/YYYY" />
		        			</div>
		        			<div class="form-group">
		        				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	        					<input type="hidden" name="id" value="{{ $user->id }}" />
		        				<button class="btn btn-primary">Update Adviser</button>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>
       
    </div>

</div>
@endsection