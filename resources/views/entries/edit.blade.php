@extends('layouts.no_header_layout')

@section('title', 'Edit Entry')

@section('content')
<section class="container edit-entry mt-4">
    <h1 class="text-center edit-entry__title">Edit Entry</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('entries.edit_form')
        </div>
    </div>
</section>
@endsection