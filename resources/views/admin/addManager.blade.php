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
                        <li><a href="">/ Manager</a></li>
                        <li class="active">/ Add Manager</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2 shadow-sm">

                <div class="card-title px-3 d-flex justify-content-between">
                    <span> <i class="las la-user-lock"></i> Promote employee to Manager </span>
                </div>
                @foreach( $emp as $e)
                <div class="card-body">
                    <form class="form-sample" method="post" action="{{ route('manager.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="@error('id') is-invalid @enderror">Employee Info:</h5>
                                @error('id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                @enderror
                                <table class="table table-striped">

                                        <tr>
                                            <td>Name:</td>
                                            <td>{{__($e->name)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact:</td>
                                            <td>
                                                <p>{{__($e->email)}}</p>
                                                <p>{{__($e->phone)}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Current Branch</td>
                                            <td>
                                                <p> {{__($e->branch->name)}}</p>
                                                <p> {{__($e->branch->address)}}</p>
                                            </td>
                                        </tr>
                                    <input type="hidden" name="id" value="{{__($e->id)}}"/>
                                    @endforeach
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-12">

                                <div class="w-100 form-group row">
                                    <label for="branch" class="col-lg-3 col-sm-5 col-form-label">
                                        Branch:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <select class="custom-select @error('branch') is-invalid @enderror " name="branch">
                                            <option value="" class="selected text-monospace">Select Branch</option>

                                            @foreach( $branches as $branch)
                                                <option value="{{ $branch['id'] }}">
                                                    {{ __($branch['name'].',')}}
                                                    <div class="text-monospace">{{ __($branch['address']) }}</div>
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('branch')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-100 form-group row">
                                    <label for="date" class="col-lg-3 col-sm-5 col-form-label ">
                                        Join Date:</label>
                                    <div class="col-lg-9 col-sm-12">
                                        <input type="date" name="date" id="date" min="{{today()}}"
                                               class="form-control @error('date') is-invalid @enderror"
                                        placeholder="Select Date" required/>

                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn w-100 btn-outline-primary">
                                        <i class="las la-check-double"></i>
                                        {{ __('Confirm') }}
                                    </button>
                                    @if ( session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection
