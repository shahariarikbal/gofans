@extends('user.layout')

@section('title')
    Earn Point | {{ $category->name }} | {{ $thisService->name }}
@endsection

@section('page_title')
    Earn Point | {{ $category->name }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Earn Point</li>
    <li class="breadcrumb-item">{{ $category->name }}</li>
    <li class="breadcrumb-item active"> {{ $thisService->name }}</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <!-- ============================================================== -->
        <!-- Card Group  -->
        <!-- ============================================================== -->

        <div class="row">
            @if(!empty($category->services))
                @foreach($category->services as $service)
                    <div class="col-md-4">
                        <div class="card p-2 p-lg-3">
                            <div class="p-lg-3 p-2">
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-circle btn-danger text-white btn-lg" href="{{ route('user.earnPointService', $service->id) }}">
                                       {!! serviceIcon($service->app_icon) !!}
                                    </a>
                                    <div class="ml-4" style="width: 38%;">
                                        <h4 class="font-light">{{ $service->name }}</h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="display-7 mb-0">{{ count($service->audienceCampaigns) }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Campaign ID</th>
                                <th>Date</th>
                                <th>Service</th>
                                <th>Name</th>
                                <th>link</th>
                                <th>Bid Rate</th>
                                <th>Campaign Quantity</th>
                                <th>Total Budget</th>
                                <th>Campaign Status</th>
                            </tr>
                            </thead>
                            @if(!empty($thisService->audienceCampaigns))
                                @foreach ($thisService->audienceCampaigns as $campaign)
                                    <tr>
                                        <td>{{$campaign->id}}</td>
                                        <td>{{$campaign->created_at}}</td>
                                        <td>{{$campaign->service->name}}</td>
                                        <td>{{$campaign->name}}</td>
                                        <td>{{$campaign->link}}</td>
                                        <td>{{$campaign->bid_amount}}</td>
                                        <td>{{$campaign->quantity}}</td>
                                        <td>{{$campaign->quantity * $campaign->bid_amount}}</td>
                                        <td>
                                            @if ($campaign->status == 0)
                                                Pending
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('page_js')


@endsection
