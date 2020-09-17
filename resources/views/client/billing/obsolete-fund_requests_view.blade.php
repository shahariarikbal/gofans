@extends('client.layout')

@section('title')
    Billing | Fund Request
@endsection

@section('page_title')
    Fund Request
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Fund Request</li>
@endsection

@section('content')
    <div class="page-content container-fluid" id='fund-request'>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Fund Request</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('client.dashboard') }}">
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
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-gradient-success text-white d-flex justify-content-between">
                            <h4 class="card-title"><i class="fa fa-money-bill-alt"></i> Fund Requests Lists</h4>
                        <a href="{{route('client.new_fund_request')}}" class="btn btn-primary pull-right">Make New Request</a>
                        </div>
                        <div class="card-body">
                              @include('client.billing._table')
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('page_css')

@endsection

@section('page_js')

@endsection
