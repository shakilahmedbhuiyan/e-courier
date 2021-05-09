<div class=" sticky-top">
    <button data-trigger="navbar_main" class="d-lg-none btn btn-outline-primary mt-2 ml-4"
            type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main" aria-controls="navbar_main">
        <i class="lni lni-text-align-left"></i>
    </button>

    <!-- ============= COMPONENT ============== -->
    <nav id="navbar_main" class="container mobile-offcanvas navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="offcanvas-header">
                <button class="btn-close float-end"></button>

                <script>
                    $('.btn-close').click(function () {
                        $('#navbar_main').removeClass('show', 'collapse')
                    })
                    $(document).scroll(function () {
                        var scroll = $(window).scrollTop();
                        if (scroll >=100 && screen.width >=696){
                            $('.sticky-top').addClass('bg-light shadow-sm')
                        }
                        else
                            $('.sticky-top').removeClass('bg-light shadow-sm')
                    })
                </script>
            </div>
            <a class="navbar-brand font-weight-bold text-primary text-capitalize" href="{{__(route('home'))}}">
                <i class="las la-truck-loading"></i>
                <span>
                {{__(config('app.name'))}}
            </span>
            </a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{__(route('home'))}}"> <i class="lni lni-home "></i> </a>
                </li>
                @if(\Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{__(route('user.profile'))}}"> My Account </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Courier </a>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <li><a class="dropdown-item text-black-50" href="#"> Services</a></li>
                        <li><a class="dropdown-item text-black-50" href="#"> Coverage </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Contact </a>
                </li>
                <li class="nav-item">
                    @if(Auth::guard('user')->check())
                        <a class="nav-link" href="{{__(route('user.logout'))}}">
                            <i class="las la-sign-out-alt text-lg-right"></i> Sign Out
                        </a>
                    @else
                        <a class="nav-link" href="{{__(route('user.login'))}}">
                            <i class="las la-sign-in-alt text-lg-right"></i> Login
                        </a>
                    @endif
                </li>
            </ul>

        </div> <!-- container-fluid.// -->
    </nav>
</div>

<!-- ============= COMPONENT END// ============== -->
