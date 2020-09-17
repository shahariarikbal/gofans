@extends('user.layout')

@section('title')
    Task
@endsection

@section('page_title')
    Tasks
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Tasks</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">My Tasks</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('user.dashboard') }}">
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
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Task Type</th>
                            <th>Task Name</th>
                            <th>Link</th>
                            <th>Points Earned</th>
                            <th>Completed At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($data))
                            @foreach($data as $campaignView)
                            <tr>
                                <td>{{ $campaignView->camping->app_type }}</td>
                                <td>{{ $campaignView->camping->name }}</td>
                                <td>{{ $campaignView->camping->link }}</td>
                                <td>{{ $campaignView->point }}</td>
                                <td>{{ date('d-m-Y', strtotime($campaignView->verified_date)) }}</td>
                                <td>
                                    @if($campaignView->verification_status == 0)
                                        <button class="btn btn btn-rounded btn-outline-warning mr-2 btn-sm" type="button">
                                            <i class="ti-check mr-1"></i> Pending
                                        </button>
                                    @elseif($campaignView->verification_status == 1)
                                        <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm" type="button">
                                            <i class="ti-check mr-1"></i> Completed
                                        </button>
                                    @else
                                        <button class="btn btn btn-rounded btn-outline-danger mr-2 btn-sm" type="button">
                                            <i class="ti-check mr-1"></i> Rejected
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.taskView', $campaignView->id) }}" class="btn btn-success btn-circle"><i class="fa fa-eye"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_js')

@endsection
