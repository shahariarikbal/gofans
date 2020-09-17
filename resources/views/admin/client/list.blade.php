@extends('admin.layout')

@section('title')
    Admin | Client List
@endsection

@section('page_title')
    Clients
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Clients</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Client List</h3>
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
                            <table class="goTable table table-striped border">
                                <thead>
                                <tr>
                                    <th>#S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data))
                                        @foreach($data as $key => $client)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a href="{{ route('admin.clientProfile') }}">{{ $client->name }}</a></td>
                                            <td>{{ $client->email }}</td>
                                            <td>
                                                @if($client->status == 0 || $client->status == 1)
                                                    @if($client->status == 1)
                                                    <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-check mr-1"></i> Approve
                                                    </button>
                                                    @else
                                                        <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-close mr-1"></i> Reject
                                                        </button>
                                                    @endif
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.clientApprove', $client->id) }}">Approve</a>
                                                    <a class="dropdown-item" href="{{ route('admin.clientReject', $client->id) }}">Reject</a>
                                                </div>
                                                @else
                                                    <a href="{{ route('admin.clientApprove', $client->id) }}" class="btn btn btn-rounded btn-outline-success mr-2 btn-sm"><i class="ti-check mr-1"></i>Approve</a>
                                                    <a href="{{ route('admin.clientReject', $client->id) }}" class="btn-rounded btn btn-outline-danger btn-sm"><i class="ti-close mr-1"></i> Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.clientProfile') }}" type="button" class="btn btn-success btn-circle"><i class="fa fa-eye"></i> </a>
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
        </div>
    </div>
@endsection
