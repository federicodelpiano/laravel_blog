<article class="entry-container">
    <h3 class="entry-container__title"><a href="{{ url('/entries/' . $entry->id) }}">{{ $entry->title }}</a></h3>
    <p class="card-text entry-container__content">{{ $entry->content }}</p>
    <p class="card-subtitle mb-2 text-muted entry-container__author-date">
        Posted by <a href="{{ url('/users/' . $entry->user_id) }}">{{ $entry->user->username }}</a> on {{ \Carbon\Carbon::parse($entry->created_at)->format('m-d-Y')}}
    </p>

    @if(Auth::check())
        <a href="{{ url('/entries/' . $entry->id . '/edit') }}" class="entry-container__edit-link">Edit</a>
    @endif
</article>