<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin_home') }}">Admin Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-message">
                <li><a href="{{ route('admin_profile') }}"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                </li>
                <li><a href="{{ route('admin_settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li><a href="{{ route('admin_activity_log') }}"><i class="fa fa-history fa-fw"></i> Admin Log</a></li>
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
                    <a href="{{ route('admin_home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a><i class="fa fa-users fa-fw"></i> Co-Admins<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('co_admin_add') }}">Add New Co-Admin</a>
                        </li>
                        <li>
                            <a href="{{ route('co_admin_view') }}">View All Co-Admin</a>
                        </li>
                        <li>
                            <a>Assign Block/Section</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-graduation-cap fa-fw"></i> Students<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('students_import') }}">Import Students</a>
                        </li>
                        <li>
                            <a href="{{ route('students_filter') }}">Students Filter</a>
                        </li>
                        <li>
                            <a href="{{ route('students_view') }}">View All Students</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-book fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('subjects_add') }}">Add New Subject</a>
                        </li>
                        <li>
                            <a href="{{ route('subjects_view') }}">View All Subjects</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-list-alt fa-fw"></i> Grade Levels<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('grade_levels_add') }}">Add New Grade Level</a>
                        </li>
                        <li>
                            <a href="{{ route('grade_levels_view') }}">View All Grade Levels</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-list fa-fw"></i> Grade Block<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('grade_blocks_add') }}">Add New Grade Block</a>
                        </li>
                        <li>
                            <a href="{{ route('grade_blocks_view') }}">View All Grade Blocks</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-university fa-fw"></i> School Year<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                        	<a href="{{ route('school_year_add') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add School Year</a>
                        </li>
                        <li>
                            <a href="{{ route('school_year_select_quarter') }}"><i class="fa fa-clock-o fa-fw"></i> Select Quarter</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->

                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>