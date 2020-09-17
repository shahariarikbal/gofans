@extends('client.layout')

@section('title')
    Client | Regional Volume
@endsection

@section('page_title')
    Regional Volume
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Regional Volume</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <form action="{{route('client.RegionalVolume')}}" method="get">
            <div class="row mb-3">
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="country_name" data-placeholder="Choose a Category" tabindex="1">
                            <option value="">-- Select Country --</option>
                            @foreach ($country_names as $country)
                                <option value="{{ $country['country'] }}" {{ isset($requestData) && $requestData->country_name == $country['country'] ? 'selected':'' }}>
                                    {{ $country['country'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="gender" data-placeholder="Choose a Gender" tabindex="1">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ isset($requestData) && $requestData->gender == 'Male' ? 'selected':'' }}>Male</option>
                            <option value="Female" {{ isset($requestData) && $requestData->gender == 'Female' ? 'selected':'' }}>Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="platform" data-placeholder="Choose a Mobile Platform" tabindex="1">
                            <option value="">-- Mobile Platform --</option>
                            <option value="android" {{ isset($requestData) && $requestData->platform == 'android' ? 'selected':'' }}>Android</option>
                            <option value="ios" {{ isset($requestData) && $requestData->platform == 'ios' ? 'selected':'' }}>IOS</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <button class=" btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-gradient-success text-white">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title"><i class="fa fa-globe"></i> Regional User Volume</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="feed-widget scrollable" style="height:400px;">
                            <ul class="feed-body list-style-none">
                                @if (!empty($volumes))
                                    @foreach ($volumes as $item)
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

@section('page_js')

@endsection
