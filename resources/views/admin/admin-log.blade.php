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
                            <th>Username/ID Number</th>
                            <th>Date &amp; Time</th>
                            <th>Action Made</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->user->user_id }}</td>
                            <td>{{ date('F j, Y - g:i:s A l', strtotime($log->created_at) + 28800) }}</td>
                            <td>{{ $log->action }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Count and Total count() of total() -->
                <p class="text-center"><strong>{{ $logs->count() + $logs->perPage() * ($logs->currentPage() - 1) }} of {{ $logs->total() }}</strong></p>

                <!-- Page Number render() -->
                <div class="text-center"> {{ $logs->links() }}</div>
        	</div>
        </div>

       
    </div>

</div>
@endsection