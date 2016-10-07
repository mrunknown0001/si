@extends('layouts.app')

@section('title') Unauthorize Access! @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center">Hey! You're not allowed in here!</h1>
            <div class="text-center">
	            <a href="{{ route('home') }}" class="btn btn-primary btn-xs">Go to Home</a>
	        </div>
        </div>
    </div>
</div>
@endsection
