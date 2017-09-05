<!DOCTYPE html>
<html class="full" lang="en">
    <head>
        <title>
            Welcome to Student Information System
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

        {{-- Custom Fonts FontAwesome --}}
        <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



    </head>
    <body>
        <div class="container">
            <h2 id="welcome" class="text-center"> Student Information System</h2>
            <br/><br/>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="text-center">History</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-4">
                    <br>
                    <p class="text-center">
                        <a href="{{ route('admin_login') }}" class="btn btn-primary btn-lg">ADMIN</a>
                    </p>
                    <p class="text-center">
                        <a href="{{ route('teachers_login') }}" class="btn btn-primary btn-lg">TEACHER</a>
                    </p>
                    <p class="text-center">
                        <a href="{{ route('student_login') }}" class="btn btn-primary btn-lg">STUDENT</a>
                    </p>
                
                </div>
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                
                </div>
            </div>
        </div>
        {{-- jQuery --}}
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>

        {{-- Bootstrap Core JavaScript --}}
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>