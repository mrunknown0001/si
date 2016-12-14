@extends('layouts.app')

@section('title') Students Panel - Student Information System @endsection

@section('content')
{{-- Include Student Menu --}}
@include('students.students-menu')
<div class="container-fluid">
    
    <div class="page-wrapper">
    	<div class="row">
    		<div class="col-lg-8 col-md-12 col-lg-offset-2">
    			{{-- Includes errors and session flash message display container --}}
		    	@include('includes.errors')
		    	@include('includes.error')
		    	@include('includes.success')
		    	@include('includes.notice')

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-user fa-lg" aria-hidden="true"></i> Your Basic Details</strong>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li class="profile">LRN: {{ Auth::user()->user_id }}</li>
                            <li class="profile">Name: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</li>
                            <li class="profile">Grade &amp; Section: {{ Auth::user()->student_info->block->name }} - {{ Auth::user()->student_info->grade->title }}</li>
                            <li class="profile">Age: 
                            @if(Auth::user()->birthday == Null)
                            <i>Null</i>
                            @else
                            {{ date('Y') - date('Y', strtotime(Auth::user()->birthday)) }}
                            @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <h4>My Subjects</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>Subject Code</th>
                        <th>Title</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        @foreach($subjects as $s)
                        <td class="text-uppercase">{{ $s->code }}</td>
                        <td class="text-capitalize">{{ $s->title }}</td>
                        <td class="text-capitalize"><i>{{ $s->description }}</i></td>
                        @endforeach
                    </tbody>
                </table>

    		</div>

    	</div>
    	
    </div>

</div>
@endsection