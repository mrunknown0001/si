@extends('layouts.app')

@section('title') View All Students - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">View All Students</h3>
            </div>          
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>LRN (Learner Reference Number)</th>
                            <th>Full Name</th>
                            <th>Grade Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
                <!-- Count and Total count() of total() -->
                <!-- Page Number render() -->
            </div>
        </div>
    </div>
</div>
@endsection