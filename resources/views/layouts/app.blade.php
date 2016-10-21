<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			@yield('title')
		</title>

		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Web Based Student Information System" />
		<meta name="author" content="Irish, Vanessa" />
		
		{{-- Twitter Bootstrap Framework 3.3.7 --}}
		<!-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"> -->

	    {{-- Twitter Bootstrap Core --}}
	    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		
		{{-- Import Custom CSS --}}
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

	    {{-- MetisMenu CSS --}}
	    <link href="{{ URL::asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

	    {{-- Custom CSS SB Admin2 --}}
	    <link href="{{ URL::asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

	    {{-- Morris Charts CSS --}}
	    <link href="{{ URL::asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

	    {{-- Custom Fonts FontAwesome --}}
	    <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

		<style>
		    @media print
		    {
		    	@page { margin: 0; }
				body { margin: 1.6cm; }
				#printbutton, #headtitle {
					display: none;
				}
				#info {
					display: : inherit;
				}

		    }

		    @media screen {
		    	#info, #footnote {
		    		display: none;
		    	}
		    }
	    </style>

	</head>
	<body>
		@yield('content')

		{{-- jQuery --}}
	    <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>

	    {{-- Bootstrap Core JavaScript --}}
	    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	    {{-- Metis Menu Plugin JavaScript --}}
	    <script src="{{ URL::asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

	    {{-- Morris Charts JavaScript --}}
	    <script src="{{ URL::asset('vendor/raphael/raphael.min.js') }}"></script>
	    <script src="{{ URL::asset('vendor/morrisjs/morris.min.js') }}"></script>

	    {{-- Custom Theme JavaScript --}}
	    <script src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>
		
		@include('includes.logout_timer')
	</body>
</html>