@extends('layouts.app')

@section('title') View All Grade Levels - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Grade Levels</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-12 col-md-12">
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th>Grade Level Code</th>
        					<th>Grade Level Title</th>
        					<th>Description</th>
        					<th>Actions</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td>7</td>
        					<td>Grade 7</td>
        					<td>Description</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
        				<tr>
        					<td>8</td>
        					<td>Grade 8</td>
        					<td>Description</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
        				<tr>
        					<td>9</td>
        					<td>Grade 9</td>
        					<td>Description</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
        				<tr>
        					<td>10</td>
        					<td>Grade 10</td>
        					<td>Description</td>
        					<td>
								<div class="btn-group btn-group-xs">
									<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
									<button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
        					</td>
        				</tr>
        			</tbody>
        		</table>
        		<!-- Count and Total -->
        		<!-- Page Number -->
        	</div>
        </div>
    </div>
</div>
@endsection