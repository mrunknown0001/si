@extends('layouts.app')

@section('title') Co-Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">
    
    {{-- Include co-admin-menu --}}
    @include('coadmin.co-admin-menu')

    <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">My Subjects</h3>
        </div>

	</div>
</div>
@endsection