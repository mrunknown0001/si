@extends('layouts.app')

@section('title') View All Subjects - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Subjects</h3>
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
                            <th>Grade Level</th>
        					<th>Subject Title</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
                        @foreach($subjects as $subject)
        				<tr>
                            <td class="text-capitalize">{{ $subject->level }}</td>
        					<td class="text-capitalize">{{ $subject->title }}</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success" data-toggle="modal" data-target="#{{ $subject->code }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<a href="{{ route('admin_get_edit_subject', strtoupper($subject->id)) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<button class="btn btn-danger" data-toggle="modal" data-target="#{{ $subject->id }}-remove"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
                        @include('admin.includes.subject-view-details-modal')
                        @include('admin.includes.subject-remove-confirm-modal')
                        @endforeach
        			</tbody>
        		</table>
        		<!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $subjects->count() + $subjects->perPage() * ($subjects->currentPage() - 1) }} of {{ $subjects->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $subjects->links() }}</div>
        	</div>
        </div>
    </div>
</div>
@endsection