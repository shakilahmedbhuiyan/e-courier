@extends('layouts.user')

@section('section1')
    <section class="container">
        <div class="playfair  mt-5">
            <h1 class="text-white font-weight-bold text-uppercase playfair"> {{__(config('app.name'))}}</h1>
            <h3 class="text-white-50"> {{__('Courier Made Easy')}}</h3>
        </div>

    </section>

@endsection
@section('content')
    <section class="container">
        <div class="w-100 bg-white-50">

            <h4 class="py-2 playfair font-weight-bold">My Account</h4>
            <nav>
                <div class="nav nav-tabs" id="nav-tabs" role="tablist">

                    <button class="nav-link btn-outline-info" id="nav-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="true">Profile
                    </button>

                    <button class="nav-link btn-outline-info" id="shipped-couriers-tab" data-bs-toggle="tab"
                            data-bs-target="#couriers-shipped" type="button" role="tab" aria-controls="couriers"
                            aria-selected="false">Shipped Couriers
                    </button>
                    <button class="nav-link btn-outline-info" id="received-couriers-tab" data-bs-toggle="tab"
                            data-bs-target="#couriers-received" type="button" role="tab" aria-controls="couriers"
                            aria-selected="false">Received Couriers
                    </button>
                </div>
            </nav>

            <div class="tab-content pb-5 my-2" id="nav-tabContent">
                <div class="tab-pane fade show active " id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="row">

                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    @if( Auth::user()->image)
                                        <img src="{{ asset(Auth::user()->image) }}" class="img-radius"
                                             alt="User-Profile-Image"/>
                                    @else
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                             class="img-radius" alt="User-Profile-Image">
                                    @endif
                                </div>
                                <h5 class="f-w-600">{{ __(Auth::user()->name) }}</h5>
                                <p>
                                    User
                                </p>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                   data-original-title="Edit" data-abc="true">
                                    <i class="las la-user-edit feather edit text-purple font-size-25"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">
                                            {{__(Auth::user()->email)}} <sup
                                                @if(Auth::user()->email_verified_at) class="text-success" @endif><i
                                                    class="lni lni-shield"></i></sup>
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{__(Auth::user()->phone)}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400">{{__(Auth::user()->address)}}</h6>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="tab-pane fade show" id="couriers-shipped" role="tabpanel" aria-labelledby="shipped-couriers-tab">
                    @include('user.shipped')
                </div>
                <div class="tab-pane fade show" id="couriers-received" role="tabpanel" aria-labelledby="received-couriers-tab">
                    @include('user.received')
                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#shipped').DataTable();
            $('#received').DataTable();
        });
    </script>
@endsection
