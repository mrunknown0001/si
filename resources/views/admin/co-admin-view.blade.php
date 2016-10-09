@extends('layouts.app')

@section('title') View All Co-Admins - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Co-Admins</h3>
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
        					<th>ID Number</th>
        					<th>Full Name</th>
        					<th>Email</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
                        @foreach($ca as $c)
        					<td>{{ $c->user_id }}</td>
        					<td>{{ $c->firstname }}  {{ $c->lastname }}</td>
        					<td>{{ $c->email }}</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#{{ $c->user_id }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>

                                    <a href="{{ route('admin_get_edit_co_admin', $c->user_id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    <button class="btn btn-danger" data-toggle="modal" data-target="#{{ $c->user_id }}-delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                            </td>
        				</tr>
                        @include('admin.includes.co-admin-remove-confirm-modal')
                        @include('admin.includes.co-admin-view-details-modal')
                        @endforeach
        			</tbody>
        		</table>
        		<!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $ca->count() + $ca->perPage() * ($ca->currentPage() - 1) }} of {{ $ca->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $ca->links() }}</div>
        	</div>
        </div>
    </div>
</div>
@endsection