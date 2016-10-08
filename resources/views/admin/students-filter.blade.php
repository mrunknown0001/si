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
            <div class="col-lg-3 col-md-6">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
	                    <button class="btn btn-default" type="button">
	                        <i class="fa fa-search"></i>
	                    </button>
                	</span>
                </div>
                <!-- /input-group -->
            </div>  
            
        </div>
       
    </div>

</div>
@endsection