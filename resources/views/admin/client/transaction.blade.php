@extends('admin.layout')

@section('title')
    Admin | Client Transactions
@endsection

@section('page_title')
    Clients
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.clientList') }}">Clients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Client Transactions</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">

                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="goTable table table-striped border">
                                <thead>
                                <tr>
                                    <th>#S.No</th>
                                    <th>Client Info</th>
                                    <th>Transaction Type</th>
                                    <th>Campaign Info</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        Rash Ron<br>
                                        ron@gmail.com
                                    </td>
                                    <td>Test</td>
                                    <td>This is test static data</td>
                                    <td class="text-center">{{ now() }}</td>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        Mr. Rash<br>
                                        Rash@gmail.com
                                    </td>
                                    <td>Test Rash</td>
                                    <td>This is test static data</td>
                                    <td class="text-center">{{ now() }}</td>
                                    <td>--</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
