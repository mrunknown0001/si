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
		        			<li class="profile">ID: 12345</li>
		        			<li class="profile">Name: Juan Dela Cruz</li>
		        			<li class="profile">Email: juan@juan.com</li>
		        			<li class="profile">Mobile Number: 09123455556</li>
		        			<li class="profile">Birthday: 1/2/10</li>
		        		</ul>
	        		</div>
	        	</div>
        	</div>
        </div>

    </div>

</div>
@endsection