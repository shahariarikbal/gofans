@extends('user.layout')

@section('title')
    Withdraw History
@endsection

@section('page_title')
    Withdraw History
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Withdraw History</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">My Withdraw History</h3>
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
                            <th>Withdraw Coin</th>
                            <th>Withdraw Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data))
                            @foreach($data as $withdraw)
                            <tr>
                                <td>{{ $withdraw->withdraw_point }}</td>
                                <td>$ {{ $withdraw->withdraw_amount }}</td>
                                <td>{{ $withdraw->payment_method }}</td>
                                <td>{{ $withdraw->payment_id }}</td>
                                <td>
                                    @if($withdraw->status == 0)
                                        <button class="btn btn btn-rounded btn-outline-warning mr-2 btn-sm" type="button">
                                            <i class="ti-info mr-1"></i> Pending
                                        </button>
                                    @elseif($withdraw->status == 1)
                                        <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm" type="button">
                                            <i class="ti-check mr-1"></i> Success
                                        </button>
                                    @else
                                        <button class="btn btn btn-rounded btn-outline-danger mr-2 btn-sm" type="button">
                                            <i class="ti-close mr-1"></i> Rejected
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
