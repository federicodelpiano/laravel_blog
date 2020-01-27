@extends('layouts.no_header_layout')

@section('title', 'Login')

@section('content')
<section class="container my-5 login">
    <h1 class="text-center form-title">{{ __('Login') }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group custom-form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    
                    <input id="email" type="email" class="form-control custom-text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group custom-form-group">
                    <label for="password">{{ __('Password') }}</label>
                    
                    <input id="password" type="password" class="form-control custom-text-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-auto mx-auto">
                        <button type="submit" class="btn btn-primary primary-button">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
