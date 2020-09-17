@extends('admin.layout')

@section('title')
    Admin | Audience List
@endsection

@section('page_title')
    Audiences
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Audiences</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Audience List</h3>
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
                                        @foreach($data as $key => $audience)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a href="#">{{ $audience->name }}</a></td>
                                            <td>{{ $audience->email }}</td>
                                            <td>
                                                @if($audience->status == 1)
                                                    <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-check mr-1"></i> Unblock
                                                    </button>
                                                @else
                                                    <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-close mr-1"></i> Block
                                                    </button>
                                                @endif
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.audienceUnblock', $audience->id) }}">Unblock</a>
                                                    <a class="dropdown-item" href="{{ route('admin.audienceBlock', $audience->id) }}">Block</a>
                                                </div>
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
