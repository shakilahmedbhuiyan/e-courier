<div class="header navbar">
    <div class="header-container">
        <div class="nav-logo">
            <a href="{{ route('admin') }}" style="color:cornflowerblue">
                <b> <span class="fas fa-truck-loading"></span></b>
                <span class="logo font-weight-bold text-capitalize"> {{ __('E-Courier' )}}</span>
            </a>
        </div>
        <ul class="nav-left">
            <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                    <i class="las la-bars"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                    <i class="las la-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="search-box">
                <input class="form-control" type="text" placeholder="Search with Parcel no...">
                <i class="lni lni-search"></i>
            </li>
            <li class="massages dropdown dropdown-animated scale-left">
                <span class="counter">3</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="lni lni-envelope"></i>
                </a>
                <ul class="dropdown-menu dropdown-lg">
                    <li>
                        <div class="dropdown-item align-self-center">
                            <h5><span class="badge badge-primary badge-pro float-right">745</span>Messages</h5>
                        </div>
                    </li>
                    <li>
                        <ul class="list-media">

                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <i class="lni lni-user"></i>
                                    </div>
                                    <div class="info">
                                        <span class="title">Amanda Robertson </span>
                                        <span class="sub-title">
                                            Dummy text of the printing and typesetting industry.
                                        </span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="check-all text-center">
                    <span>
                      <a href="#" class="text-gray">View All</a>
                    </span>
                    </li>

                </ul>
            </li>

            <li class="notifications dropdown dropdown-animated scale-left">
                <span class="counter">2</span>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="lni lni-alarm"></i>
                </a>

                <ul class="dropdown-menu dropdown-lg">
                    <li>
                        <h5 class="n-title text-center">
                            <i class="lni lni-alarm"></i>
                            <span>Notifications</span>
                        </h5>
                    </li>
                    <li>
                        <ul class="list-media">
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-primary">
                                            <i class="lni lni-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <span class="title">5 new messages</span>
                                        <span class="sub-title">4 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-success">
                                            <i class="lni lni-comments-alt"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                            <span class="title">
                                4 new comments
                            </span>
                                        <span class="sub-title">12 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-info">
                                            <i class="lni lni-users"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                            <span class="title">
                              3 Friend Requests
                            </span>
                                        <span class="sub-title">a day ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="list-item">
                                <a href="#" class="media-hover">
                                    <div class="media-img">
                                        <div class="icon-avatar bg-purple">
                                            <i class="lni lni-comments-alt"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                            <span class="title">
                              2 new messages
                            </span>
                                        <span class="sub-title">12 min ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="check-all text-center">
                    <span>
                      <a href="#" class="text-gray">Check all notifications</a>
                    </span>
                    </li>
                </ul>
            </li>


            <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{--                    <img class="profile-img img-fluid" src="assets/img/avatar/avatar.jpg" alt="">--}}
                    <i class="lni lni-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-md">
                    <li>
                        <ul class="list-media">
                            <li class="list-item avatar-info">
                                <div class="media-img">
                                    <i class="lni lni-user"></i>
                                </div>
                                <div class="info">
                                    <span class="title text-semibold">{{ __(Auth::user()->name) }}</span>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="">
                            <i class="lni lni-cog"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        @if(Auth::guard('manager')->check())
                        <a href="{{ route('manager.profile')  }}">

                            <i class="lni lni-user"></i>
                            <span>Profile</span>
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="">
                            <i class="lni lni-envelope"></i>
                            <span>Inbox</span>
                            <span class="badge badge-pill badge-primary badge-pro pull-right">2</span>
                        </a>
                    </li>
                    <li>
                        @if(Auth::guard('manager')->check())
                        <a href="{{ __(route('manager.logout')) }}">
                            @elseif(Auth::guard('admin')->check())
                                <a href="{{ __(route('admin.logout')) }}">
                                    @endif
                            <i class="lni lni-lock"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
