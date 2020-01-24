@extends('layouts.app')

@section('title', 'Laravel Blog')

@section('content')
<div class="container">
    <h1>Welcome</h1>
    
    <hr>

    @foreach($entries as $entry)
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ url('/entries/' . $entry->id) }}">{{ $entry->title }}</a>
            </h5>
            <p class="card-subtitle mb-2 text-muted">
                by <a href="{{ url('/users/' . $entry->user_id) }}">{{ $entry->user->username }}</a>
            </p>
            <p class="card-text">{{ $entry->content }}</p>

            @if(Auth::check())
                <a href="{{ url('/entries/' . $entry->id . '/edit') }}" class="card-link">Editar</a>
            @endif

        </div>
    </div>
    @endforeach

    <div class="row justify-content-center my-3">
        <div class="col-md-auto">
            {{ $entries->links() }}
        </div>
    </div>
</div>
@endsection