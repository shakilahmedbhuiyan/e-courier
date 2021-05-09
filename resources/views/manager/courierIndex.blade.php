@extends('layouts.dash')

@section('content')
    <div class="main-content">

        <div class="container-fluid">
            <!-- Breadcrumb Start -->
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Courier Index</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('manager'))}}">Home</a></li>
                        <li class="active">/ Couriers</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2">

                @if( session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{__(session('success')) }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div id="alert" class="alert  fade" role="alert">
                    <span id="msg"> </span>
                    <button type="button" class="close" onclick="hideAlert()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="las la-boxes"></i> All Courier List</span>
                    <a href="#" class="btn btn-outline-primary"><i
                            class="las la-plus"></i> {{__('Add Courier')}}</a>

                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table table-striped table-responsive w-100" id="allCouriers">
                        <thead>
                        <th>Courier</th>
                        <th>Shipping Branch</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Destination Branch</th>
                        <th> </th>
                        </thead>
                        <tbody>
                        @foreach($courier as $c)
                            <tr class="my-0 py-0" id="c{{__($c->id)}}">
                                <td>
                                    {{__($c->tracking_code)}}
                                    <p>
                                        <span class="text-sm text-capitalize">
                                            {{__($c->status)}} | {{__($c->payment->amount.' '.$c->payment->currency)}} | {{__($c->delivery)}} <br/>
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
                                    {{__($c->sender->name)}}
                                    <p class="text-justify text-muted text-sm">
                                        <small>
                                            {{__($c->sender->address)}} <br/>
                                            {{__($c->sender->email)}} <br/> {{__($c->sender->phone)}}
                                        </small>
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
                                    <p class="text-justify text-sm"> <small>{{__($c->to->address)}}</small></p>
                                </td>

                               <td>
                                   @if($c->to->id === Auth::user()->branch_id && $c->status === 'in transit')
                                       @csrf
                                       <button type="button" id="btn" onclick="readyForDelivery({{ __($c->id)}})"
                                               class="btn btn-outline-primary" >Ready For Delivery</button>
                                   @endif
                               </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>

    <script type="text/javascript" src="{{ asset('js/jQuery-v3.5.1.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#allCouriers').DataTable();
            $('#alert').hide();
        });

        function readyForDelivery(id) {
            $('#btn').attr('disabled','disabled');
            var token = $("input[name=_token]").val()
            var link ='{{__(route('manager.couriers.ready',['']))}}'+'/'+id
            console.log(link)
            $.ajax({
                url: link,
                method:'post',
                data:{_token:token},
                success:function(response){
                    console.log(response['message']);
                    $('#alert').show()
                    $('#alert').addClass('show alert-success')
                    $('#msg').html(response['message']);
                    $('#btn').removeAttr('disabled');
                    $('#c'+id).remove()
                    $('#alert').delay(5000).queue(function() {
                        $(this).remove();
                    });
                },
                error:function(response)
                {
                    console.log(response['message']);
                    $('#alert').show()
                    $('#alert').addClass('show alert-warning')
                    $('#msg').html(response['message']);
                    $('#btn').removeAttr('disabled');

                }
            })
        }
    </script>


@endsection
