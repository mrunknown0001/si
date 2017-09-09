<?php
    /*
     * Check if School Year and Quarter is Added and Selected
     */
    $year = App\SchoolYear::where('status', 1)->first();
    $quarter = App\QuarterSelect::where('status', 1)->first();
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
        <a class="navbar-brand" href="{{ route('admin_home') }}">Logo</a>
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
                <li><a href="{{ route('admin_settings') }}"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
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
                @if(!empty($year) && !empty($quarter))
                <li>
                    <a><i class="fa fa-users fa-fw"></i> Teachers<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('co_admin_add') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Teacher</a>
                        </li>
                        <li>
                            <a href="{{ route('co_admin_view') }}"><i class="fa fa-eye" aria-hidden="true"></i> View All Teachers</a>
                        </li>
                       <!--  <li>
                            <a href="{{ route('admin_co_admin_assign_block') }}">Assign Block/Section</a>
                        </li>
                        <li>
                            <a href="{{ route('admin_view_block_assignment') }}">View Block Assignment</a>
                        </li> -->
                        <li>
                            <!-- <a href="{{ route('admin_assign_subject') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Assign Subject Load</a> -->
                            <a><i class="fa fa-book"></i> Assign Subject<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade7') }}"> Grade 7</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade8') }}"> Grade 8</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade9') }}"> Grade 9</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade10') }}"> Grade 10</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade11') }}"> Grade 11</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin_assign_subject', 'grade12') }}"> Grade 12</a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="{{ route('admin_get_subject_assignments') }}"><i class="fa fa-eye" aria-hidden="true"></i> View Subject Assignment</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-graduation-cap fa-fw"></i> Students<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('students_import') }}"><i class="fa fa-clone" aria-hidden="true"></i> Batch Import Students</a>
                        </li>
                        <li>
                            <a href="{{ route('add_student') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Student</a>
                        </li>
                        <li>
                            <!-- <a href="{{ route('students_filter') }}">Students Filter</a> -->
                        </li>
                        <li>
                            <a href="{{ route('students_view') }}"><i class="fa fa-eye" aria-hidden="true"></i> View All Students</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
                    <a href="{{ route('admin_export_grade') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i> Export Grade</a>
                </li> -->
                <li>
                    <a><i class="fa fa-book fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('subjects_add') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Subject</a>
                        </li>
                        <li>
                            <a href="{{ route('subjects_view') }}"><i class="fa fa-eye" aria-hidden="true"></i> View All Subjects</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-list fa-fw"></i> Grade Block<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('grade_blocks_add') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Grade Block</a>
                        </li>
                        <li>
                            <a href="{{ route('grade_blocks_view') }}"><i class="fa fa-eye" aria-hidden="true"></i> View All Grade Blocks</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!-- <li>
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
                <!-- </li> --> 
                
                @else
                <li>
                    <a style="color: grey;"><i class="fa fa-users fa-fw"></i> Teachers<span class="fa arrow"></span></a>
                </li>
                <li>
                    <a style="color: grey;"><i class="fa fa-graduation-cap fa-fw"></i> Students<span class="fa arrow"></span></a>
                </li>
                <!-- <li>
                    <a style="color: grey;"><i class="fa fa-bar-chart" aria-hidden="true"></i> Export Grade</a>
                </li> -->
                <li>
                    <a style="color: grey;"><i class="fa fa-book fa-fw"></i> Subjects<span class="fa arrow"></span></a>
                </li>
                <!-- <li>
                    <a style="color: grey;"><i class="fa fa-list-alt fa-fw"></i> Grade Levels<span class="fa arrow"></span></a>
                </li> -->
                <li>
                    <a style="color: grey;"><i class="fa fa-list fa-fw"></i> Grade Block<span class="fa arrow"></span></a>
                </li>
                @endif
                <li>
                    <a><i class="fa fa-calendar fa-fw"></i> School Year<span class="fa arrow"></span></a>
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
                <li><a href="{{ route('admin_activity_log') }}"><i class="fa fa-history fa-fw"></i> Activity Log</a></li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

