@extends('layouts.app')

@section('title') Select Grade Level - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Assign Subject: Select Grade Level</h3>
            </div>
            
        </div>

        <div class="row">
			<div class="col-md-6">
				<ul>
					<li><a href="{{ route('admin_assign_subject', 'grade7') }}"> Grade 7</a>
					</li>
					<li>
					<a href="{{ route('admin_assign_subject', 'grade8') }}"> Grade 8</a>
					</li>
					<li>
					<a href="{{ route('admin_assign_subject', 'grade9') }}"> Grade 9</a>
					</li>
					<li>
					<a href="{{ route('admin_assign_subject', 'grade10') }}"> Grade 10</a>
					</li>
					<li>
					<a href="{{ route('admin_assign_subject', 'grade11') }}"> Grade 11</a>
					</li>
					<li>
					<a href="{{ route('admin_assign_subject', 'grade12') }}"> Grade 12</a>
					</li>
				</ul>
			</div>
        </div>
    </div>

</div>
@endsection