@extends('layouts.app')

@section('title', 'Laravel Blog')

@section('content')
<div class="container">
    <h1>{{ $user->username }}</h1>

    <hr>

    <section class="row">
        <section class="col-md-9">
            <h2>Entries</h2>
            @foreach($user->entries as $entry)
                <article class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('/entries/' . $entry->id) }}">{{ $entry->title }}</a>
                        </h5>
                        <p class="card-text">{{ $entry->content }}</p>

                        @if(Auth::check())
                            <a href="{{ url('/entries/' . $entry->id . '/edit') }}" class="card-link">Editar</a>
                        @endif

                    </div>
                </article>
            @endforeach
        </section>
        <aside class="col-md-3">
            <h2><i class="fab fa-twitter"></i> Tweets</h2>
            {{--<a class="twitter-timeline" href="https://twitter.com/{{ $user->twitter_username }}?ref_src=twsrc%5Etfw">Tweets by {{ $user->twitter_username }}</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}

            <article class="card my-3 bg-info">
                <div class="card-body">
                    <p class="card-text">Contenido tweet</p>

                    @if(Auth::check())
                        <button class="btn btn-primary"><i class="fas fa-eye-slash"></i> / <i class="fas fa-eye"></i></button>
                    @endif

                </div>
            </article>
        </aside>
    </section>

    

</div>
@endsection