@extends('layouts.app')

@section('title') View Block Assignment - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View Block Assignment to Adviser</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Adviser Name</th>
                            <th>Block Name</th>
                            <th>Grade Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adviser as $a)
                        <tr>
                            <td class="text-capitalize">{{ $a->adviser->firstname }}  {{ $a->adviser->lastname }}</td>
                            <td class="text-capitalize">{{ $a->blockname->name }}</td>
                            <td class="text-capitalize">{{ $a->leveltitle->title }}</td>
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#{{ $a->id }}-view"> <i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#{{ $a->id }}-clear"> <i class="fa fa-eraser" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </tr>
                        @include('admin.includes.co-admin-assign-view-modal')
                        @include('admin.includes.co-admin-assign-clear-confirm-modal')
                        @endforeach
                    </tbody>
                </table>
            </div>          
	    </div>
    </div>

</div>
@endsection