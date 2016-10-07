@extends('layouts.app')

@section('title') Co-Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Co-Admin Menu --}}
    @include('coadmin.co-admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Co-Admin Profile</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
        		<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong>Co-Admin Details</strong>
	        		</div>
	        		<div class="panel-body">
		        		<ul>
		        			<li class="profile">ID: {{ $coadmin->user_id }}</li>
		        			<li class="profile">Name: {{ $coadmin->firstname }}  {{ $coadmin->lastname }}</li>
		        			<li class="profile">Email: {{ $coadmin->email }}</li>
		        			<li class="profile">Mobile Number: {{ $coadmin->mobile }}</li>
		        			<li class="profile">Birthday: {{ $coadmin->birthday }}</li>
		        		</ul>
	        		</div>
	        	</div>
        	</div>
        </div>

    </div>

</div>
@endsection