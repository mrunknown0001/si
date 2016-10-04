@extends('layouts.app')

@section('title') Page or Object Not Found! @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Page or Object Not Found!</h1>
            <a href="{{ route('home') }}" class="btn btn-primary btn-xs">Go to Home</a>
        </div>
    </div>
</div>
@endsection
