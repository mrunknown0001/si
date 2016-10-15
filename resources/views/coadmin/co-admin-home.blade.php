@extends('layouts.app')

@section('title') Co-Admin Dashboard - Student Information System @endsection

@section('content')
<div id="wrapper">
    
    {{-- Include co-admin-menu --}}
    @include('coadmin.co-admin-menu')

    <div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h3 class="page-header">Dashboard</h3>
	        </div>

		</div>
		<div class="row">
			<div class="col-lg-12">
                @if(!empty($school_year))
                <strong>School Year: {{ $school_year->from }} - {{ $school_year->to }} - </strong>
                    @if(!empty($quarter))
                        @if($quarter->code == 'first')
                            <strong>First Quarter</strong>
                        @elseif($quarter->code == 'second')
                            <strong>Second Quarter</strong>
                        @elseif($quarter->code == 'third')
                            <strong>Third Quarter</strong>
                        @elseif($quarter->code == 'forth')
                            <strong>Forth Quarter</strong>
                        @endif
                    @else
                        <strong>No Quarter Selected</strong>
                    @endif
                @else
                <strong>No Active School Year. Please Add One.</strong>
                @endif
                <hr/>
            </div>
			<div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Grade Block</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('co_admin_my_grade_blocks') }}">
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
                                <span class="glyphicon glyphicon-import" id="dashboard-icon"></span>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Import Grades</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('co_admin_import_grades') }}">
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
@endsection