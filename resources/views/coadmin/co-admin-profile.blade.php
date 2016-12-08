@extends('layouts.app')

@section('title') My Profile - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Co-Admin Menu --}}
    @include('coadmin.co-admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">My Profile Profile <a href="{{ route('co_admin_show_profile_update') }}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></h3>
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
	        			<strong><i class="fa fa-user fa-lg" aria-hidden="true"></i> {{ !empty($ba)? 'Adviser' : 'Teacher' }} Details</strong>
	        		</div>
	        		<div class="panel-body">
		        		<ul>
		        			<li class="profile">Employee No.: {{ $coadmin->user_id }}</li>
		        			<li class="profile">Name: {{ $coadmin->firstname }}  {{ $coadmin->lastname }}</li>
		        			<li class="profile">Email: {{ $coadmin->email }}</li>
		        			<li class="profile">Mobile Number: {{ $coadmin->mobile }}</li>
		        			<li class="profile">Birthday: {{ date('F j, Y', strtotime($coadmin->birthday)) }}</li>
		        		</ul>
	        		</div>
	        	</div>
        	</div>
        </div>

    </div>

</div>
@endsection