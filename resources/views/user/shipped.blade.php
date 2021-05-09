
<div class="card-body" style="overflow-x:scroll">
    <table class="table table-striped w-100" id="shipped">
        <thead>
        <th>Courier</th>
        <th>Shipping Branch</th>
        <th>To</th>
        <th>Destination Branch</th>
        </thead>
        <tbody>
            @foreach($shipped as $c)
                <tr class="my-0 py-0" id="c{{__($c->id)}}">
                    <td>
                        {{__($c->tracking_code)}}
                        <p>
                                        <span class="text-sm text-capitalize">
                                            {{__($c->status)}} | {{__($c->payment->amount.' '.$c->payment->currency)}} |
                                            {{__($c->delivery)}}
                                            <br/>
                                            <i class="text-muted">
                                                @if($c->created_at != null)
                                                    {{__($c->created_at->diffForHumans(now()))}}
                                                @endif
                                            </i>
                                        </span>
                        </p>
                    </td>
                    <td>
                        {{__($c->from->name)}}
                        <p class="text-justify">
                            <small>{{__($c->from->address)}}</small>
                        </p>
                    </td>
                    <td>
                        {{__($c->receiver->name)}}
                        <p class="text-justify text-muted text-sm">
                            <small>
                                {{__($c->receiver->address)}} <br/>
                                {{__($c->receiver->email)}} <br/> {{__($c->receiver->phone)}}
                            </small>
                        </p>
                    </td>
                    <td>
                        {{__($c->to->name)}}
                        <p class="text-justify text-sm"><small>{{__($c->to->address)}}</small></p>
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>
</div>






