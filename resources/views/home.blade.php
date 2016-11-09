<!DOCTYPE html>
<html class="full" lang="en">
    <head>
        <title>
            Login - Student Information System
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
            <h2 id="welcome" class="text-center">Welcome to Bamban National High School Student Information System</h2>
            <br/><br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    {{-- Includes Errors and Success Message templates --}}
                    @include('includes.errors')
                    @include('includes.error')
                    @include('includes.notice')
                    @include('includes.success')
                    <div class="login-panel panel panel-primary welcome">
                        <div class="panel-heading">
                            <strong><i class="fa fa-user fa-lg"></i> Student Login</strong>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{ route('student_post_login') }}" method="POST" autocomplete="off">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Learner Reference Number" name="id" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button type="submit" class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                                        
                                    </div>
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <p class="text-center"><a href="{{ route('login') }}" class="welcome btn btn-primary btn-xs">Admin &amp; Co-Admin Login</a></p>
                </div>
            </div>
        </div>
        {{-- jQuery --}}
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>

        {{-- Bootstrap Core JavaScript --}}
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>