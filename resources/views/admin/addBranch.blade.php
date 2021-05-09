@extends('layouts.dash')
@section('content')


    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Add New Branch</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li><a href="{{__(route('branches.index'))}}">/ Branches</a></li>
                        <li class="active">/ Add Branch</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2 shadow-sm">

                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-money-location "></i> New Branch Details</span>
                </div>

                <div class="card-body">
                    <form class="form-sample" method="post" action="{{ route('branch.store') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">

                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-sm-5 col-form-label text-right">
                                        Branch Name:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Enter Branch Name" required=""
                                               value="{{ __(old('name'))}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="address" class="col-lg-3 col-sm-5 col-form-label text-right">
                                        Branch Address:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input type="text" name="address"
                                               class="form-control @error('address') is-invalid @enderror"
                                               placeholder="Enter Branch Address" required=""
                                               value="{{ __(old('address'))}}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 row"
                                 style="padding-right: 0;margin-right: 5px;">

                                <div class="col-lg-6 col-md-12 col-sm-12 ">
                                    <div class="row form-group">
                                        <label for="phone" class="col-lg-4 col-sm-5 col-form-label text-right ">
                                            Branch Phone:</label>
                                        <div class="col-lg-8 col-sm-12" style="padding-right: 0;">
                                            <input type="text" name="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   placeholder="Enter Branch Phone Number"
                                                   required="" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 " style="padding-right: 0;">
                                    <div class="row form-group">
                                        <label for="email" class="col-lg-4 col-sm-5 col-form-label text-right">
                                            Branch Email:</label>
                                        <div class="col-lg-8 col-sm-12">
                                            <input type="text" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="Enter Branch Email" required="" value="">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 d-flex justify-content-center">
                                <button type="submit" class="btn w-100 btn-outline-primary">
                                    {{ __('Add Branch') }}
                                </button>
                                @if ( session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

