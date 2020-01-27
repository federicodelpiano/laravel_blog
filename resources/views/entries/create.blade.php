@extends('layouts.no_header_layout')

@section('title', 'New Entry')

@section('content')
<section class="container mt-4">
    <h1 class="text-center form-title">New Entry</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('entries.components.create_form')
        </div>
    </div>
</section>
@endsection