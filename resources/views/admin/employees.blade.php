@extends('layouts.dash')
@section('content')


    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Employees Index</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li class="active">/ Employees</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        {{--        {{ dd(\Request::segment(1)) }}--}}
        <div class="container-fluid">
            <div class="card pt-4 px-2">
                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-users"></i> All Employees List</span>
                    <a href="{{__(route('employees.create'))}}" class="btn btn-outline-primary"><i
                            class="fas fa-user-plus"></i> {{__('Add Employee')}}</a>
                </div>
                <div class="card-body" style="overflow-x:scroll">
                    <table id="employees" class="table table-striped table-bordered w-100">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Branch</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @if(!empty($emp) && $emp->count())
                            @foreach( $emp as $data)
                                <tr>
                                    <td>{{__($data->id)}}</td>
                                    <td>{{__($data->name)}}</td>
                                    <td>
                                        <p class="row">
                                            <span class="col-md-6 col-sm-9"><i class="las la-envelope"></i>{{__($data->email)}}</span>
                                            <span class="col-md-6 col-sm-8"><i class="las la-phone"></i>{{__($data->phone)}}</span>
                                            <span class="col-12"><i class="las la-map-marker"></i>{{__($data->address)}}</span>
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
                                            <a href="#{{__($data->id)}}" class="btn btn-outline-primary">
                                                <i class="lni lni-pencil-alt"></i></a>
                                            <a href="{{__(route('manager.create',['id'=>$data->id]))}}" class="btn btn-outline-primary">
                                                <i class="las la-user-lock"></i>
                                            </a>
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
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#employees').DataTable();
                        });
                    </script>

                </div>
            </div>
        </div>


    </div>

@endsection

