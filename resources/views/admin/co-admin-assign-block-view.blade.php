@extends('layouts.app')

@section('title') View Block Assignment - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View Block Assignemnt to Adviser</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-12">
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
                            <td>{{ $a->adviser->firstname }}  {{ $a->adviser->lastname }}</td>
                            <td>{{ $a->blockname->name }}</td>
                            <td>{{ $a->leveltitle->title }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>          
	    </div>
    </div>

</div>
@endsection