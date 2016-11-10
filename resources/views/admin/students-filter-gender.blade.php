@extends('layouts.app')

@section('title') Students Filter - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Students Filter</h3>
            </div>
            <div class="col-lg-12">
                @include('includes.errors')
                @include('includes.error')
                @include('includes.success')
                @include('includes.notice')
            </div>
            <div class="col-lg-3 col-md-6">
                <form action="{{ route('admin_students_filter') }}" method="POST" autocomplete="off">
                    <div class="form-group">
                        <select name="filter_by" id="filter" class="form-control">
                            <option value="">Select Filter</option>
                            <option value="age">Age</option>
                            <option value="gender">Gender</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="age_value" id="age_value" value="" class="form-control" placeholder="Enter Age" style="display: none;" />

                        <select name="gender_value" id="gender_value" class="form-control" style="display: none;">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>


                    </div>
                    <div class="form-group">
                        {{ csrf_field() }}
                        <button class="btn btn-primary">Search Filter</button>
                    </div>
                </form>
                
            </div>  
            
        </div>
       
        <hr />
        <h4>Gender Filter: <small>All {{ $gender }} students</small></h4>
        <h4>Total: {{ $students->count() }}</h4>
        <hr />
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>LRN</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                <tr>
                    <td>{{ $s->user_id }}</td>
                    <td>{{ $s->lastname }}</td>
                    <td>{{ $s->firstname }}</td>
                    <td>View</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Count and Total count() of total() -->
        <p class="text-center"><strong>{{ $students->count() + $students->perPage() * ($students->currentPage() - 1) }} of {{ $students->total() }}</strong></p>

        <!-- Page Number render() -->
        <div class="text-center"> {{ $students->links() }}</div>

    </div>

</div>
@endsection