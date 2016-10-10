@extends('layouts.app')

@section('title') Profile - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Admin Profile <a href="{{ route('admin_show_profile_update') }}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></h3>
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
	        			<strong><i class="fa fa-user fa-lg" aria-hidden="true"></i> Admin Details</strong>
	        		</div>
	        		<div class="panel-body">
		        		<ul>
		        			<li class="profile">TIN: {{ $admin->user_id }}</li>
		        			<li class="profile">Name: {{ $admin->firstname }}  {{ $admin->lastname }}</li>
		        			<li class="profile">Email: {{ $admin->email }}</li>
		        			<li class="profile">Mobile Number: {{ $admin->mobile }}</li>
		        			<li class="profile">Birthday: {{ date('F j, Y', strtotime($admin->birthday)) }}</li>
		        		</ul>
	        		</div>
	        	</div>
        	</div>
        </div>

    </div>

</div>
@endsection