@extends('admin_user.layout')

@section('title')
    Users
@endsection

@section('page_title')
    Users
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Users</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Users List</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('AdminUser.dashboard') }}">
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
                                    @foreach($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a href="#">{{ $user->name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->status == 2 || $user->status == 1)
                                                    @if($user->status == 1)
                                                        <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-check mr-1"></i> Approve
                                                        </button>
                                                    @else
                                                        <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-close mr-1"></i> Reject
                                                        </button>
                                                    @endif
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('AdminUser.userUnblock', $user->id) }}">Approve</a>
                                                        <a class="dropdown-item" href="{{ route('AdminUser.userBlock', $user->id) }}">Reject</a>
                                                    </div>
                                                @else
                                                    <a href="{{ route('AdminUser.userUnblock', $user->id) }}" class="btn btn btn-rounded btn-outline-success mr-2 btn-sm"><i class="ti-check mr-1"></i>Approve</a>
                                                    <a href="{{ route('AdminUser.userBlock', $user->id) }}" class="btn-rounded btn btn-outline-danger btn-sm"><i class="ti-close mr-1"></i> Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-success btn-circle"><i class="fa fa-eye"></i> </a>
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

@section('page_js')

@endsection
