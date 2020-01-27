@extends('layouts.no_header_layout')

@section('title', 'Register')

@section('content')
<section class="container my-5 login">
    <h1 class="text-center form-title">Register with <span class="text-info">Twitter</span></h1>

    <div class="row justify-content-center mt-5">
        <div class="col-auto mx-auto">
            <a class="btn btn-primary primary-button" href="{{ url('twitter/login') }}"><i class="fab fa-twitter"></i> Sign In</a>
            <a class="btn btn-primary cancel-button" href="{{ route('register') }}">Skip</a>
        </div>
    </div>
</section>
@endsection
