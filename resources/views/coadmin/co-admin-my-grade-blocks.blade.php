@extends('layouts.app')

@section('title') My Grade Blocks - Co-Admin - Student Information System @endsection

@section('content')
<div id="wrapper">
    
    {{-- Include co-admin-menu --}}
    @include('coadmin.co-admin-menu')

    <div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h3 class="page-header">My Grade Blocks</h3>

	        </div>

		</div>
		<div class="row">
			<div class="col-lg-12">
				@if(!empty($block))
				<strong>{{ $block->leveltitle->title }} - {{ $block->blockname->name }}</strong>
				<hr/>
				<strong>List of Students - {{ $students->count() }}</strong>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>LRN</th>
							<th>Lastname</th>
							<th>Firstname</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
						<tr>
							<td>{{ $student->student_id }}</td>
							<td>{{ $student->student->lastname }}</td>
							<td>{{ $student->student->firstname }}</td>
							<td>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#{{ $student->student_id }}-view">View</button>

							</td>
						</tr>
						@include('coadmin.includes.student-view-details-modal')
						@endforeach
					</tbody>
				</table>
				@else
				<strong>No Assigned Block</strong>
				@endif
				
			</div>
		</div>
</div>
@endsection