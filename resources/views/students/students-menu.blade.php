<nav class="navbar navbar-default">
	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ route('students_home') }}" class="navbar-brand">Student's Panel</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{ route('students_view_my_grades') }}">View My Grades</a></li>

				<!-- <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Student Options <span class="caret"></span></a>
		        	<ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
		        	</ul>
		        </li> -->
			
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<span class="caret"></span></a>
		        	<ul class="dropdown-menu">
		        		<li><a href="{{ route('students_profile') }}"><i class="fa fa-user fa-fw"></i> My Profile</a>
		        		<li><a href="{{ route('students_settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
			            <li><a href="{{ route('students_log') }}"><i class="fa fa-history fa-fw"></i> My Activity Log</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i></span> Logout</a></li>
		        	</ul>
			    </li>
		    </ul>

	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>