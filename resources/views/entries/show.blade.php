@extends('layouts.app')

@section('title', 'View Entry')

@section('content')
<section class="container">
    <section>
        <h1 class="display-4">{{ $entry->title }}</h1>
        <h2 class="card-subtitle mb-2 text-muted">
            Posted by <a href="{{ url('/users/' . $entry->user_id) }}">{{ $entry->user->username }}</a> on {{ \Carbon\Carbon::parse($entry->created_at)->format('m-d-Y')}}
        </h2>
    </section>

    <section>
        <p class="lead">{!! nl2br(e($entry->content)) !!}</p>

        <div>
            @if(Auth::check())
                <a href="/entries/{{ $entry->id }}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal">
                    <i class="far fa-trash-alt"></i> Delete
                </button>
            @endif
        </div>
    </section>
</section>
@include('entries.delete_modal')

@endsection