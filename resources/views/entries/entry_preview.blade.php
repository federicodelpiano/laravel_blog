<article>
    <h3><a href="{{ url('/entries/' . $entry->id) }}">{{ $entry->title }}</a></h3>
    <p class="card-text">{{ $entry->content }}</p>
    <p class="card-subtitle mb-2 text-muted">
        Posted by <a href="{{ url('/users/' . $entry->user_id) }}">{{ $entry->user->username }}</a> on {{ \Carbon\Carbon::parse($entry->created_at)->format('m-d-Y')}}
    </p>
    @if(Auth::check())
        <a href="{{ url('/entries/' . $entry->id . '/edit') }}" class="card-link">Edit</a>
    @endif
</article>