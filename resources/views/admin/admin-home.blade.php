@extends('layouts.app')

@section('title') Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Dashboard</h3>
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">10</div>
                                <div>Co-Admins</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('co_admin_view') }}">
                        <div class="panel-footer">
                            <span class="pull-left"><i class="fa fa-eye" aria-hidden="true"></i> View</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

	         <div class="col-lg-3 col-md-6">
	            <div class="panel panel-green">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-graduation-cap fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">100</div>
	                            <div>Students</div>
	                        </div>
	                    </div>
	                </div>
	                <a href="{{ route('students_view') }}">
	                    <div class="panel-footer">
	                        <span class="pull-left"><i class="fa fa-eye" aria-hidden="true"></i> View</span>
	                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                        <div class="clearfix"></div>
	                    </div>
	                </a>
	            </div>
	        </div>

	        <div class="col-lg-3 col-md-6">
	            <div class="panel panel-yellow">
	                <div class="panel-heading">
	                    <div class="row">
	                        <div class="col-xs-3">
	                            <i class="fa fa-book fa-5x"></i>
	                        </div>
	                        <div class="col-xs-9 text-right">
	                            <div class="huge">25</div>
	                            <div>Subjects</div>
	                        </div>
	                    </div>
	                </div>
	                <a href="{{ route('subjects_view') }}">
	                    <div class="panel-footer">
	                        <span class="pull-left"><i class="fa fa-eye" aria-hidden="true"></i> View</span>
	                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                        <div class="clearfix"></div>
	                    </div>
	                </a>
	            </div>
	        </div>

	        <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Grade Block</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('grade_blocks_view') }}">
                        <div class="panel-footer">
                            <span class="pull-left"><i class="fa fa-eye" aria-hidden="true"></i> View</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">6</div>
                                <div>Grade Level</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('grade_levels_view') }}">
                        <div class="panel-footer">
                            <span class="pull-left"><i class="fa fa-eye" aria-hidden="true"></i> View</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>            
	    </div>
    </div>

</div>
@endsection