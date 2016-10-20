@extends('layouts.app')

@section('title') LRN Search Result - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">LRN Search Result</h3>
            </div>          
        </div>

        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('student_search') }}" method="GET" autocomplete="off">
                    <div class="input-group custom-search-form">
                        <input type="text" name="keyword" class="form-control" placeholder="Search by LRN or by Last Name...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        
                    </div>
                </form>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="alert alert-success text-center fade in top-space">
                    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <b>Showing the exactly match LRN in records</b>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>LRN (Learner Reference Number)</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $s->user_id }}</td>
                            <td>{{ $s->lastname }}</td>
                            <td>{{ $s->firstname }}</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                <button class="btn btn-success" data-toggle="modal" data-target="#{{ $s->user_id }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <a href="{{ route('admin_get_edit_student_info', $s->user_id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>

                            </td>
                        </tr>
                        @include('admin.includes.student-view-details-modal')
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection