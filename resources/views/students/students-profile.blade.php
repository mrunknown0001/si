@extends('layouts.app')

@section('title') My Profile - Student - Student Information System @endsection

@section('content')
{{-- Includes Student's Menu --}}
@include('students.students-menu')
<div class="container-fluid">

    <div class="row">
    	<div class="col-lg-6 col-md-12 col-lg-offset-2">
            <h3>My Profile <a href="{{ route('students_profile_update') }}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></h3>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong><i class="fa fa-user fa-lg" aria-hidden="true"></i> Student's Details</strong>
                </div>
                <div class="panel-body">
                    <ul>
                        <li class="profile">ID: {{ $s->user_id }}</li>
                        <li class="profile">Name: {{ $s->firstname }} {{ $s->lastname }}</li>
                        <li class="profile">Email: {{ $s->email }}</li>
                        <li class="profile">Mobile Number: {{ $s->mobile }}</li>
                        <li class="profile">Birthday: {{ $s->birthday }}</li>
                    </ul>
                </div>
            </div>
    	</div>
    </div>

</div>
@endsection