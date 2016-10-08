@extends('layouts.app')

@section('title') Add Subject - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add Subject</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-8 col-md-12">
	        	<div class="panel panel-primary">
	        		<div class="panel-heading">
	        			<strong><i class="fa fa-book fa-lg" aria-hidden="true"></i> Fill in the Details</strong>
	        		</div>
	        		<div class="panel-body">
	        			<form action="#" method="POST">
	        				<div class="form-group">
	        					<input type="text" name="code" class="form-control" placeholder="Subject Code" />
	        				</div>
		        			<div class="form-group">
		        				<input type="text" name="title" class="form-control" placeholder="Subject Title" />
		        			</div>
		        			<div class="form-group">
		        				<textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description of the Subject..."></textarea>
		        			</div>
		        			<div class="form-group">
		        				{{ csrf_field() }}
		        				<button class="btn btn-primary">Add Subject</button>
		        			</div>
		        		</form>
	        		</div>
	        	</div>
        		
        	</div>
        </div>

       
    </div>

</div>
@endsection