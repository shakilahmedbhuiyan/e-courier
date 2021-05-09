@extends('layouts.dash')
@section('content')


    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Managers Index</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li class="active">/ Managers</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2">
                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-users"></i> All Managers List</span>
                </div>


                <div class="card-body" style="overflow-x:scroll">

                    @if( session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{__(session('success')) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div id="alert" class="alert alert-success fade" role="alert">
                        <span id="msg"> </span>
                        <button type="button" class="close" onclick="hideAlert()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <table id="managers" class="table table-condensed table-overflow w-100">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Branch</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @if(!empty($managers) && $managers->count())
                            @foreach( $managers as $data)
                                <tr id="m{{__($data->id)}}">
                                    <td>{{__($data->employee->id)}}</td>
                                    <td>{{__($data->employee->name)}}</td>
                                    <td>
                                        <p class="row">
                                            <span class="col-md-6 col-sm-9"><i class="las la-envelope"></i>{{__($data->employee->email)}}</span>
                                            <span class="col-md-6 col-sm-8"><i class="las la-phone"></i>{{__($data->employee->phone)}}</span>
                                            <span class="col-12"><i class="las la-map-marker"></i>{{__($data->employee->address)}}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="row">
                                            <span class="col-12">{{__($data->branch->name)}}</span>
                                            <span class="col-12"><i class="las la-map-marker"></i>{{__($data->branch->address)}}</span>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="submit" onclick="managerDelete( {{ __($data->id) }})"
                                                    class="btn btn-outline-primary">
                                                <i class="las la-user-slash"></i>
                                            </button>
                                            @csrf

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <span class="text-danger">{{__('There are no data available right now!')}}</span>
                            </tr>
                        @endif
                        </tbody>
                    </table>


                    <script type="text/javascript" src="{{ asset('js/jQuery-v3.5.1.js') }}"></script>
                    <script>
                        $(document).ready(function () {
                            $('#managers').DataTable();
                            $('#alert').hide();
                        });

                        function managerDelete(id) {

                            if (confirm('Are you sure you want to delete?')) {
                                var token = $("input[name=_token]").val()
                                var url = "{{ __(route('manager.delete',['id'=>$data->id])) }}"
                                $.ajax({
                                    url: url,
                                    type: "DELETE",
                                    data: {
                                        _token: token,
                                    },
                                    success: function (response) {
                                        $('#alert').show()
                                        $('#alert').addClass('show')
                                        $('#msg').html(response['message']);
                                        $('#m' + id).remove()
                                    }
                                })
                            }
                        }


                        function hideAlert(){ $('#alert').hide() }
                    </script>

                </div>
            </div>
        </div>


    </div>

@endsection

