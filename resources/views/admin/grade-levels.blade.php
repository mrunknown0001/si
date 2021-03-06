@extends('layouts.app')

@section('title') Grade Levels - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Grade Levels</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('grade_levels_add') }}">Add New Grade Level</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="#">View All Grade Levels</a>
			</div>
		</div>
       
    </div>

</div>
@endsection