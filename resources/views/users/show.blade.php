@extends('layouts.no_header_layout')

@section('title', $user->username)

@section('content')
<section class="container my-4">
    <section class="row">
        <section class="col-md-8">
            @include('users.components.profile_card')

            <section class="mt-5">
                @foreach($user->entries as $entry)
                    @include('entries.components.entry_preview')
                    <hr>
                @endforeach
            </section>
        </section>

        <aside class="col-md-4">
            @include('users.components.user_tweets')
        </aside>
    </section>
</section>
@endsection

@section('scripts')
@if(Auth::check())
<script src="{{ asset('js/tweets.js') }}"></script>
@endif
@endsection