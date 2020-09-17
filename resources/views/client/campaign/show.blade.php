@extends('client.layout')

@section('title')
    Client | Campaign | Create
@endsection

@section('page_title')
    Campaigns
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('campaign.index') }}">Campaigns</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')

    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-8">
                <label class="form-inline">
                <h3 class="font-light">Campaign Create </h3> <span class="ml-1"> add new campaigns to advertise your apps</span>
                </label>
            </div>
            <div class="col-sm-12 col-md-4">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">

                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card card-body">
                    <table>
                        <tr>
                            <th>Category Name</th>
                            <td>{{$campaign->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Service Name</th>
                            <td>{{$campaign->service->name}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$campaign->name}}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>{{$campaign->link}}</td>
                        </tr>
                        <tr>
                            <th>Keywords</th>
                            <td>{{$campaign->keywords}}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>{{$campaign->start_date}}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                            <td>{{$campaign->end_date}}</td>
                        </tr>
                        <tr>
                            <th>Bid Amount</th>
                            <td>{{$campaign->bid_amount}}</td>
                        </tr>
                        <tr>
                            <th>Bid Quantity</th>
                            <td>{{$campaign->quantity}}</td>
                        </tr>
                        <tr>
                            <th>Day Limit</th>
                            <td>{{$campaign->day_limit}}</td>
                        </tr>
                        <tr>
                            <th>platform</th>
                            <td>{{$campaign->mobile_platform}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$campaign->app_type}}</td>
                        </tr>
                        <tr>
                            <th>Service Mode</th>
                            <td>{{$campaign->mode}}</td>
                        </tr>
                        <tr>
                            <th>Service Mode Value</th>
                            <td>{{$campaign->mode_value}}</td>
                        </tr>
                        <tr>
                            <th>Country Mode</th>
                            <td>{{$campaign->country_mode}}</td>
                        </tr>
                    </table>
                    <a href="{{url('campaign')}}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
