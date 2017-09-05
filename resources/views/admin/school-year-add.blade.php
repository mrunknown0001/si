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
                {{-- Includes errors and session flash message display container --}}
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
        		<div class="panel panel-primary">
        			<div class="panel-heading">
        				<strong>Add School Year</strong>
        			</div>
        			<div class="panel-body">
        				<form action="{{ route('admin_post_add_new_school_year') }}" method="POST" class="form-inline">
        					<div class="form-group">
								
								<select name="from_year" id="from_year" class="form-control">
									<option value="">Select Year</option>
									<option value="{{ date('Y') }}">{{ date('Y') }} - {{ date('Y')+1 }}</option>
                                    <!-- <option value="{{ date('Y')+1 }}">{{ date('Y')+1 }} - {{ date('Y')+2 }}</option>
                                    <option value="{{ date('Y')+2 }}">{{ date('Y')+2 }} - {{ date('Y')+3 }}</option> -->
								</select>
								
        					</div>
        					<!-- <div class="form-group">
        						<strong>to</strong>
        					</div>
        					<div class="form-group">
        						
        						<select name="to_year" id="to_year" class="form-control">
        							<option value="">Select Year</option>
        							<option value="{{ date('Y') + 1 }}">{{ date('Y') + 1}}</option>
        						</select>

        					</div> -->
        					<div class="form-group pull-right">
        						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
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