@extends('layouts.app')

@section('title') School Year - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">School Year</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('school_year_add') }}">Add New School Year</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('school_year_select_quarter') }}">Select Quarter</a>
			</div>
		</div>
       
    </div>

</div>
@endsection