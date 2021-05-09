@extends('layouts.dash')
@section('content')

    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Add New Manager</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li><a href="">/ Employee</a></li>
                        <li class="active">/ Add employee</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2 shadow-sm">

                <div class="card-title px-3 d-flex justify-content-between">
                    <span> <i class="fas fa-user-tie"></i> Enter Employee Information </span>
                </div>

                <div class="card-body">
                    <form class="form-sample" method="post" action="{{ __(route('employee.store')) }}">
                        @csrf
                        <div class="row d-flex justify-content-center">

                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-sm-5 col-form-label text-right">
                                        Name:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input type="text" name="name" id="name"
                                               placeholder="Enter Employee Full Name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               required value="{{ __(old('name')) }}">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="branch" class="col-lg-3 col-sm-5 col-form-label text-right">
                                        Branch:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <select id="branch" class="form-control @error('branch') is-invalid @enderror"
                                                name="branch">
                                            <option value="" class="text-monospace">Select Branch</option>
                                            @foreach( $branches as $branch)
                                                <option value="{{ $branch['id'] }}"> {{ __($branch['name']) }}</option>
                                            @endforeach
                                        </select>
                                        @error('branch')
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
                                            Phone:</label>
                                        <div class="col-lg-8 col-sm-12" style="padding-right: 0;">
                                            <input type="text" name="phone" id="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   placeholder="Employee Phone Number"
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
                                            <input type="text" name="email" id="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="Employee Contact Email" required=""
                                                   value="{{ __(old('email')) }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="address" class="col-lg-3 col-sm-5 col-form-label text-right">
                                        Address:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input type="text" name="address" id="address"
                                               placeholder="Permanent address of the employee"
                                               class="form-control @error('address') is-invalid @enderror"
                                               required value="{{ __(old('address')) }}">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 d-flex justify-content-center">
                                <button type="submit" class="btn w-100 btn-outline-primary">
                                    {{ __('Register Employee') }}
                                </button>
                            </div>

                            @if ( session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if( session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif


                        </div>
                    </form>


                </div>
            </div>
        </div>


    </div>

@endsection

