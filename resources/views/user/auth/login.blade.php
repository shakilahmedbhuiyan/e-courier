@extends('layouts.auth')

@section('content')
<div class="w-100">
    <div class="card border-0 rounded shadow-md">
        <div class="card-header">
            <span class="text-left text-secondary">User Login</span>
        </div>

        <div class="card-body">

            <form method="post" action="{{ route('user.auth')}}">
                @csrf

                <div class="form-group input-group input-group-lg">

                    <input id="email" placeholder="E-Mail Address"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group input-group input-group-lg">
                    <input id="password" type="password"  placeholder="Password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="my-3">

                    <button type="submit" class="btn btn-outline-primary w-100">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div>
            </form>

            <div class="pt-4 m-auto d-flex justify-content-center ">
                <p class="text-center float-left">Don't have any account? </p> &nbsp
                <a class="float-right" href="{{ route('user.register') }}"> {{ __('Register Now') }}</a>
            </div>
            <div class="pt-2 m-auto d-flex justify-content-center ">

                <a href="{{ route('home') }}" class="text-decoration-none ">
                    <span class="lni lni-chevron-left"> </span>
                    {{ __('Back to Home') }} </a>
            </div>

        </div>

    </div>
</div>
    @endsection
