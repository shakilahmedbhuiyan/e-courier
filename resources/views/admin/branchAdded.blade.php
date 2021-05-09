@extends('layouts.dash')
@section('content')

    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">New Branch Added</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li><a href="{{__(route('branches.index'))}}">/ Branches</a></li>
                        <li class="active">/ Branch Info</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2 shadow-sm">

                @if ( session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-money-location "></i> New Branch Details</span>
                </div>

                <div class="card-body row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <table class="table table-striped">

                            <tbody>
                            @foreach( $branch as $branch)
                                <tr>
                                    <td>Branch Name:</td>
                                    <td>{{ __($branch['name']) }}</td>
                                </tr>
                                <tr>
                                    <td>Branch Address:</td>
                                    <td>{{ __($branch['address']) }}</td>
                                </tr>
                                <tr>
                                    <td>Branch Contact:</td>
                                    <td>
                                        <p class="text-monospace">{{ __($branch['phone']) }}</p>
                                        <p class="text-monospace">{{ __($branch['email']) }}</p>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h4 class="text-center card-title"><i class="lni lni-circle-plus"></i> Assign Manager</h4>

                        <form method="post" class="form-horizontal custom-control"
                              action="{{ route('branch.addManager')}}">
                            @csrf
                            <input type="hidden" name="branch" value="{{ $branch['id'] }}">
                            <div class="d-flex justify-content-between">
                                <div class="form-group w-75">
                                    <select class="form-select selectpicker" id="manager" name="manager" required>
                                        <option class="selected text-monospace">Select Manager</option>
                                        @foreach( $emp as $emp)
                                            <option value="{{ $emp->id }}">
                                                {{ __($emp->name) }} &nbsp;
                                                <sub class="text-monospace"> {{__($emp->email)}}</sub>
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <button type="submit" class="btn btn-circle btn-lg btn-inverse-success">
                                    <i class="lni lni-checkmark text-lg-center">
                                    </i>
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="d-flex justify-content-end w-100 offset-2">
                        <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary">
                            <i class="lni lni-shift-right"></i> {{__('Skip')}}
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{ asset('js/jQuery-v3.5.1.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#manager').select2();
        });
    </script>

@endsection
