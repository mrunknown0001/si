@extends('layouts.app')

@section('title') School Year Select Quarter - Admin - Student Information System @endsection

@section('content')
<div id="wrapper">

    {{-- Includes Admin Menu --}}
    @include('admin.admin-menu')

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">School Year Select Quarter</h3>
            </div>
            
        </div>
        
        {{-- Includes errors and session flash message display container --}}
        @include('includes.errors')
        @include('includes.error')
        @include('includes.success')
        @include('includes.notice')
		<div class="row">
            @foreach($quarter as $q)
            <div class="col-lg-3 col-md-6">
                @if($q->finish == 1)
                <div class="panel panel-green">
                @else
                    @if($q->status == 1)
                        <div class="panel panel-primary">
                    @else
                        <div class="panel panel-yellow">
                    @endif
                @endif
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="huge">
                                    @if($q->code == 'first')
                                        1st
                                    @elseif($q->code == 'second')
                                        2nd
                                    @elseif($q->code == 'third')
                                        3rd
                                    @elseif($q->code == 'forth')
                                        4th
                                    @endif
                                </div>
                                <div>
                                    @if($q->code == 'first')
                                        First Quarter
                                    @elseif($q->code == 'second')
                                        Second Quarter
                                    @elseif($q->code == 'third')
                                        Third Quarter
                                    @elseif($q->code == 'forth')
                                        Forth Quarter
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">
                                @if($q->finish == 1)
                                    Finished
                                @else
                                    @if($q->status == 1)
                                        Selected
                                    @else
                                        Unselected
                                    @endif
                                @endif
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
                
            </div>
            
            @endforeach
            @foreach($quarter as $q)
            <div class="col-lg-3 col-md-6">
                <p class="text-center">
                    @if($q->finish == 1)
                        <!-- <button class="btn btn-primary btn-xs disabled">Select</button> | 
                        <button class="btn btn-success btn-xs disabled">Finish</button> -->
                    @else
                        @if($q->id == 1 && $q->finish == 0)
                            @if($q->status == 0)
                                <a href="{{ route('admin_select_active_quarter', $q->id) }}" class="btn btn-primary btn-xs">Select</a>
                                @break
                            @elseif($q->status == 1)
                                <a href="{{ route('admin_finish_selected_quarter', $q->id) }}" class="btn btn-success btn-xs">Finish</a>
                                @break
                            @endif

                        @elseif($q->id == 2 && $q->finish == 0)
                            @if($q->status == 0)
                                <a href="{{ route('admin_select_active_quarter', $q->id) }}" class="btn btn-primary btn-xs">Select</a>
                                @break
                            @elseif($q->status == 1)
                                <a href="{{ route('admin_finish_selected_quarter', $q->id) }}" class="btn btn-success btn-xs">Finish</a>
                                @break
                            @endif

                        @elseif($q->id == 3 && $q->finish == 0)
                            @if($q->status == 0)
                                <a href="{{ route('admin_select_active_quarter', $q->id) }}" class="btn btn-primary btn-xs">Select</a>
                                @break
                            @elseif($q->status == 1)
                                <a href="{{ route('admin_finish_selected_quarter', $q->id) }}" class="btn btn-success btn-xs">Finish</a>
                                @break
                            @endif

                        @elseif($q->id == 4 && $q->finish == 0)
                            @if($q->status == 0)
                                <a href="{{ route('admin_select_active_quarter', $q->id) }}" class="btn btn-primary btn-xs">Select</a>
                                @break
                            @elseif($q->status == 1)
                                <a href="{{ route('admin_finish_selected_quarter', $q->id) }}" class="btn btn-success btn-xs">Finish</a>
                                @break
                            @endif

                        @endif
                    @endif
                </p>
            </div>
            @endforeach
        </div>
       
    </div>

</div>
@endsection