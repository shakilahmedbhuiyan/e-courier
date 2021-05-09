<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="icon" content="{{__(asset('favicon.ico'))}}">
<link rel="icon" type="image/ico" href="{{__(asset('favicon.ico'))}}">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title> @if($title) {{ config('app.name').' - '.$title}} @else {{ config('app.name')}} @endif</title>


<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
      crossorigin="anonymous">

<link href="{{ asset('css/public.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('js/datatables/datatables.css') }}">

<!-- FontAwesome 5 icon -->
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">--}}

<!-- Icons CSS-->
<link rel="stylesheet" href="{{ asset('css/LineIcons.css') }}">
<link rel="stylesheet" href="{{ asset('css/line-awesome.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/jQuery-v3.5.1.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--  Animate on Scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script src="{{ asset('js/datatables/datatables.js') }}"></script>



