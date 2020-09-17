@extends('user.layout')

@section('title')
    Task View
@endsection

@section('page_title')
    Tasks
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.task') }}">Tasks</a></li>
    <li class="breadcrumb-item active">View</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Task View</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('user.task') }}">
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
                    <table class="table table-hover">
                        <tr>
                            <th width="15%">Task Type</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->camping->app_type }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Task Name</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->camping->name }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Link</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->camping->link }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Points Earned</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->point }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Mobile Brand</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->mobile_brand }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Mobile Model</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->mobile_model }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Device ID</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->device_id }}</td>
                        </tr>

                        <tr>
                            <th width="15%">OS</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->os }}</td>
                        </tr>

                        <tr>
                            <th width="15%">OS Version</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->os_version }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Browser Info</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->browser_info }}</td>
                        </tr>

                        <tr>
                            <th width="15%">IP</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ $data->ip }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Completed At</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">{{ date('d-m-Y', strtotime($data->verified_date)) }}</td>
                        </tr>

                        <tr>
                            <th width="15%">Status</th>
                            <td class="text-center" width="2%">:</td>
                            <td class="text">
                                @if($data->verification_status == 0)
                                    <button class="btn btn btn-rounded btn-outline-warning mr-2 btn-sm" type="button">
                                        <i class="ti-check mr-1"></i> Pending
                                    </button>
                                @elseif($data->verification_status == 1)
                                    <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm" type="button">
                                        <i class="ti-check mr-1"></i> Completed
                                    </button>
                                @else
                                    <button class="btn btn btn-rounded btn-outline-danger mr-2 btn-sm" type="button">
                                        <i class="ti-check mr-1"></i> Rejected
                                    </button>
                                @endif
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_js')

@endsection
