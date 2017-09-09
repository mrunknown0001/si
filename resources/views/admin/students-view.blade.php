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
            <div class="col-lg-4">
                <form action="{{ route('student_search') }}" method="GET" autocomplete="off">
                    <div class="input-group custom-search-form">
                        <input type="text" name="keyword" class="form-control" placeholder="Search by ID Number or Name">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        
                    </div>
                </form>
            </div>
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
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $s)
                            <tr>
                                <td>{{ $s->user_id }}</td>
                                <td class="text-capitalize">{{ $s->lastname }}</td>
                                <td class="text-capitalize">{{ $s->firstname }}</td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#{{ $s->user_id }}-view"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <a href="{{ route('admin_get_edit_student_info', $s->user_id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>
                            @include('admin.includes.student-view-details-modal')
                        @endforeach
                    </tbody>
                </table>
                <!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $students->count() + $students->perPage() * ($students->currentPage() - 1) }} of {{ $students->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $students->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection