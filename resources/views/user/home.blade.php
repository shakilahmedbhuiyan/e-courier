@extends('layouts.user')

@section('section1')
    <section class="container ">
        <div class="playfair  mt-5">
            <h1 class="text-white font-weight-bold text-uppercase playfair"> {{__(config('app.name'))}}</h1>
            <h3 class="text-white-50"> {{__('Courier Made Easy')}}</h3>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 bg-white-50 rounded">
                <form method="post" action="{{__(route('home.addCourier'))}}" class="shadow-md p-3" data-aos="zoom-in">
                    <h5 class="text-black-50 playfair">{{__('Book A Parcel Now')}}</h5>
                    @csrf
                    <div>
                        <div class="input-group-sm mb-3 d-flex justify-content-around">
                           <div>
                               <select class="form-control @error('branchFrom') is-invalid @enderror" aria-label="Select Your Nearest Branch" id="branchFrom"
                                       name="branchFrom">
                                   <option value="" selected>{{__('Select Your Nearest Branch')}}</option>
                                   @foreach($branches as $branch)
                                       <option value="{{$branch->id}}">{{__($branch->name)}}</option>
                                   @endforeach
                               </select>
                               @error('branchFrom')
                               <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                            <span data-aos="zoom-out" data-aos-duration="2000">
                                <i class="text-primary text-lg-center font-weight-bolder font-size-25 las la-angle-double-right"></i>
                            </span>

                           <div>
                               <select class="form-control @error('branchTo') is-invalid @enderror" aria-label="Select Receiver Branch" id="branchTo"
                                       name="branchTo">
                                   <option value="" selected>{{__('Select Receiver Branch')}}</option>
                                   @foreach($branches as $branch)
                                       <option value="{{$branch->id}}">{{__($branch->name)}}</option>
                                   @endforeach
                               </select>
                               @error('branchTo')
                               <span class="invalid-feedback  text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                           </div>
                        </div>

                        <div class="input-group-sm mb-3">
                            <select class="form-control bg-transparent b-b @error('delivery') is-invalid @enderror" aria-label="Delivery Method" id="delivery"
                                    name="delivery">
                                <option value="" selected class="text-secondary">{{__('Delivery Method')}}</option>
                                @foreach( $delivery as $d)
                                    <option value="{{ $d }}" class="text-uppercase">{{__($d)}}</option>
                                @endforeach
                            </select>
                            @error('delivery')
                                <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bg-transparent border-0 text-black-50" id="receiver">{{__('Receiver:')}}</span>
                            <input type="text" class="form-control bg-transparent b-b @error('receiver') is-invalid @enderror"
                                   placeholder="Receiver Email Address" value="{{__(old('receiver'))}}"
                                   aria-label="Receiver Email Address" aria-describedby="receiver" name="receiver">
                            @error('receiver')
                            <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <button type="submit" class="btn btn-sm w-100 btn-outline-primary"><i
                                    class="lni lni-package"></i> {{__('Book Now')}}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class=" d-flex justify-content-end">
{{--            <img class="img img-fluid" data-aos="zoom-in-left" data-aos-duration="1000"--}}
{{--                 src="{{__(asset('storage/assets/logoAsset-2.svg'))}}" width="25%"--}}
{{--                 alt="E-Courier"/>--}}


            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-3 0 844.54 624.01" class="truck" width="25%">
                <defs>
                    <style>
                        .cls-1{fill:#f9c580;}.cls-2{opacity:0.86;}.cls-3{fill:#eda53e;}.cls-4,.cls-5{opacity:0.17;}.cls-4{fill:url(#radial-gradient);}.cls-5{fill:url(#radial-gradient-2);}.cls-6{fill:#658cc4;}.cls-7{fill:#0f1938;}
                    </style>
                    <radialGradient id="radial-gradient" cx="1474.62" cy="-8.68" fx="1892.4722941046045" fy="-8.677060128222365"
                                    r="422.08" gradientTransform="matrix(0.76, -0.01, 0.57, 0.4, -417.64, 603.03)"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-opacity="0"/>
                        <stop offset="0.24" stop-opacity="0.5"/>
                        <stop offset="0.5"/>
                        <stop offset="0.77" stop-opacity="0.5"/>
                        <stop offset="1" stop-opacity="0"/>
                    </radialGradient>
                    <radialGradient id="radial-gradient-2" cx="509.14" cy="542.95" fx="791.8527128826042" fy="542.9459449281403"
                                    r="285.57" gradientTransform="matrix(0.48, -0.05, 0.37, 0.38, -285.34, 415.05)"
                                    xlink:href="#radial-gradient"/>
                </defs>
                <title>logoAsset 2</title>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <path class="cls-1"
                              d="M77,470.14a24.61,24.61,0,0,0,30.08,17.35l332.16-89a24.61,24.61,0,0,0,17.34-30.08L380.28,83.65a24.62,24.62,0,0,0-30.09-17.34L231.7,98.24l38.06,142.28-94.85,25.33L136.84,123.56,18.19,155.33A24.62,24.62,0,0,0,.85,185.42Z"/>
                        <g class="cls-2">
                            <polygon class="cls-3" points="238.13 452.36 446.36 330.32 437.47 297.11 108.85 487.01 238.13 452.36"/>
                            <path class="cls-3"
                                  d="M50.43,370.84l351.6-206-8.87-33.1L261.09,208.1l8.67,32.42-94.85,25.33L173.07,259,40.94,335.37C45.67,353.05,46.12,354.72,50.43,370.84Z"/>
                            <path class="cls-3"
                                  d="M71.15,448.34,422.77,242.26l-8.85-33L61.65,412.8C64.7,424.23,69.81,443.32,71.15,448.34Z"/>
                            <path class="cls-3" d="M247.11,155.84,378.44,78.9a24.61,24.61,0,0,0-28.25-12.59l-29.59,8L238.06,122Z"/>
                            <path class="cls-3"
                                  d="M27.36,284.58l131.89-77.26L150,172.89,17.92,249.27C21.2,261.55,23.08,268.55,27.36,284.58Z"/>
                        </g>
                        <path class="cls-4"
                              d="M844.52,564c.63,1-12.9,12-28,21-71.06,42.25-166.31,33-182.66,31.43a190,190,0,0,0-35.5-.6c-26.26,2-42.06,9.11-43,8.08-.59-.66,18.18-7.07,43.35-16.07C637,594.14,635.18,594,640.52,593c30.24-5.45,32.91,10.49,70,10,18.7-.25,35.8-4.83,70-14,12.88-3.45,19.66-5.8,23-7C828.55,573,843.87,563,844.52,564Z"/>
                        <path class="cls-5"
                              d="M264.52,588c0,.81-14.67,1.29-26,2-68.34,4.31-95.34,19.6-130.5,17a79.15,79.15,0,0,0-22.5,1c-16.58,3.23-26.38,11-27,10s10.47-11.72,27-18a81.67,81.67,0,0,1,22.5-5c67.92-6,75.66-8.68,119.5-9C245.63,585.87,264.51,587.08,264.52,588Z"/>
                        <path class="cls-6"
                              d="M840.45,409,840.27,0h-302a37.71,37.71,0,0,0-37.75,37.75V419.5L92.23,530.86a9.39,9.39,0,0,0-6.61,11.56L100.49,597a9.39,9.39,0,0,0,11.56,6.61L576.49,477c59.82-85.14,144.93-126.66,210-105.33C800.17,376.12,820.32,385.82,840.45,409Z"/>
                        <path class="cls-7"
                              d="M710.26,340.07c-73.65.07-134.2,62.6-131.77,135.88,2.32,70,61.39,127,131.65,127.05,71.84.09,132.49-59.26,132.13-132.13C841.91,398.58,781.6,340,710.26,340.07ZM732,546a58.61,58.61,0,1,1,58.61-58.61A58.63,58.63,0,0,1,732,546Z"/>
                    </g>
                </g>
            </svg>



        </div>
    </section>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#branchFrom').select2();
        })
        $(document).ready(function () {
            $('#branchTo').select2();
        })
    </script>


@endsection

@section('content')
    <section class="banner-2" id="div1" data-aos="fade-up" data-aos-duration="700" @error('trackingCode') onload="focusdiv()" tabindex="1" @endif >

        <script type="text/javascript">
            function focusdiv(){  $('#div1').scrollTop($('#div1').height()) }

        </script>
        <div class="container p-5" style="margin-top: -1px">
            <h4 class="h3 text-dark font-size-25" data-aos="flip-down"
                data-aos-duration="700"> {{__('Track Your Parcel')}}</h4>
            <div class="card shadow-sm bg-transparent container" data-aos="fade-down" data-aos-duration="700">
                <div class="card-body py-2">
                    <form method="post" action="{{__(route('courier.tracking'))}}"  >
                        @csrf
                        <div class="input-group-sm mb-3 p-3 d-flex justify-content-around row">
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-1" data-aos="fade-in-right" data-aos-duration="900">
                                <input type="text" name="trackingCode" id="trackingCode" value="{{__(old('trackingCode'))}}"
                                       class="form-control bg-transparent b-b @error('trackingCode')is-invalid @enderror"
                                       placeholder="Enter Tracking Code" area-label="Enter Tracking Code" required>
                                @error('trackingCode')
                                <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-6 col-md-8 col-sm-12 mb-1" data-aos="zoom-out-down pr-1" data-aos-duration="900">
                                <input type="text" name="receiver_email" id="receiver" value="{{__(old('receiver_email'))}}"
                                       class="form-control bg-transparent b-b @error('receiver_email')is-invalid @enderror"
                                       placeholder="Receiver email" area-label="Receiver email" required>
                                @error('receiver_email')
                                <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 mb-1" data-aos="fade-out-left " data-aos-duration="900">
                                <button type="submit" class="btn btn-rounded btn-outline-success"><i class="lni lni-checkmark"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
