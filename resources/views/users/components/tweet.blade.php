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