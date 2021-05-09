<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name').__(' -Error') }}</title>
    @include ('inc.head')

</head>
<body style="background-color:#E7EBF3">
<div id="app" class="container">

    <div class="d-flex justify-content-center">
        <img class="img-responsive error-gif" src="{{ asset('storage/assets/error.gif')}}">
    </div>
        <main class="shadow-sm">
                <p class="text-center ">
                    <small class="text-sm font-weight-light font-size-25">Server returned a</small>
                    <span class="errorCode">&nbsp;@yield('code')&nbsp;</span>
                    <small>status code</small>
                </p>
            <div class="errorMessage">
                @yield('content')
            </div>

            <div class="backButton">
                <a  href="{{ url()->previous() }}" class="btn w-100 btn-outline-secondary">
                    <i class="las la-undo"></i> {{__('Back to Previous Page')}}
                </a>
            </div>


        </main>



</div>
</body>
</html>
