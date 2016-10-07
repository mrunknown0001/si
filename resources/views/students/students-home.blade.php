@extends('layouts.app')

@section('title') Students Panel - Student Information System @endsection

@section('content')
<div id="wrapper">
    

    {{-- Include Student Menu --}}
    @include('students.students-menu')
    
    <h3>Students Panel</h3>

</div>
@endsection