@extends('layouts.app')

@section('title') Add New Co-Admin - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add New Teacher</h3>
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
	        			<strong><i class="fa fa-users fa-lg" aria-hidden="true"></i> Teacher Details</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="{{ route('admin_post_add_co_admin') }}" method="POST" autocomplete="off">
	        				<div class="form-group">
	        					<input type="text" name="id_number" class="form-control" placeholder="ID Number (e.g.: 0000-0000)" autofocus="" />
	        				</div>
		        			<div class="form-group">
		        				<input type="text" name="firstname" class="form-control text-capitalize" placeholder="First Name" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="lastname" class="form-control text-capitalize" placeholder="Last Name" />
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
		        				<input type="text" name="address" class="form-control" placeholder="Address" />
		        			</div>
		        			<div class="form-group">
		        				<input type="email" name="email" class="form-control" placeholder="Email Address" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="mobile" class="form-control" placeholder="11 Digit Mobile Number" />
		        			</div>
		        			<div class="form-group">
		        				{{ csrf_field() }}
		        				<button class="btn btn-primary">Add Teacher</button>
		        				<a href="{{ route('co_admin_view') }}" class="btn btn-danger">Cancel</a>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>
       
    </div>

</div>
@endsection