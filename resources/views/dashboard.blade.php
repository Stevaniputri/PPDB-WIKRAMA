@extends('layout')
@section('content')
<center>
    <div class="welcome" data-aos="fade-top" data-aos-delay="900">
        <h2>Hi, {{Auth::user()->name}}!</h2>
        <h4>Student</h4>
    </div>
    <br>
</center>
@endsection
