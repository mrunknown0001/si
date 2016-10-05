@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add New Co-Admin</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
	        	<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong>Fill in the Details</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="#" method="POST">
	        				<div class="form-group">
	        					<input type="text" name="user_id" class="form-control" placeholder="User ID" />
	        				</div>
		        			<div class="form-group">
		        				<input type="text" name="firstname" class="form-control" placeholder="First Name" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="lastname" class="form-control" placeholder="Last Name" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="email" class="form-control" placeholder="Email Address" />
		        			</div>
		        			<div class="form-group">
		        				<input type="text" name="mobile" class="form-control" placeholder="11 Digit Mobile Number" />
		        			</div>
		        			<div class="form-group">
		        				{{ csrf_field() }}
		        				<button class="btn btn-primary">Add Co-Admin</button>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>
       
    </div>

</div>
@endsection