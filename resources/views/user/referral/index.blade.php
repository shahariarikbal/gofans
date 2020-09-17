@extends('user.layout')

@section('title')
    Referrals
@endsection

@section('page_title')
    Referrals Users
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Referrals</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">My Referral Users</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('user.dashboard') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="ti-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data))
                            @foreach($data as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile_number }}</td>
                                    <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                    <td>
                                        @if($user->status == 1)
                                            <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm" type="button">
                                                <i class="ti-check mr-1"></i> Active
                                            </button>
                                        @else
                                            <button class="btn btn btn-rounded btn-outline-danger mr-2 btn-sm" type="button">
                                                <i class="ti-close mr-1"></i> Inactive
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-success btn-circle"><i class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_js')

@endsection
