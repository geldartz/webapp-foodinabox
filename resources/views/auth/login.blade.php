@extends('layouts.app')

@section('content')
<div class="container align-self-center login-form">
    <div class="row justify-content-center align-self-center">
        <div class="col-lg-6 col-sm-6 offset-md-1 mx-auto pad-0">
            <div class="text-holder">
                <p class="hello-text text-white">Hello, welcome to</p>
                <h1 class="ascob-text text-white">Food In A Box</h1>
                <p class="app-text text-white">Point of Sale and Online Food Ordering System</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mx-auto pad-0">
            <div class="form-holder">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <img class="login-logo" src="{{ asset('/images/foodinabox.png') }}" alt="">
                    <h2 class="login-text text-gray">Login</h2>
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-11">
                            <input id="email" type="email" placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-11">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback text-gray" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-md-center">
                        <div class="col-md-11">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-gray" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-md-center">
                        <div class="col-md-11">
                            <button type="submit" class="btn btn-login btn-primary w-full">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-md-8 offset-md-1">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-gray" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
