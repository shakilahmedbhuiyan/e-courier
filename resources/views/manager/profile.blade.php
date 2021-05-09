@extends('layouts.dash')
@section('content')
    <div class="main-content">

        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Profile</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('manager'))}}">Home</a></li>
                        <li class="active">/ Profile</li>
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
                                @if(!empty($manager) && $manager->count())
                                    @foreach( $manager as $data)
                                        <div class="m-b-25">
                                            @if( $data->image)
                                                <img src="{{__($data->image)}}" class="img-radius" alt="User-Profile-Image"/>
                                            @else
                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                 class="img-radius" alt="User-Profile-Image">
                                                @endif
                                        </div>
                                        <h5 class="f-w-600">{{ __($data->name) }}</h5>
                                        <p>
                                            @if(Auth::guard('admin')->check())
                                                {{__('Admin')}}
                                            @elseif(Auth::guard('manager')->check())
                                                {{__('Manager')}}
                                            @elseif(Auth::guard('employee')->check())
                                                {{__('Employee')}}
                                            @endif
                                        </p>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                           data-original-title="Edit" data-abc="true">
                                            <i class="las la-user-edit feather edit text-purple f-s-30"></i>
                                        </a>

                            </div>

                        </div>

                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{__($data->email)}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{__($data->phone)}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400">{{__($data->address)}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Branch</p>
                                        <h6 class="text-muted f-w-400">{{__($data->branch->name)}}</h6>
                                        <h6 class="text-muted f-w-400">{{__($data->branch->address)}}</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
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
