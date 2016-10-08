@extends('layouts.app')

@section('title') Students Panel - Student Information System @endsection

@section('content')
{{-- Include Student Menu --}}
@include('students.students-menu')
<div class="container-fluid">">
    
    <div class="page-wrapper">
    	<div class="row">
    		<div class="col-lg-8 col-md-12 col-lg-offset-2">
    			{{-- Includes errors and session flash message display container --}}
		    	@include('includes.errors')
		    	@include('includes.error')
		    	@include('includes.success')
		    	@include('includes.notice')

		    	
    		</div>
    	</div>
    	
    </div>

</div>
@endsection