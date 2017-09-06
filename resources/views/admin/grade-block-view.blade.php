@extends('layouts.app')

@section('title') View All Grade Blocks - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Grade Blocks</h3>
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
        					<th>Level</th>
        					<th>Section Name</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
                        @foreach($blocks as $block)
        				<tr>
        					<td class="text-capitalize">{{ $block->level }}</td>
        					<td class="text-capitalize">{{ $block->name }}</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success" data-toggle="modal" data-target="#{{ $block->code }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<a href="{{ route('admin_show_grade_block_edit', $block->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<button class="btn btn-danger" data-toggle="modal" data-target="#{{ $block->code }}-remove"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
        				@include('admin.includes.grade-block-view-details-modal')
                        @include('admin.includes.grade-block-remove-confirm-modal')
                        @endforeach
        			</tbody>
        		</table>
        		<!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $blocks->count() + $blocks->perPage() * ($blocks->currentPage() - 1) }} of {{ $blocks->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $blocks->links() }}</div>
        	</div>
        </div>
        
    </div>
</div>
@endsection