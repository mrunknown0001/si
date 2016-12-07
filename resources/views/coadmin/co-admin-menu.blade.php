<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('co_admin_home') }}">Adviser Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-message">
                <li><a href="{{ route('co_admin_profile') }}"><i class="fa fa-user fa-fw"></i>  Adviser Profile</a>
                </li>
                <li><a href="{{ route('co_admin_settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li><a href="{{ route('co_admin_log') }}"><i class="fa fa-history fa-fw"></i> Adviser Log</a></li>
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
                <li>
                    <a href="{{ route('co_admin_home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <!-- <li>
                    <a><i class="fa fa-book fa-fw"></i> My Subjects<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('co_admin_my_subjects') }}">View My Subjects</a>
                        </li>
                    </ul>
                    
                </li> -->
                <li>
                    <a><i class="fa fa-list fa-fw"></i> My Grade Blocks<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('co_admin_my_grade_blocks') }}">View My Grade Blocks</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{ route('co_admin_import_grades') }}"><span class="glyphicon glyphicon-import"></span> Import Grades</a>
                </li>
                <li>
                    <a href="{{ route('co_admin_view_export_grade') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Export Grade</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>