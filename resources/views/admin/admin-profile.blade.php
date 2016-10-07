@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Admin Profile</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
        		<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong>Admin Details</strong>
	        		</div>
	        		<div class="panel-body">
		        		<ul>
		        			<li class="profile">ID: {{ $admin->user_id }}</li>
		        			<li class="profile">Name: {{ $admin->firstname }}  {{ $admin->lastname }}</li>
		        			<li class="profile">Email: {{ $admin->email }}</li>
		        			<li class="profile">Mobile Number: {{ $admin->mobile }}</li>
		        			<li class="profile">Birthday: {{ $admin->birthday }}</li>
		        		</ul>
	        		</div>
	        	</div>
        	</div>
        </div>

    </div>

</div>
@endsection