@extends('layouts.dash')
@section('content')


    <div class="main-content">
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                    <h4 class="page-title">Branch Index</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li><a href="{{__(route('admin'))}}">Home</a></li>
                        <li class="active">/ Branches</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <div class="container-fluid">
            <div class="card pt-4 px-2">
                <div class="card-title px-3 d-flex justify-content-between">
                    <span><i class="lni lni-money-location "></i> All Branch List</span>
                </div>
                <div class="card-body">

                    @if( session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{__(session('success')) }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        </thead>
                        <tbody>
                        @foreach( $branches  as $branch)
                            <tr>
                                <td>{{__($branch->id)}}</td>
                                <td>
                                    {{__($branch->name)}}
                                    <p> {{__($branch->address)}}</p>
                                </td>

                                <td>
                                    <p>{{__($branch->email)}}</p>
                                    <p>{{__($branch->phone)}}</p>
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

