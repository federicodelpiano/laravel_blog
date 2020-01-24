@extends('layouts.app')

@section('title', 'Edit Entry')

@section('content')
<section class="container">
    <h1 class="text-center">Edit Entry</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('entries.edit_form')
        </div>
    </div>
</section>
@endsection