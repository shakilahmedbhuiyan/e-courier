<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    <title>{{__(config('app.name').'-'.$status.' couriers')}}</title>
</head>

<body>
<div id="app">
    <main class="container-fluid">
        <div class="row d-flex justify-content-center pt-1">
            <img src="{{ asset('storage/assets/logoAsset-2.svg')}}" class="img-responsive profile-img" width="40px" alt="logo"/>
            <h4 class="text-center font-weight-bold text-capitalize playfair"> &nbsp;{{ __(' E-Courier' )}}</h4>
        </div>
            <div class="">
                <hr/>
                <div class="d-flex justify-content-around">
                    <small>Generated on: {{__(date('l, M d Y, h:i:s a', strtotime(now())))}}</small>
                    <span class="text-semibold text-capitalize">@yield('title')</span>
                    <small>@yield('branch')</small>
                </div>

                @yield('content')
            </div>
    </main>
</div>
</body>
