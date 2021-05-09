@extends('layouts.user')

@section('section1')
    <section class="container">
        <div class="playfair  mt-5">
            <h1 class="text-white font-weight-bold text-uppercase playfair"> {{__(config('app.name'))}}</h1>
            <h3 class="text-white-50"> {{__('Courier Made Easy')}}</h3>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12 bg-white-50 rounded">

                @if( session('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="post" action="{{__(route('courier.store'))}}" id="bookCourier" name="bookCourier"
                      class="shadow-md p-3 border-top border-info" data-aos="zoom-in">

                    <div class="d-flex justify-content-between row">
                        <div class="text-black-50  col-lg-3 col-md-4 col-sm-12">
                            <h4 class="playfair">  {{__('Complete your booking now')}} </h4>
                            <span class="text-sm text-capitalize">
                                <i class="lni lni-tag"></i>
                                {{__($data['delivery'].' delivery') }}</span>
                            <input type="hidden" name="delivery" value="{{__($data['delivery'])}}">
                        </div>
                        <div class="row col-lg-5 col-md-6 col-sm-12 text-black-50">
                            <p class="col-lg-5 col-md-5 col-sm-5">
                                @foreach($from as $from)
                                    <span class="p-0">{{__($from->name)}}</span><br/>
                                    <span class=" text-monospace text-sm"> {{__($from->address)}}</span>
                                    <input type="hidden" name="from" value="{{ __($from->id)}}">
                                @endforeach
                            </p>
                            <span class="px-2 col-lg-2 col-md-2 col-sm-2 ">
                                <i class="las la-boxes font-size-25"></i><br/>
                                <i class="las la-truck-loading font-size-25"></i><br/>
                                <i class="las la-people-carry font-size-25"></i><br/>
                            </span>
                            <span class="col-lg-5 col-md-4 col-sm-5">
                                @foreach($to as $to)
                                    <span class="p-0 ">{{ __($to->name)}}</span><br/>
                                    <span class="text-monospace text-sm"> {{__($to->address)}}</span>
                                    <input type="hidden" name="to" value="{{ __($to->id)}}">
                                @endforeach
                           </span>

                        </div>
                    </div>

                    @csrf

                    <hr/>
                    <div class="input-group-sm mb-3 row">


                        {{-- Receiver Part --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <span class="text-black-50">Receiver Info.</span>
                            <hr/>
                            <ul class="col-12 list-unstyled list group">

                                <li class="list-item input-group ">
                                       <span class="input-group-text bg-transparent border-0 text-black-50"
                                             id="receiverName">{{__('Name:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('receiverName') is-invalid @enderror"
                                           placeholder="Receiver Name" value="{{__(old('receiverName'))}}"
                                           aria-label="Receiver Email Address" aria-describedby="receiverName"
                                           name="receiverName">
                                    @error('receiverName')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="receiverEmail">{{__('Email:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('receiverEmail') is-invalid @enderror"
                                           placeholder="Receiver Email Address" value="{{__($data['receiver'])}}"
                                           aria-label="Receiver Email Address" aria-describedby="receiverEmail"
                                           name="receiverEmail">
                                    @error('receiverEmail')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="receiverPhone">{{__('Phone:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('receiverPhone') is-invalid @enderror"
                                           placeholder="Receiver Mobile " value="{{__(old('receiverPhone'))}}"
                                           aria-label="Receiver Mobile" aria-describedby="receiverPhone"
                                           name="receiverPhone">
                                    @error('receiverPhone')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="receiverAddress">{{__('Address:')}}</span>
                                    <textarea type="text"
                                              class="form-control bg-transparent b-b @error('receiverAddress') is-invalid @enderror"
                                              placeholder="Receiver Address" value="{{ __(old('receiverAddress')) }}"
                                              aria-label="ReceiverAddress" aria-describedby="receiverAddress"
                                              name="receiverAddress"></textarea>
                                    @error('receiverAddress')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                            </ul>
                        </div>


                        {{-- Sender Part --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <span class="text-black-50">Sender Info.</span>
                            <hr/>
                            <ul class="col-12 list-unstyled list group">

                                <li class="list-item input-group ">
                                       <span class="input-group-text bg-transparent border-0 text-black-50"
                                             id="senderName">{{__('Name:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('senderName') is-invalid @enderror"
                                           placeholder="Sender Name" aria-label="Sender Name"
                                           aria-describedby="senderName"
                                           value="@if(\Auth::user()){{__(\Auth::user()->name)}}@else{{__(old('senderName'))}}@endif"
                                           name="senderName">
                                    @error('senderName')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="senderEmail">{{__('Email:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('senderEmail') is-invalid @enderror"
                                           placeholder="Sender Email Address" aria-label="Sender Email Address"
                                           aria-describedby="receiverEmail"
                                           value="@if(\Auth::user()){{__(\Auth::user()->email)}}@else{{__(old('senderEmail'))}}@endif"
                                           name="senderEmail">
                                    @error('senderEmail')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="senderPhone">{{__('Phone:')}}</span>
                                    <input type="text"
                                           class="form-control bg-transparent b-b @error('senderPhone') is-invalid @enderror"
                                           placeholder="Sender Mobile " aria-label="Sender Mobile"
                                           aria-describedby="senderPhone"
                                           value="@if(\Auth::user()){{__(\Auth::user()->phone)}}@else{{__(old('senderPhone'))}}@endif"
                                           name="senderPhone">
                                    @error('senderPhone')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>

                                <li class="list-item input-group">
                                        <span class="input-group-text bg-transparent border-0 text-black-50"
                                              id="senderAddress">{{__('Address:')}}</span>
                                    <textarea type="text"
                                              class="form-control bg-transparent b-b @error('senderAddress') is-invalid @enderror"
                                              placeholder="Sender Address" aria-label="Sender Address"
                                              aria-describedby="senderAddress"
                                              value="@if(\Auth::user()){{__(\Auth::user()->address)}}@else{{__(old('senderAddress'))}}@endif"
                                              name="senderAddress"></textarea>
                                    @error('receiverAddress')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                            </ul>
                        </div>


                        {{-- Courier part--}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <span class="text-black-50">Parcel Details.</span>
                            <hr/>

                            <div class="row input-group">

                                <div class="col-lg-3 col-md-3 col-sm-4 mb-2">
                                    <select name="category" id="category"
                                            class="form-control bg-transparent b-b @error('category')is-invalid @enderror">
                                        <option value="" class="text-capitalize text-sm text-secondary">
                                            {{__('Select Category')}}
                                        </option>
                                        @foreach($category as $c)
                                            <option value="{{__($c->category)}}" class="text-capitalize text-sm">
                                                {{__($c->category)}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class=" col-lg-3 col-md-3 col-sm-4 mb-2">
                                    <div class="input-group">
                                        <input type="number" id="unit" min="1"
                                               class="form-control bg-transparent b-b @error('unit') is-invalid @enderror"
                                               placeholder="How Many Unit?" aria-label="Total Units"
                                               aria-describedby="unitLabel" value="{{__(old('unit'))}}"
                                               name="unit">
                                        <span class="input-group-text text-black-50 bg-transparent"
                                              id="unitLabel">{{__('Unit')}}</span>

                                        @error('unit')
                                        <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" col-lg-3 col-md-3 col-sm-4 mb-2">
                                    <div class="input-group">
                                        <input type="text" id="weight"
                                               class="form-control bg-transparent b-b @error('weight') is-invalid @enderror"
                                               placeholder="weight (default 1kg)" aria-label="Sender Address"
                                               aria-describedby="weightLabel" value="{{__(old('weight'))}}"
                                               name="weight">
                                        <span class="input-group-text text-black-50 bg-transparent"
                                              id="weigthLabel">{{__('Kg.')}}</span>

                                        @error('weight')
                                        <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" col-lg-3 col-md-3 col-sm-6 mb-2">
                                    <div class="input-group">
                                         <span class="input-group-text bg-transparent text-black-50"
                                               id="weigthLabel">{{__('Total:')}}</span>
                                        <input type="text" id="total"
                                               class="form-control bg-transparent b-b @error('total') is-invalid @enderror"
                                               placeholder="Total" aria-label="Total" aria-readonly="true" readonly
                                               aria-describedby="totalLabel" value="{{__(old('total'))}}"
                                               name="total">
                                        <span class="input-group-text text-black-50 bg-transparent"
                                              id="totalLabel">{{__('Tk.')}}</span>

                                        @error('total')
                                        <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-12 col-sm-12 mb-2">
                            <span class="input-group-text bg-transparent border-0 text-black-50"
                                  id="description">{{__('Description:')}}</span>
                            <textarea type="text"
                                      class="form-control bg-transparent b-b @error('description') is-invalid @enderror"
                                      placeholder="Courier Description" value="{{__(old('description')) }}"
                                      aria-label="Description" aria-describedby="description"
                                      name="description"></textarea>
                            @error('description')
                            <span class="invalid-feedback text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <button type="button" id="submit" class="btn btn-sm w-100 btn-outline-primary"><i
                                    class="lni lni-package"></i> {{__('Confirm Booking')}}</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        <div class=" d-flex justify-content-end mt-2">
            <img class="img img-fluid" data-aos="zoom-in-right" data-aos-duration="500"
                 src="{{__(asset('storage/assets/logoAsset-2.svg'))}}" width="25%"
                 alt="E-Courier"/>
        </div>
    </section>



    <script type="text/javascript">


        $('#category').change(function () {
            total()
        })
        $('#weight').keyup(function () {
            total()
        })
        $('#submit').click(function () {

            Swal.fire({
                title: 'Is all the information Correct?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#4c99e2',
                cancelButtonColor: '#e26f6f',
                confirmButtonText: 'Yes, Do this!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('submit').type = 'submit';
                    document.getElementById('submit').click();
                }
            })

        })

        // function errorAlert(msg)
        // {
        //     Swal.fire({
        //         title: 'Error',
        //         text: msg,
        //         showCancelButton: true,
        //         confirmButtonColor: '#4c99e2',
        //         cancelButtonColor: '#e26f6f',
        //         confirmButtonText: 'Yes, Do this!',
        //         cancelButtonText: 'No'
        //     })
        // }


        function total() {
            var delivery = "{{ $data['delivery'] }}";
            var token = $("input[name=_token]").val();
            var weight = document.getElementById('weight').value;
            if (weight === "" || weight < 1) {
                weight = 1
            }
            var cat = document.getElementById('category').value;
            if (cat !== "") {
                $.ajax({
                    url: '{{__(route('getDeliveryCategory') )}}',
                    type: "GET",
                    data: {
                        _token: token,
                        delivery: delivery,
                        category: cat,
                    },
                    success: function (response) {
                        document.getElementById('total').value = (response * weight).toFixed(2);
                    }
                })
            }
        }
    </script>


@endsection


