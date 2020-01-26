<section class="card my-3 rounded-0">
    <div class="card-body">
        <h2 class="text-info mb-3"><i class="fab fa-twitter"></i> Latest Tweets</h2>
        
        @if($user->twitter_username)
            @php
                $thisUser = (Auth::check() && Auth::user()->id == $user->id) ? true : false;
            @endphp

            @foreach($tweets as $tweet)
                @if(in_array($tweet->id, array_column($hiddenTweets, 'tweet_id')))
                    @if($thisUser)
                        <article>
                            <h6>
                                <span class="font-weight-bold">{{ $tweet->user->name }}</span>
                                <span class="text-muted">{{ __('@') }}{{ $tweet->user->screen_name }}</span>
                            </h6>
                            <p>{{ $tweet->text }}</p>

                            <button class="btn btn-secondary hidden-button" onclick="showTweet(this, '{{ $tweet->id }}')" data-toggle="tooltip" data-placement="bottom" title="Toggle visibility">
                                <i class="fas fa-eye-slash"></i> Hidden
                            </button>

                            <hr>
                        </article>
                    @endif
                @else
                    <article>
                        <h6>
                            <span class="font-weight-bold">{{ $tweet->user->name }}</span>
                            <span class="text-muted">{{ __('@') }}{{ $tweet->user->screen_name }}</span>
                        </h6>
                        <p>{{ $tweet->text }}</p>
                        
                        @if($thisUser)
                            <button class="btn btn-primary showing-button" onclick="hideTweet(this, '{{ $tweet->id }}')" data-toggle="tooltip" data-placement="bottom" title="Toggle visibility">
                                <i class="fas fa-eye"></i> Showing
                            </button>
                        @endif

                        <hr>
                    </article>
                @endif
            @endforeach
        @else 
            <h6>This user has not set up a twitter account yet.</h6>
        @endif
    </div>
</section>