@extends('layouts.app')

@section('title') Students - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Students</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('students_import') }}">Import Students</a>
			</div>
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('students_filter') }}">Students Filter</a>
            </div>
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('students_view') }}">View All Students</a>
			</div>
		</div>
       
    </div>

</div>
@endsection