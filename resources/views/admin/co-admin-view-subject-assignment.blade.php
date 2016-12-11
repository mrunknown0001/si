@extends('layouts.app')

@section('title') Subject Assignments - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Subject Assignments</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Class Block</th>
                            <th>Grade Level</th>
                            <th>Teacher's Name</th>
                            <th>Employee Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assigns as $a)
                        <tr>
                            <td class="text-capitalize">{{ $a->subject->title }}</td>
                            <td class="text-capitalize">{{ $a->block->name }}</td>
                            <td class="text-capitalize">{{ $a->level->title }}</td>
                            <td class="text-capitalize">{{ $a->user->firstname }} {{ $a->user->lastname }}</td>
                            <td class="text-capitalize">{{ $a->user->user_id }}</td>
                            <td>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{ $a->user_id }}-remove"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </td>
                            @include('admin.includes.subject-assign-remove-modal')
                        @endforeach
                    </tbody>
                </table>

                <!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $assigns->count() + $assigns->perPage() * ($assigns->currentPage() - 1) }} of {{ $assigns->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $assigns->links() }}</div>
            </div>
        </div>
    </div>

</div>
@endsection