@extends('layouts.dash')
@section('content')
    <div class="main-content">

        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Branch Info</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li><a href="{{__(route('branches.index'))}}">/ Branches</a></li>
                        <li class="active">/ Branch Info</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->


        <div class="page-content" id="page-content">
            <div class="container d-flex justify-content-center w-100">
                <div class="card user-card-full col-12">
                    <div class="row">

                        <div class="col-sm-4 bg-c-lite-green user-profile">

                            <div class="card-block text-center text-white">
                                @if(!empty($branch) && $branch->count())
                                    @foreach( $branch as $data)
{{--                                        {{ dd($data) }}--}}
                                        <div class="m-b-25">
                                            @if( $data->image)
                                                <img src="{{__($data->image)}}" class="img-radius w-25"
                                                     alt="Branch-Profile-Image"/>
                                            @else
                                                <div class="img">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-25 w-sm shadow-sm">
                                                        <linearGradient id="roGKjuh~7NeEHEjpD5CGda" x1="24" x2="24"
                                                                        y1="1086.939" y2="1124.939"
                                                                        gradientTransform="translate(0 -1082)"
                                                                        gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#f0f0f0"></stop>
                                                            <stop offset="1" stop-color="#bbc1c4"></stop>
                                                        </linearGradient>
                                                        <path fill="url(#roGKjuh~7NeEHEjpD5CGda)"
                                                              d="M40,43H8c-1.105,0-2-0.895-2-2V15L24,5l18,10v26C42,42.105,41.105,43,40,43z"></path>
                                                        <linearGradient id="roGKjuh~7NeEHEjpD5CGdb" x1="21.115" x2="26.639"
                                                                        y1="1094.115" y2="1099.639"
                                                                        gradientTransform="translate(0 -1082)"
                                                                        gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#33bef0"></stop>
                                                            <stop offset="1" stop-color="#0a85d9"></stop>
                                                        </linearGradient>
                                                        <path fill="url(#roGKjuh~7NeEHEjpD5CGdb)"
                                                              d="M22,12h4c0.552,0,1,0.448,1,1v4c0,0.552-0.448,1-1,1h-4c-0.552,0-1-0.448-1-1v-4	C21,12.448,21.448,12,22,12z"></path>
                                                        <linearGradient id="roGKjuh~7NeEHEjpD5CGdc" x1="24" x2="24"
                                                                        y1="347.419" y2="367.055"
                                                                        gradientTransform="matrix(1 0 0 -1 0 390)"
                                                                        gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#393c40"></stop>
                                                            <stop offset=".102" stop-color="#35383c"></stop>
                                                            <stop offset=".471" stop-color="#2d3033"></stop>
                                                            <stop offset="1" stop-color="#2b2e30"></stop>
                                                        </linearGradient>
                                                        <rect width="30" height="20" x="9" y="23"
                                                              fill="url(#roGKjuh~7NeEHEjpD5CGdc)"></rect>
                                                        <path fill="#64717c"
                                                              d="M39,23H9v-1c0-0.552,0.448-1,1-1h28c0.552,0,1,0.448,1,1V23z"></path>
                                                        <linearGradient id="roGKjuh~7NeEHEjpD5CGdd" x1="23.999" x2="23.999"
                                                                        y1="1085.049" y2="1098.827"
                                                                        gradientTransform="translate(0 -1082)"
                                                                        gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#d43a02"></stop>
                                                            <stop offset="1" stop-color="#b9360c"></stop>
                                                        </linearGradient>
                                                        <path fill="url(#roGKjuh~7NeEHEjpD5CGdd)"
                                                              d="M41.654,17.096L24,7.288L6.346,17.096c-0.483,0.268-1.092,0.094-1.36-0.388l-0.972-1.749	c-0.268-0.483-0.094-1.092,0.388-1.36l18.14-10.078c0.906-0.503,2.008-0.503,2.914,0l18.14,10.078	c0.483,0.268,0.657,0.877,0.388,1.36l-0.972,1.749C42.746,17.191,42.137,17.365,41.654,17.096z"></path>
                                                        <path fill="#e3a600"
                                                              d="M24,43h-8.5c-0.276,0-0.5-0.224-0.5-0.5v-7c0-0.276,0.224-0.5,0.5-0.5H24V43z"></path>
                                                        <path fill="#c48c00"
                                                              d="M32.5,43H24v-8h8.5c0.276,0,0.5,0.224,0.5,0.5v7C33,42.776,32.776,43,32.5,43z"></path>
                                                        <path fill="#fec730"
                                                              d="M28.5,35h-9c-0.276,0-0.5-0.224-0.5-0.5v-7c0-0.276,0.224-0.5,0.5-0.5h9c0.276,0,0.5,0.224,0.5,0.5v7	C29,34.776,28.776,35,28.5,35z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <h5 class="f-w-600">{{ __($data->name) }}</h5>
                                        <ul class="list-group text-left">
                                            <li class="list-item">
                                                <i class="las la-envelope btn btn-outline-info "></i>
                                                <h6 class="text-muted f-w-400">{{ __($data->email)}}</h6>
                                            </li>
                                            <li class="list item">
                                                <i class="las la-phone btn btn-outline-info"></i>
                                                <h6 class="text-muted f-w-400">{{ __($data->phone)}}</h6>
                                            </li>
                                            <li class="">
                                                <i class="las la-map-pin btn btn-outline-info"></i>
                                                <h6 class="text-muted f-w-400">{{ __($data->address)}}</h6>
                                            </li>
                                        </ul>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="Edit" data-abc="true">
                                            <i class="las la-user-edit feather edit text-purple f-s-30"></i>
                                        </a>

                            </div>

                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Managers</h6>
                                @foreach( $manager as $m )
                                    <div class="card row">


                                            <div class="col-12 row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-0 f-w-600">Name:</p>
                                                    <h6 class="text-muted f-w-400">{{ __('('.$m->id.')'.$m->employee->name )}}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400">{{ __($data->email)}}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Phone</p>
                                                    <h6 class="text-muted f-w-400">{{ __($data->phone)}}</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Address</p>
                                                    <h6 class="text-muted f-w-400">{{ __($data->address)}}</h6>
                                                </div>
                                            </div>

                                    </div>

                                    @endforeach

                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="facebook" data-abc="true"><i
                                                class="mdi mdi-facebook feather icon-facebook facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="twitter" data-abc="true"><i
                                                class="mdi mdi-twitter feather icon-twitter twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="instagram" data-abc="true"><i
                                                class="mdi mdi-instagram feather icon-instagram instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        @endforeach
                        @endif

                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
