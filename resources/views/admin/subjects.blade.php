@extends('layouts.app')

@section('title') Subjects - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Subjects</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('subjects_add') }}">Add New Subject</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('subjects_view') }}">View All Subjects</a>
			</div>
		</div>
       
    </div>

</div>
@endsection