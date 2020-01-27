@extends('layouts.header_image_layout')

@section('title', 'View Entry')

@section('section-class', 'site-heading--entry')
@section('header-title', $entry->title)
@section('header-subtitle')
<h2 class="site-heading__title-container__subtitle text-center">
    Posted by <a href="{{ url('/users/' . $entry->user_id) }}">{{ $entry->user->username }}</a> on {{ \Carbon\Carbon::parse($entry->created_at)->format('m-d-Y')}}
</h2>
@endsection

@section('content')
<section class="container entry-body">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="lead entry-body__content">{!! nl2br(e($entry->content)) !!}</p>

            <div class="my-5">
                @if(Auth::check())
                    <a href="/entries/{{ $entry->id }}/edit" class="btn btn-primary primary-button">Edit</a>

                    <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#modal">
                        Delete
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

@if(Auth::check())
    @include('entries.components.delete_modal')
@endif

@endsection