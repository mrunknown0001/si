@extends('layouts.app')

@section('title') Admin Login - Student Informatin System @endsection

@section('content')
<div class="container">
    <h3 class="text-center">Bamban National High School Student Information System</h3>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{-- Includes Errors and Success Message templates --}}
            @include('includes.errors')
            @include('includes.error')
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <strong><i class="fa fa-user fa-lg"></i> Admin &amp; Co-Admin Login</strong>
                
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin_post_login') }}" method="POST" autocomplete="off">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter TIN" name="id" type="text" autofocus>
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

            <p class="text-center"><a href="{{ route('home') }}"> Back to Home Page</a></p>
        </div>
    </div>
</div>
@endsection