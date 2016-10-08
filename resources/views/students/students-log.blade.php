@extends('layouts.app')

@section('title') My Activity Log - Student - Student Information System @endsection

@section('content')
{{-- Includes Student's Menu --}}
@include('students.students-menu')
<div class="container-fluid">

    <div class="row">
    	<div class="col-lg-8 col-md-12 col-lg-offset-2">
            <h3>My Activity Log</h3>
    		<table class="table table-hover">
    			<thead>
    				<tr>
    					<th>Date &amp; Time</th>
    					<th>Action Made</th>
    				</tr>
    			</thead>
    			<tbody>
                    @foreach($logs as $log)
    				<tr>
    					<td>{{ $log->created_at }}</td>
    					<td>{{ $log->action }}</td>
    				</tr>
                    @endforeach
    			</tbody>
    		</table>
    		<!-- Count and Total count() of total() -->
            <p class="text-center"><strong>{{ $logs->count() + $logs->perPage() * ($logs->currentPage() - 1) }} of {{ $logs->total() }}</strong></p>

    		<!-- Page Number render() -->
            <div class="text-center"> {{ $logs->render() }}</div>
    	</div>
    </div>

</div>
@endsection