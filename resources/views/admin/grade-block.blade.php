@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Grade Block</h3>
            </div>
            
        </div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('grade_blocks_add') }}">Add New Grade Block</a>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="{{ route('grade_blocks_view') }}">View All Grade Blocks</a>
			</div>
		</div>
       
    </div>

</div>
@endsection