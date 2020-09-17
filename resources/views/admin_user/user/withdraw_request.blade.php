@extends('admin_user.layout')

@section('title')
    User | Withdraw Request
@endsection

@section('page_title')
    User Withdraw Request
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Withdraw Request</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">User Withdraw Request</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('AdminUser.dashboard') }}">
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
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Users</th>
                                    <th>Withdraw Amount</th>
                                    <th>Requested At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 10; $i++)
                                    <tr>
                                        <td>
                                            <strong>Rash Ron</strong>
                                            <h6>Ron@gmail.com</h6>
                                        </td>
                                        <td>$ 232</td>
                                        <td>02-02-2020</td>
                                        <td>
                                            <button class="btn btn btn-rounded btn-outline-warning mr-2 btn-sm" type="button">
                                                <i class="ti-info mr-1"></i> Pending
                                            </button>
                                        </td>
                                        <td>
                                            <a href="#" type="button" title="View" class="btn btn-success btn-circle"><i class="fa fa-eye"></i> </a>
                                            <a href="#" type="button" title="Accept" class="btn btn-info btn-circle"><i class="fa fa-link"></i> </a>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')

@endsection
