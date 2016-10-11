@extends('layouts.app')

@section('title') View All Grade Levels - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Grade Levels</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-12 col-md-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th>Grade Level Code</th>
        					<th>Grade Level Title</th>
        					<th>Description</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
                        @foreach($levels as $l)
        				<tr>
        					<td class="text-uppercase">{{ $l->code }}</td>
        					<td>{{ $l->title }}</td>
        					<td>{{ $l->description }}</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success" data-toggle="modal" data-target="#{{ $l->code }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<a href="{{ route('admin_show_grade_level_edit', $l->code) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<button class="btn btn-danger" data-toggle="modal" data-target="#{{ $l->code }}-remove"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
                        @include('admin.includes.grade-level-view-details-modal')
                        @include('admin.includes.grade-level-remove-confirm-modal')
        				@endforeach
        			</tbody>
        		</table>
        		<!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $levels->count() + $levels->perPage() * ($levels->currentPage() - 1) }} of {{ $levels->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $levels->links() }}</div>
        	</div>
        </div>
    </div>
</div>
@endsection