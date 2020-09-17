@extends('client.layout')

@section('title')
    Client Overview
@endsection

@section('page_title')
    Overview
@endsection

@section('breadcrumb')

@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-gradient-info">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2>{{ $campaigns[1]->totalCampaigns }}/{{ $campaigns[0]->totalCampaigns }}</h2>
                                <h6>Running Campaigns</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="fa fa-rocket"></i></span>
                            </div>
                        </div>
                    </div>
                    <a class="_box_footer _color_1" href="{{ route('campaign.index') }}">
                        View campaigns <i class="pull-right fa fa-arrow-circle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-gradient-danger">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2>150</h2>
                                <h6>Unique Traffic</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="ti-bar-chart"></i></span>
                            </div>
                        </div>
                    </div>
                    <a class="_box_footer _color_2" href="#">
                        View campaigns <i class="pull-right fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-gradient-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2>${{ numberFormat($campaigns[0]->totalAmount, 1)}}</h2>
                                <h6>Account Spendings</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="ti-alarm-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <a class="_box_footer _color_5" href="{{ route('campaign.index') }}">
                        Fund History  <i class="pull-right fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-gradient-primary">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2>${{ numberFormat(auth()->user()->balance(), 1) }}</h2>
                                <h6>Account Balance</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6"><i class="ti-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <a class="_box_footer _color_4" href="{{ route('client.billingInvoices') }}">
                        Add funds  <i class="pull-right fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header bg-gradient-success text-white">

                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"><i class="fa fa-bell"></i> Recent Notifications ({{ count($notifications) }} new)</h4>
                            </div>

                            <div class="col-md-3 text-right">
                                <a href="#" class="text-white">
                                    <i class="fa fa-link"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="feed-widget scrollable" style="height:400px;">
                            <ul class="feed-body list-style-none">
                                @if(!empty($notifications))
                                    @foreach($notifications as $notification)
                                    <li class="feed-item d-flex align-items-center py-2 border-bottom">
                                        <span style="width: 70%"  class="ml-3 font-light">
                                            {{ $notification->message }}
                                              <span class="badge badge-pill text-white font-medium label-rouded" style="background-color: {{ notificationTypeColor($notification->type) }}">
                                                  <a class="m-0 p-0">
                                                      {{ $notification->type }}
                                                      <i class="fa fa-share" aria-hidden="true"></i>
                                                  </a>
                                              </span>
                                        </span>
                                        <div class="ml-auto">
                                            <span class="text-muted font-light"> {{ getTimeToString($notification->created_at) }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header bg-gradient-success text-white">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"><i class="fa fa-globe"></i> Regional User Volume</h4>
                            </div>

                            <div class="col-md-3 text-right">
                                <a href="{{ route('client.RegionalVolume') }}" class="text-white">
                                    <i class="fa fa-link"></i> View All
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="feed-widget scrollable" style="height:400px;">
                            <ul class="feed-body list-style-none">
                                @if (!empty($volums))
                                    @foreach ($volums as $item)
                                        @if(!empty($item->country))
                                        <li class="feed-item d-flex align-items-center py-2">
                                            <div class="btn-circle" style="width: 60px!important;">
                                                 <img class="img-fluid" src="{{ asset('admin/images/country/'.strtolower($item->country_code)) }}.png">
                                            </div>
                                        <span style="width: 70%"  class="ml-3 font-light">{{$item->country}}</span>
                                            <div class="ml-auto">
                                                <span class="text-muted font-light"> {{$item->totalUser}}</span>
                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')
    <style>
        ._color_1{
            color: white;
            background-color: #4884b8;
        }

        ._color_2{
            color: white;
            background-color: #ff7e50;
        }

        ._color_3{
            color: white;
            background-color: #fee46d;
        }

        ._color_4{
            color: white;
            background-color: #786fba;
        }

        ._color_5{
            color: white;
            background-color: #37D070;
        }

        ._box_footer{
            clear: both;
            display: block;
            padding: 6px 10px 6px 10px;
            position: relative;
            text-transform: uppercase;
            font-size: 11px;
            opacity: 0.7;
            filter: alpha(opacity=70);
        }
    </style>
@endsection


@section('page_js')
    <!-- This Page JS -->
    <script src="{{ asset('admin') }}/js/pages/dashboards/dashboard1.js"></script>
@endsection
