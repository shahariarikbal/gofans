@extends('user.layout')

@section('title')
    Tickets
@endsection

@section('page_title')
    Tickets
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Tickets </li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Tickets List</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('ticket.create') }}">
                            <button class="btn btn-circle btn-success text-white">
                                <i class="ti-plus"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Add New</span>
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
                                    <th>Sub. Name</th>
                                    <th>Message</th>
                                    <th>Create Date</th>
                                    <th>Closed Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($data))
                                    @foreach($data as $key => $ticket)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $ticket->subject->name }}</td>
                                        <td>{{ $ticket->message }}</td>
                                        <td>{{ date('d M, Y', strtotime($ticket->created_at)) }}</td>
                                        <td>{{ isset($ticket->close_date) ? date('d M, Y', strtotime($ticket->close_date)):"-- -- ----" }}</td>
                                        <td>
                                            @if($ticket->status == 1)
                                                <span class="btn btn btn-rounded btn-outline-success mr-2 btn-sm"><i class="ti-check mr-1"></i>Open</span>
                                            @else
                                                <span class="btn-rounded btn btn-outline-danger btn-sm"><i class="ti-close mr-1"></i> Closed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-outline-info btn-circle btn-circle ml-2">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
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
