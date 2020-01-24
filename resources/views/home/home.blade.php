@extends('layouts.home_layout')

@section('title', 'Laravel Blog')

@section('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="container home-entries">

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($entries as $entry)
                @include('entries.entry_preview')
                <hr>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-md-auto">
            {{ $entries->links() }}
        </div>
    </div>
</section>
@endsection