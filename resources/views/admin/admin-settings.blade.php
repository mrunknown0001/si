@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Admin Settings</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
	        	<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong>Change Password</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="#" method="POST">
	        				<div class="form-group">
	        					<input type="password" name="old_pass" class="form-control" placeholder="Old Password" />
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
@endsection