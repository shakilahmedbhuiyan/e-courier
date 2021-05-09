<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include ('inc.head')
</head>


<body style="background-color: #edf0f5;" class="bg-logo">
<div id="app">
    <main class="container">
        <div class="row my-5">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center font-weight-bold text-capitalize h1 text-primary">
{{--                    <span class="fas fa-truck-loading"></span>--}}
                    <img src="{{ asset('storage/assets/logoAsset-2.svg')}}" class="img-responsive profile-img" width="20%"/>
                </h1>
                <h1 class="text-center font-weight-bold text-capitalize"> {{ __('E-Courier' )}}</h1>

            </div>

            <div
                class="@if (Route::current()->getName() === 'user.register') col-md-8 offset-md-2  @else col-md-6 offset-md-3 @endif">
                @yield('content')
            </div>
        </div>

    </main>
</div>

<div class="stick fixed-bottom">
    <div class="container pb-2">
        <span class="fas fa-copyright"></span> {{ __('Shakil Ahmed') }}
    </div>
</div>

</body>


</html>

