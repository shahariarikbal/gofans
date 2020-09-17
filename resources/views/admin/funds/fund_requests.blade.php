@extends('admin.layout')

@section('title')
    Admin | Funds Requests
@endsection

@section('page_title')
    Funds Requests
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page">Funds</li>
    <li class="breadcrumb-item active" aria-current="page">Fund Requests</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Fund Requests</h3>
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
                             @include('client.billing._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
