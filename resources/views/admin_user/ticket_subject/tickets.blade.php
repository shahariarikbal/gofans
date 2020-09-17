@extends('admin_user.layout')

@section('title')
    Admin | User Ticket
@endsection

@section('page_title')
    User Ticket
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Ticket</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">User Ticket List</h3>
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
                                                @if($ticket->status == 0 || $ticket->status == 1)
                                                    @if($ticket->status == 1)
                                                        <button class="btn btn btn-rounded btn-outline-success mr-2 btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-check mr-1"></i> Open
                                                        </button>
                                                    @else
                                                        <button class="btn-rounded btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti-close mr-1"></i> Closed
                                                        </button>
                                                    @endif
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('ticketOpen', $ticket->id) }}">Open</a>
                                                        <a class="dropdown-item" href="{{ route('ticketClosed', $ticket->id) }}">Closed</a>
                                                    </div>
                                                @endif
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
