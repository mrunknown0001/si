@extends('layouts.app')

@section('title') Activity Log - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Admin Activity Log</h3>
            </div>
            
        </div>
        <div class="row">
        	<div class="col-lg-12 col-md-12">
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th>Date &amp; Time</th>
        					<th>Action Made</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td>1-23-16 1:23:45</td>
        					<td>Import Students</td>
        				</tr>
        				<tr>
        					<td>1-23-16 1:23:45</td>
        					<td>Import Students</td>
        				</tr>
        				<tr>
        					<td>1-23-16 1:23:45</td>
        					<td>Import Students</td>
        				</tr>
        				<tr>
        					<td>1-23-16 1:23:45</td>
        					<td>Import Students</td>
        				</tr>
        			</tbody>
        		</table>
        		<!-- Count and Total count() of total() -->
        		<!-- Page Number render() -->
        	</div>
        </div>

       
    </div>

</div>
@endsection