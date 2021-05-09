@extends('layouts.user')

@section('section1')

    <section class="container">
        <div class="playfair mt-5">
            <h1 class="text-white font-weight-bold text-uppercase playfair"> {{__(config('app.name'))}}</h1>
            <h3 class="text-white-50"> {{__('Courier Made Easy')}}</h3>
        </div>

        <div class="card d-flex justify-content-center bg-white-50 b-b shadow-md my-5 rounded">

            <div class="py-3 text-center ">
                <h4 class="text-black-50 playfair"> Courier Track Result</h4>
                <small class="text-muted">#{{ __($courier->tracking_code)}}</small>
            </div>
            <div class="d-flex justify-content-around">

                <div class="row col-lg-12 col-md-12 col-sm-12 px-4 text-center">
                    <span class="col-lg-5 col-md-5 col-sm-5 text-black-50 ">
                        <span class="p-0 ">{{__($courier->from->name)}}</span><br/>
                        <span class="text-monospace text-sm"> {{__($courier->from->address)}}</span>
                    </span>
                    <span class="px-2 col-lg-2 col-md-2 col-sm-2 py-2 text-black-50 ">
                        <i class="las la-boxes font-size-25 "></i>
                        <i class="las la-truck-loading font-size-25 "></i>
                        <i class="las la-people-carry font-size-25 "></i>
                    </span>
                    <span class="col-lg-5 col-md-4 col-sm-5 text-black-50 ">
                        <span class="p-0">{{ __($courier->to->name)}}</span><br/>
                        <span class=" text-monospace text-sm"> {{__($courier->to->address)}}</span>
                    </span>
                </div>

            </div>
            <hr/>

            <div class="w-100 container pb-5">
                <div class="d-flex justify-content-center">
                    <table class="table table-responsive table-striped text-center">
                        <tr>
                            <td>
                                Sender: {{__($courier->sender->name)}}<br/>
                                <i class="lni lni-phone"></i><small> {{__($courier->sender->phone)}}</small> <br/>
                                <i class="lni lni-envelope"></i> {{__($courier->sender->email)}}
                            </td>
                            <td>
                                Receiver: {{__($courier->receiver->name)}}<br/>
                                <i class="lni lni-phone"></i><small> {{__($courier->receiver->phone)}}</small> <br/>
                                <i class="lni lni-envelope"></i> {{__($courier->receiver->email)}}
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Booking Date: {{__(date('l, M d Y, H:i:s a',$courier->creatred_at))}}<br/>
                                Payment: {{__($courier->payment->status)}}
                            </td>
                            <td>
                                Description: {{__($courier->descriotion)}}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="w-100 card bg-light py-2">
                    <div class="d-flex justify-content-center">
                        @if( $courier->status ==='pending')
                            <span class="text-primary text-center"><i class="las la-boxes font-size-50"></i><br/>Pending</span>
                        @else
                            <span class="text-success text-center">
                                <i class="las la-boxes font-size-50"></i><br/>Booked</span>
                        @endif

                        @if( $courier->status ==='canceled')

                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span class="text-danger text-center">
                                <i class="lni lni-cross-circle text-danger font-size-50"></i><br/>Canceled</span>

                        @else

                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span
                                class="text-center @if( $courier->status === 'processing')text-primary b-b border-primary @elseif($courier->status==='picked'|| $courier->status==='in transit'|| $courier->status ==='ready for delivery') text-success @else text-black-50 @endif">
                                <i class="lni lni-cog font-size-50"></i>
                                <br/>Processing
                            </span>

                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span
                                class="text-center @if( $courier->status === 'picked')text-primary b-b border-primary @elseif( $courier->status==='in transit'||$courier->status==='ready for delivery')text-success @else text-black-50 @endif">
                                <i class="lni lni-protection font-size-50"></i>
                                <br/>Picked
                            </span>
                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span
                                class="text-center @if( $courier->status === 'in transit')text-primary b-b border-primary @elseif( $courier->status==='ready for delivery'|| $courier->status==='delivered')text-success @else text-black-50 @endif">
                                <i class="las la-truck-loading font-size-50"></i>
                                <br/>In Transit
                            </span>
                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span
                                class="text-center @if( $courier->status === 'ready for delivery')text-primary b-b border-primary @elseif( $courier->status === 'delivered') text-success @else text-black-50 @endif">
                                <i class="las la-people-carry font-size-50"></i>
                                <br/><small>Ready For Delivery</small>
                            </span>
                            <i class="lni lni-arrow-right text-black-50 font-size-25 my-3"></i>
                            <span
                                class="text-center @if( $courier->status === 'delivered')text-success @else text-black-50 @endif">
                                <i class="lni lni-checkmark-circle font-size-50"></i>
                                <br/>Delivered
                            </span>

                        @endif
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
