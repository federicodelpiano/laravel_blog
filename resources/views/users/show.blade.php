@extends('layouts.app')

@section('title', 'Laravel Blog')

@section('content')

<section class="container my-4">

    <section class="row">
        <section class="col-md-8">
            <section>
                @include('users.profile_card')
            </section>

            <section class="mt-5">
                <h2>User Entries</h2>
                @foreach($user->entries as $entry)
                    @include('entries.entry_preview')
                    <hr>
                @endforeach
            </section>
        </section>

        <aside class="col-md-4">
            @include('users.tweets')
        </aside>
    </section>

    {{--
    
    <h1>{{ $user->username }}</h1>

    <hr>

    <section class="row">
        <section class="col-md-8">
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
        <aside class="col-md-4">
            <h2 class="text-info"><i class="fab fa-twitter"></i> Tweets</h2>
            <article class="card my-3">
                <div class="card-body">
                    
                    @if($user->twitter_username)
                        @php
                            $thisUser = (Auth::check() && Auth::user()->id == $user->id) ? true : false;
                        @endphp

                        @foreach($tweets as $tweet)
                            @if(in_array($tweet->id, array_column($hiddenTweets, 'tweet_id')))
                                @if($thisUser)
                                    <h6>
                                        <span class="font-weight-bold">{{ $tweet->user->name }}</span>
                                        <span class="text-muted">{{ __('@') }}{{ $tweet->user->screen_name }}</span>
                                        {{$tweet->id}}
                                    </h6>
                                    <p>{{ $tweet->text }}</p>

                                    <button class="btn btn-primary btn-block btn-sm" data-toggle="tooltip" data-placement="bottom" title="Show Tweet" onclick="showTweet(this, '{{ $tweet->id }}')">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <hr>
                                @endif
                            @else
                                <h6>
                                    <span class="font-weight-bold">{{ $tweet->user->name }}</span>
                                    <span class="text-muted">{{ __('@') }}{{ $tweet->user->screen_name }}</span>
                                    {{$tweet->id}}
                                </h6>
                                <p>{{ $tweet->text }}</p>
                                
                                @if($thisUser)
                                    <button class="btn btn-primary btn-block btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hide Tweet" onclick="hideTweet(this, '{{ $tweet->id }}')">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                @endif

                                <hr>
                            @endif
                        @endforeach
                    @else 
                        <h6>This user has not set up a twitter account yet.</h6>
                    @endif
                </div>
            </article>
        </aside>
    </section>
    --}}
</section>
@endsection

@section('scripts')

@if(Auth::check())
<script>
    hideTweet = async (e, tweetId) => {  
        e.onclick = null;
		e.disabled = true;
        e.classList.add("disabled");
		
		await axios.post("{{ url('/hidden_tweets') }}", { tweet_id: tweetId })
		.then(response => {
			console.log(response);
            e.innerHTML = '<i class="fas fa-eye"></i>';
            e.disabled = false;
            e.classList.remove("disabled");
            e.onclick = function(){
                showTweet(e, tweetId);
            }       
		})
		.catch(e => {
			console.error(e);
			e.disabled = false;
		});
	}

    showTweet = async (e, tweetId) => {
        e.onclick = null;
		e.disabled = true;
        e.classList.add("disabled");
		
		await axios.delete("{{ url('/hidden_tweets') }}/" + tweetId)
		.then(response => {
			console.log(response);
            e.innerHTML = '<i class="fas fa-eye-slash"></i>';
            e.disabled = false;
            e.classList.remove("disabled");
            e.onclick = function() {
                hideTweet(e, tweetId);
            }
		})
		.catch(e => {
			console.error(e);
			e.disabled = false;
		});
	}
</script>
@endif

@endsection