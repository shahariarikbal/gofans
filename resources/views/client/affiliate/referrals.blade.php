@extends('client.layout')

@section('title')
    Affiliate Program | Referrals
@endsection

@section('page_title')
    Referrals
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Referrals</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <label class="form-inline"><h3 class="font-light">Referrals </h3><span class="ml-1"> see a list of all referral statuses</span></label>
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
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="goTable table table-bordered table-hover">
                                <thead class="bg-gradient-light text-center">
                                <tr>
                                    <td>Title</td>
                                    <td>Amount</td>
                                    <td>Issue Date</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <form>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td>
                                            <input type="text" class="form-control">
                                            <input type="text" class="form-control">
                                        </td>

                                        <td>
                                            <button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-window-close"></i></button>
                                        </td>
                                    </form>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">


                <div class="card">
                    <div class="card-header bg-gradient-info text-white">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title"><i class="fa fa-life-ring"></i> FAQ</h4>
                            </div>
                            <div class="col-md-1">
                                <div class="text-right">
                                    <i  class="fa fa-chevron-down" data-toggle="collapse" href="#FAQ" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="collapse show box_blue" id="FAQ">
                        <div class="card-body text-justify">
                            <h4>Payout Conditions</h4>
                            <span>Once a publisher you referred earns $100 and reaches his payout threshold, $50 will be credited to your advertising budget.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')
    <style>
        .box_blue {
            border: 1px solid #7cacfa;
            border-top: 0;
        }

        ._sort_title{
            display: block;
            margin-top: 5px;
            font-size: 12px;
            font-style: italic;
        }
        ._amount{
            color: #0774BC;
            padding: 5px 0;
            font-size: 54px;
            font-weight: 300;
            background: #fbfef2;
            border-bottom: solid 1px #f5f9e7;
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }
        .pricing-content li {
            color: #888;
            font-size: 12px;
            padding: 7px 15px;
            border-bottom: solid 1px #f5f9e7;
        }

        .pricing-footer {
            color: #777;
            font-size: 11px;
            line-height: 17px;
            text-align: center;
            padding: 0 20px 19px;
        }

        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
@endsection
