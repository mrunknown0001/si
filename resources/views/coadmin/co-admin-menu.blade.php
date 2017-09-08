<?php
    $ba = App\SubjectAssign::where('user_id', Auth::user()->id)->get();
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('co_admin_home') }}">{{ !empty($ba)? 'Adviser' : 'Teacher' }} Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-message">
                <li><a href="{{ route('co_admin_profile') }}"><i class="fa fa-user fa-fw"></i>  {{ !empty($ba)? 'Adviser' : 'Teacher' }} Profile</a>
                </li>
                <li><a href="{{ route('co_admin_settings') }}"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
                <!-- <li><a href="{{ route('co_admin_log') }}"><i class="fa fa-history fa-fw"></i> {{ !empty($ba)? 'Adviser' : 'Teacher' }} Log</a></li> -->
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="text-center">
                    <a href="{{ route('co_admin_home') }}"><img src="{{ URL::asset('uploads/profile/default.jpg') }}" alt="" class="img-thumbnail" id="profile-picture"></a>
                </li><!-- 
                <li>
                    <a href="#"><i class="fa fa-book"></i> My Subject Loads</a>
                </li> -->
                <li>
                    <a><i class="fa fa-book fa-fw"></i> My Subject Loads<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @foreach($ba as $s)
                        <li>
                            <a href="#">{{ ucwords($s->subject->title) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-graduation-cap fa-fw"></i> My Students<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#">Grade/Section 1</a></li>
                        <li><a href="#">Grade/Section 2</a></li>
                        <li><a href="#">Grade/Section 3</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>