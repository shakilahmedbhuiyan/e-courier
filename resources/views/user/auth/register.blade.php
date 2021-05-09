@extends('layouts.auth')
@section('content')


<div class="w-100">
    <div class="card border-0 rounded shadow-md">
        <div class="card-header h4 d-flex justify-content-between w-100">
            <span class="text-secondary">{{ __('Create New Account') }}</span>
            <span class="text-primary lni lni-handshake"></span>
        </div>

        <div class="card-body">
            <form method="post" action="#" class="password-strength">
                @csrf

                {{-- session messages and errors--}}
                <div>
                    @if ( session('success') )
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div>
                    @if ( session('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="row">
                    {{-- user basic info part--}}

                    <div class="col-sm-6 col-md-5 col-lg-6">

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('reg.name') is-invalid @enderror"
                                   name="reg.name" value="{{ old('reg.name') }}" autocomplete="name"
                                   placeholder="Full Name" autofocus>

                            @error('reg.name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('reg.email') is-invalid @enderror"
                                   name="reg.email" value="{{ old('reg.email') }}" autocomplete="name"
                                   placeholder="Email address" autofocus>

                            @error('reg.email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <input id="mobile" type="text"
                                   class="form-control @error('reg.mobile') is-invalid @enderror"
                                   name="reg.mobile" value="{{ old('reg.mobile') }}" autocomplete="off"
                                   placeholder="Mobile number with country code">
                            <sup class="text-monospace text-black-50 text-sm-right">Example: +8801234567890</sup>

                            @error('reg.mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <textarea id="address" type="text"
                                      class="form-control @error('reg.address') is-invalid @enderror"
                                      name="reg.address" value="{{ old('reg.address') }}" autocomplete="off"
                                      placeholder="Address"></textarea>

                            @error('reg.address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    {{-- password part--}}
                    <div class="col-sm-6 col-md-5 col-lg-6">

                        <div class="form-group input-group ">
                            <input id="password" type="password"
                                   class="form-control password-strength__input @error('reg.password') is-invalid @enderror"
                                   name="reg.password"
                                   autocomplete="off" placeholder="Password">

                            {{--  password visibility button--}}
                            <div class="input-group-append">
                                <button
                                    class="password-strength__visibility border-left-0 btn btn-outline-secondary"
                                    type="button" style="border-radius:4px;">
                                                <span class="password-strength__visibility-icon"
                                                      data-visible="hidden">
                                                    <i class="fas fa-eye-slash"></i></span>
                                    <span class="password-strength__visibility-icon js-hidden"
                                          data-visible="visible">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                </button>
                            </div>

                            <div>
                                <!-- password strength indicator -->
                                <small class="password-strength__error text-danger js-hidden">
                                    This symbol is not allowed!
                                </small>
                                <small class="form-text text-muted mt-2" id="passwordHelp">
                                    Add 9 characters or more, lowercase letters, uppercase letters, numbers
                                    and symbols to make the password really strong!
                                </small>

                                <div class="password-strength__bar-block progress mb-4">
                                    <div class="password-strength__bar progress-bar bg-danger"
                                         role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>

                            </div>

                            @error('reg.password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="reg.password_confirmation" autocomplete="off"
                                   placeholder="Confirm Password">

                        </div>
                        @error('reg.password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                </div>

                <div class="form-group mb-0 d-flex justify-content-between card-footer">
                    <div>
                        <a class="page-link" href="{{ route('user.login') }}"> <i
                                class="lni lni-angle-double-left"></i> {{ __('Login') }}</a>
                    </div>
                    <div>
                        <button type="submit" class="password-strength__submit btn w-100 btn-outline-primary">
                            {{ __('Register') }}

                        </button>
                    </div>

                </div>
                <div class="pt-2 m-auto d-flex justify-content-center ">

                    <a href="{{ route('home') }}" class="text-decoration-none ">
                        <span class="lni lni-chevron-left"> </span>
                        {{ __('Back to Home') }} </a>
                </div>

            </form>


        </div>
    </div>

</div>

<script src="{{ asset('js/passwordStrength.js')}}"></script>

    @endsection
