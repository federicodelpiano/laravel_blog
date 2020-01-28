<section class="card my-3 rounded-0">
    <div class="card-body">
        <h2 class="text-info mb-3"><i class="fab fa-twitter"></i> Latest Tweets</h2>
        
        <input type="hidden" value="{{ url('/hidden_tweets') }}" id="url" name="url">
        
        @if($user->twitter_username)
            @php
                $thisUser = (Auth::check() && Auth::user()->id == $user->id) ? true : false;
            @endphp

            @if(count($tweets) > 0)
                @foreach($tweets as $tweet)
                    @include('users.components.tweet')
                @endforeach
            @else 
                <h6>No tweets found.</h6>
            @endif
        @else 
            <h6>This user has not set up a twitter account yet.</h6>
        @endif
    </div>
</section>