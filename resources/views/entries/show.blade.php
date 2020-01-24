@extends('layouts.app')

@section('title', 'View Entry')

@section('content')
<div class="container">
    <h1>View Entry</h1>

    <hr>

    <div class="container">
        <div class="jumbotron py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <span class="text-center my-2">
                            <img src="{{ asset('storage/user-placeholder.png')}}" class="w-75" alt="...">
                        </span>
                        <div class="card-body">
                            <h5 class="card-title">{{ $entry->user->username }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><i class="fab fa-twitter"></i> {{ __('@') }}{{ $entry->user->twitter_username }}</h6>
                            <a href="{{ url('/users/' . $entry->user_id ) }}" class="btn btn-primary">Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <h2 class="display-4">{{ $entry->title }}</h2>
                    <hr>
                    <p class="lead">{!! nl2br(e($entry->content)) !!}</p>
                </div>
            </div>
        </div>

        @if(Auth::check())
            <a href="/entries/{{ $entry->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">
                <i class="far fa-trash-alt"></i> Delete
            </button>
        @endif

    </div>
</div>
@include('entries.delete_modal')

@endsection