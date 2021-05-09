@extends('layouts.auth')
@section('content')

    <div class="w-100">
        <div class="card border-0 rounded shadow-md">
            <div class="card-header">
                <span class="text-left text-secondary">Manager Login</span>
            </div>

            <div class="card-body">

                <form method="post" action="{{ __(route('manager.login')) }}">
                    @csrf

                    <div class="form-group input-group input-group-lg">

                        <input type="email" id="email" placeholder="E-Mail Address" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group input-group input-group-lg">
                        <input type="password" id="password" type="password" placeholder="Password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="current-password">

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
                        @if ( session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif


                        @if (Route::has('manager.password.request'))
                            <a class="btn btn-link" href="{{ route('manager.password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </div>
                </form>


                <div class="pt-2 m-auto d-flex justify-content-center ">

                    <a href="{{ route('home') }}" class="text-decoration-none ">
                        <span class="lni lni-chevron-left"> </span>
                        {{ __('Continue to E-Courier') }} </a>
                </div>

            </div>

        </div>
    </div>
@endsection
