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
            @include('users.components.tweets')
        </aside>
    </section>
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
            e.innerHTML = '<i class="fas fa-eye-slash"></i> Hidden';
            e.disabled = false;
            e.classList.remove("disabled");
            e.classList.remove("btn-primary", "showing-button");
            e.classList.add("btn-secondary", "hidden-button");
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
            e.innerHTML = '<i class="fas fa-eye"></i> Showing';
            e.disabled = false;
            e.classList.remove("disabled");
            e.classList.remove("btn-secondary", "hidden-button");
            e.classList.add("btn-primary", "showing-button");
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