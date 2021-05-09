<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include ('inc.publicHeader')

</head>


<body>
<span class="screen-darken"></span>
    <section>
        <main class="publicBg">
            <div>
                @include('user.nav')
                <div>
                    @yield('section1')
                </div>
            </div>
        </main>

        <div>
            @yield('content')
        </div>

    </section>



<div>
    @include('inc.footer')

</div>

</body>


</html>
<script>
    AOS.init();
</script>
