@extends('layouts.app')

@section('title') Acivity Log - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Co-Admin Menu --}}
    @include('coadmin.co-admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Adviser Activity Log</h3>
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
                        @foreach($logs as $log)
                        <tr>
                            <td>{{ date('F d, Y - g:i A l', strtotime($log->created_at) + 28800) }}</td>
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

</div>
@endsection