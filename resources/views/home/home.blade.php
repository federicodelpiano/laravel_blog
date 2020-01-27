@extends('layouts.header_image_layout')

@section('title', 'Home')

@section('section-class', 'site-heading--home')
@section('header-title', 'Laravel Blog')
@section('header-subtitle')
<h2 class="site-heading__title-container__subtitle text-center">
    By Federico Del Piano
</h2>
@endsection

@section('content')
<section class="container home-entries">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($entries as $entry)
                @include('entries.components.entry_preview')
                <hr>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-auto">
            {{ $entries->links() }}
        </div>
    </div>
</section>
@endsection