@extends('layouts.app')

@section('title') Add New School Year - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Add New School Year</h3>
            </div>
            
        </div>

		<div class="row">
        	<div class="col-lg-6 col-md-8">
        		<div class="panel panel-primary">
        			<div class="panel-heading">
        				<strong>Add School Year</strong>
        			</div>
        			<div class="panel-body">
        				<form action="#" method="POST" class="form-inline">
        					<div class="form-group">
								
								<select name="start_year" id="start_year" class="form-control">
									<option value="">Select Year</option>
									<option value="{{ date('Y') }}">{{ date('Y') }}</option>
								</select>
								
        					</div>
        					<div class="form-group">
        						<strong>to</strong>
        					</div>
        					<div class="form-group">
        						
        						<select name="end_year" id="end_year" class="form-control">
        							<option value="">Select Year</option>
        							<option value="{{ date('Y') + 1 }}">{{ date('Y') + 1}}</option>
        						</select>

        					</div>
        					<div class="form-group pull-right">
        						{{ csrf_field() }}
        						<button class="btn btn-primary">Add School Year</button>
        					</div>
        				</form>
        			</div>
        		</div>
        		<p><i>Note: You can't Add a new School Year if there is an Active School Year.</i></p>
        	</div>
        </div>
       
    </div>

</div>
@endsection