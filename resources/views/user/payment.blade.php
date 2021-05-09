@extends('layouts.user')

@section('section1')

    <section class=" container">
        <div class="playfair  mt-5">
            <h1 class="text-primary font-weight-bold text-uppercase playfair"> {{__(config('app.name'))}}</h1>
            <h3 class="text-secondary"> {{__('Courier Made Easy')}}</h3>
        </div>


        <form method="POST" action="{{__(route('payment'))}}" class="needs-validation mt-2">
            @method('post')
            @csrf
            <div class="d-flex justify-content-between row">

                <div class="col-md-4 order-md-2 mb-4 card bg-transparent border-0 shadow-md ">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Payment Info</span>
                    </h4>

                    <ul class="list-group mb-3">

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Courier
                                    <sup class="text-muted">({{__(is_null($request->unit)?1:$request->unit)}})</sup>
                                </h6>
                                <small class="text-muted text-sm"> {{__('Tracking ID:')}}</small>
                            </div>
                            <span class="text-primary ">#{{__($tracking_code)}}</span>
                            <input type="hidden" name="product_name" value="{{__($tracking_code)}}">
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Transaction ID:</h6>
                            </div>
                            <span class="text-primary ">#{{__($transaction_id)}}</span>
                            <input type="hidden" name="tran_id" value="{{__($transaction_id)}}">
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Total:</h6>
                            </div>
                            <span class="">
                                <i class="las la-coins"></i>
                                {{__($request->total)}}
                                <i class="font-italic text-muted text-sm">tk.</i>
                            </span>
                            <input type="hidden" name="total" value="{{$request->total}}">
                        </li>

                    </ul>
                    <div class="my-2 pb-2">
                        <button type="submit" class="btn btn-outline-primary w-100">
                            <i class="lni lni-money-protection"></i> {{__('Pay Now')}}
                        </button>
                    </div>
                </div>
                <div class="col-md-7 order-md-1 my-2 pt-2 bg-transparent border-0 shadow-md row ">

                    <h4 class="mb-3">Billing Info</h4>
                    <hr class="text-primary"/>
                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <p>Sender: {{__($request->senderName)}}
                            <span class="text-muted text-sm">
                                {{__($request->senderPhone)}},
                                {{__($request->senderEmail)}},
                                {{__($request->senderAddress)}}
                            </span>

                        </p>
                        <input type="hidden" name="cus_id" value="{{$sender}}">
                        <input type="hidden" name="cus_name" value="{{$request->senderName}}">
                        <input type="hidden" name="cus_phone" value="{{$request->senderName}}">
                        <input type="hidden" name="cus_email" value="{{$request->senderEmail}}">
                        <input type="hidden" name="cus_add1" value="{{$request->senderAddress}}">
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <p> Receiver: {{$request->receiverName}}
                            <span class="text-muted text-sm">
                            {{__($request->receiverPhone)}},
                            {{__($request->receiverEmail)}},
                            {{__($request->receiverAddress)}}
                        </span>
                            <input type="hidden" name="receiver" value="{{$receiver}}">
                            <input type="hidden" name="shipping_address" value="{{__($request->receiverAddress)}}">
                        </p>
                    </div>
                    <div class="col-lg-12 py-2 mb-3 row">
                        <h6 class="text-muted">Parcel:</h6>
                        <hr/>
                        <span class="col-auto text-capitalize">Unit: {{__(is_null($request->unit)?1:$request->unit)}}</span>
                        <span class="col-auto text-capitalize">Category: {{__($request->category)}}</span>
                        <span class="col-auto text-capitalize">Weight: {{__(is_null($request->weight)?1:$request->weight)}} kg.</span>
                        <span class="col-auto text-capitalize">Delivery: {{__($request->delivery)}}
                    </div>

                    <input type="hidden" name="shipping_method" value="{{__($request->delivery)}}">
                    <input type="hidden" name="product_category" value="{{__($request->category)}}">
                    <input type="hidden" name="weight" value="{{__($request->weight?1:$request->weight)}}">
                    <input type="hidden" name="unit" value="{{__($request->unit?1:$request->unit)}}">
                    <input type="hidden" name="description" value="{{__($request->description)}}">
                    <input type="hidden" name="from" value="{{$request->from}}">
                    <input type="hidden" name="to" value="{{$request->to}}">

                </div>


            </div>
        </form>


    </section>


@endsection

