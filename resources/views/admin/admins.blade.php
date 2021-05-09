@extends('layouts.dash')
@section('content')


    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Admin Index</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li class="active">/ Admins</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        {{--        {{ dd(\Request::segment(1)) }}--}}
        <div class="container-fluid">
            <div class="card pt-4 px-2">
                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-users"></i> All Admin List</span>
                    <a href="#" class="btn btn-outline-primary"><i class="fas fa-user-plus"></i> {{__('Add Admin')}}</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach(\App\Admin::all() as $admins)
                            <tr>
                                <td>{{__($admins->id)}}</td>
                                <td>{{__($admins->name)}}</td>
                                <td>
                                    <p class="row">
                                        <span class="col-md-6 col-sm-9">{{__($admins->email)}}</span>
                                        <span class="col-md-6 col-sm-8">{{__($admins->phone)}}</span>
                                    </p>
                                </td>
                                <td>{{__($admins->address)}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#{{__($admins->id)}}" class="btn btn-outline-primary">
                                            <i class="lni lni-pencil-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection

