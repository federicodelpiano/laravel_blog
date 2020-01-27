@extends('layouts.no_header_layout')

@section('title', 'Register')

@section('content')
<div class="container my-5">
    <h1 class="text-center form-title">{{ __('Register') }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if(session('twitter_screen_name') || old('twitter_username') != null)
                    <div class="form-group custom-form-group">
                        <label for="twitter_username">{{ __('Twitter Username') }}</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control border-0 rounded-0 @error('twitter_username') is-invalid @enderror" id="twitter_username" name="twitter_username" value="{{ old('twitter_username') ? old('twitter_username') : session('twitter_screen_name') }}" readonly>
                        </div>
                    </div>
                @else
                    <div class="text-center my-2">
                        <a class="btn btn-primary primary-button" href="{{ url('twitter/login') }}"><i class="fab fa-twitter"></i> Sign In</a>
                    </div>
                @endif

                <div class="form-group custom-form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form-control custom-text-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group custom-form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control custom-text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group custom-form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control custom-text-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group custom-form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control custom-text-input" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-auto mx-auto">
                        <button type="submit" class="btn btn-primary primary-button">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
