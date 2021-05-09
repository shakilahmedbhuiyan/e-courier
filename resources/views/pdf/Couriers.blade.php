@extends('layouts.pdf')
@section('title') {{__($status)}} Courier List @endsection

@section('content')
    <table class="table table-bordered border-dark text-justify">
        <thead>
        <th>Courier</th>
        <th>Shipping Branch</th>
        <th>From</th>
        <th>To</th>
        <th>Destination Branch</th>
        </thead>

        <tbody>
        @if($couriers !=null && $couriers->count())
            @foreach($couriers as $c)
        @section('branch')
            {{__($c->from->name)}} <sup>({{__($c->from->id)}})</sup>
            <span class="text-muted">{{__($c->from->address)}}</span>
        @endsection
        <tr class="my-0 py-0" id="c{{__($c->id)}}">
            <td>
                {{__($c->tracking_code)}}
                <p><span class="text-sm text-capitalize text-sm">
                                {{__($c->status)}} | {{__($c->payment->amount.' '.$c->payment->currency)}} | {{__($c->delivery)}} <br/>
                                <i class="text-muted">
                                    @if($c->created_at != null)
                                        {{__(date('M d Y, h:i:s a',strtotime($c->created_at)))}}
                                    @endif </i></span>
                </p>
            </td>
            <td>
                {{__($c->from->name)}}
                <p class="text-justify">
                    <small>{{__($c->from->address)}}</small>
                </p>
            </td>
            <td>
                {{__($c->sender->name)}}
                <p class="text-justify">
                    <small>
                        {{__($c->sender->address)}} <br/>
                        {{__($c->sender->email)}} <br/> {{__($c->sender->phone)}}
                    </small>
                </p>
            </td>
            <td>
                {{__($c->receiver->name)}}
                <p class="text-justify ">
                    <small>
                        {{__($c->receiver->address)}} <br/>
                        {{__($c->receiver->email)}} <br/> {{__($c->receiver->phone)}}
                    </small>
                </p>
            </td>
            <td>
                {{__($c->to->name)}}
                <p class="text-justify"><small>{{__($c->to->address)}}</small></p>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>


    </table>



@endsection

