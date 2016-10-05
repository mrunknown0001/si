@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Import Students</h3>
            </div>
            
        </div>

        <div class="row">
        	<div class="col-lg-6 col-md-8">
        		<div class="panel panel-primary">
        			<div class="panel-heading">
        				<strong>Import Students List</strong>
        			</div>
        			<div class="panel-body">
        				<form action="#" method="POST" enctype="multipart/form-data" class="form-inline">
        					<div class="form-group">

								<input type="file" name="students" id="students" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" title="Select Excel Files Only" data-toggle="tooltip" data-placement="bottom" />

        					</div>
        					<div class="form-group pull-right">
        						{{ csrf_field() }}
        						<button class="btn btn-primary">Import Students</button>
        					</div>
        				</form>
        			</div>
        		</div>
        	</div>
        </div>

       
    </div>

</div>
@endsection