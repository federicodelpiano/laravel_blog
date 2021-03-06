<section class="row profile-card">
    <div class="col-3">
        <figure class="text-center my-2">
            <img src="/img/user-placeholder.png" class="img-thumbnail border-0 profile-card__img" alt="user-profile-picture">
        </figure>
    </div>
    <div class="col-9 my-auto">
        <h2 class="card-title">{{ $user->username }}</h2>
        @if($user->twitter_username)
            <h3 class="card-subtitle mb-2 text-muted"><i class="fab fa-twitter"></i> {{ __('@') }}{{ $user->twitter_username }}</h3>
        @endif
    </div>
</section>