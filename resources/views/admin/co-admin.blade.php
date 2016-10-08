@extends('layouts.app')

@section('title') Co-Admin - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Co-Admin</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('co_admin_add') }}">Add New Co-Admin</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('co_admin_view') }}">View All Co-Admins</a>
			</div>
		</div>
       
    </div>

</div>
@endsection