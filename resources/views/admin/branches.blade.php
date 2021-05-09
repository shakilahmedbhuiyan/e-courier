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
                    <a href="{{ route('branch.create')  }}" class="btn btn-outline-primary"><i
                            class="lni lni-anchor"></i></i> {{__('Add Branch')}}</a>
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
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach( $data  as $branch)
                            <tr>
                                <td>{{__($branch->id)}}</td>
                                <td>
                                    <a href="{{ route('branch.info',['id'=>$branch->id]) }}">
                                        {{__($branch->name)}}
                                    </a>
                                    <p> {{__($branch->address)}}</p>
                                </td>
                                <td>
                                    <p>{{__($branch->email)}}</p>
                                    <p>{{__($branch->phone)}}</p>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#{{__($branch->id)}}" class="btn btn-outline-primary">
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

