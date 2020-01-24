@extends('layouts.app')

@section('title', 'New Entry')

@section('content')
<section class="container">
    <h1 class="text-center">New Entry</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('entries.create_form')
        </div>
    </div>
</section>
@endsection