@extends('layouts.app')

@section('title') View All Students - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Students</h3>
            </div>          
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
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
                        @foreach($students as $s)
                            <tr>
                                <td>{{ $s->user_id }}</td>
                                <td>{{ $s->lastname }}</td>
                                <td>{{ $s->firstname }}</td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#{{ $s->user_id }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>
                            @include('admin.includes.student-view-details-modal')
                        @endforeach
                    </tbody>
                </table>
                <!-- Count and Total count() of total() -->
                <!-- Page Number render() -->
            </div>
        </div>
    </div>
</div>
@endsection