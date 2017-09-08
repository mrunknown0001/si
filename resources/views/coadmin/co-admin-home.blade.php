@extends('layouts.app')

@section('title') Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">
    
    {{-- Include co-admin-menu --}}
    @include('coadmin.co-admin-menu')

    <div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="page-header">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
	        </div>

		</div>
		<div class="row">
           
		</div>

</div>
@endsection