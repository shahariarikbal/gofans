@extends('admin.layout')

@section('title')
    Admin | Funds List
@endsection

@section('page_title')
    Funds
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Funds</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Deposits</h3>
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
                        <a href="{{route('funds.create')}}" width="150px" class="btn btn-primary">Add fund</a>
                            <table class="goTable table table-striped border">
                                <thead>
                                <tr>
                                    <th>#S.No</th>
                                    <th>Client Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Source</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                 <tbody>
                                    @if(!empty($wbs))
                                        @foreach($wbs as $key => $wb)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a href="#">{{ $wb->client->name }}</a></td>
                                            <td>{{ $wb->amount }}</td>
                                        <td>{{$wb->fund_type}}</td>
                                        <td>{{$wb->fund_source}}</td>
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
