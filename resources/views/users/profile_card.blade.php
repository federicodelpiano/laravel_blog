<div class="row">
    <div class="col-3">
        <figure class="text-center my-2">
            <img src="{{ asset('storage/user-placeholder.png')}}" class="img-thumbnail border-0" alt="user-profile-picture">
        </figure>
    </div>
    <div class="col-9">
        <h2 class="card-title">{{ $user->username }}</h2>
        <h3 class="card-subtitle mb-2 text-muted"><i class="fab fa-twitter"></i> {{ __('@') }}{{ $user->twitter_username }}</h3>
    </div>
</div>