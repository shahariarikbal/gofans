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
            <div class="col-lg-12 col-md-12 col-xs-12" id="myApp">


                    @include('client.campaign._form')
            </div>
        </div>
    </div>
@endsection
