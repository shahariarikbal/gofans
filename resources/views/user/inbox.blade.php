@extends('user.layout')

@section('title')
    Inbox
@endsection

@section('page_title')
    Inbox
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Inbox </li>
@endsection


@section('content')
    <div class="email-app">
        <!-- ============================================================== -->
        <!-- Left Part -->
        <!-- ============================================================== -->
        <div class="left-part">
            <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
            <div class="scrollable" style="height:100%;">
                <div class="p-3">
                    <a id="compose_mail" class="waves-effect waves-light btn btn-info d-block" href="javascript: void(0)">Compose</a>
                </div>
                <div class="divider"></div>
                <ul class="list-group">
                    <li>
                        <small class="p-3 grey-text text-lighten-1 db">Folders</small>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('user.inbox') }}" class="active list-group-item-action"><i class="mdi mdi-inbox"></i> Inbox <span class="badge badge-success text-white font-normal badge-pill float-right">{{ $countMessage }}</span></a>
                    </li>

                    <li class="list-group-item">
                        <a href="javascript:void(0)" class="list-group-item-action"> <i class="mdi mdi-email"></i> Sent Mail </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Right Part -->
        <!-- ============================================================== -->
        <div class="right-part mail-list bg-white">
            <div class="p-3 b-b">
                <div class="d-flex align-items-center">
                    <div>
                        <h4>Mailbox </h4>
                        <span>Here is the list of mail</span>
                    </div>
                    <div class="ml-auto">
                        <input placeholder="Search Mail" id="" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <!-- Action part -->
            <!-- Button group part -->
            <div class="bg-light p-3 d-flex align-items-center do-block">
                <div class="btn-group mt-1 mb-1">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input sl-all" id="cstall">
                        <label class="custom-control-label" for="cstall">Check All</label>
                    </div>
                </div>
                <div class="ml-auto">
                    <div class="btn-group mr-2" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-outline-secondary font-18"><i class="mdi mdi-reload"></i></button>
                        <button type="button" class="btn btn-outline-secondary font-18"><i class="mdi mdi-delete"></i></button>
                    </div>

                </div>
            </div>
            <!-- Action part -->
            <!-- Mail list-->
            <div class="table-responsive">
                <table class="table email-table no-wrap table-hover">
                    <tbody>
                    @if(!empty($data))
                        @foreach($data as $message)
                        <tr class="unread {{ $message->status == 0 ? 'notView':'' }} ">
                            <td class="chb pl-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cst{{ $message->id }}">
                                    <label class="custom-control-label" for="cst{{ $message->id }}">&nbsp;</label>
                                </div>
                            </td>
                            <td class="max-texts">
                                <a class="link" href="{{ route('user.viewMessage', $message->id) }}">
                                   <span class="text-dark font-normal">
                                        {{ $message->message->message }}
                                    </span>
                                </a>
                            </td>
                            <td class="time text-muted">
                                {{ date('h:i a', strtotime($message->message->created_at)) }}
                            </td>
                        </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <div class="p-3 mt-4 text-center">
                {{ $data->links() }}
            </div>
        </div>

    </div>
@endsection

@section('page_css')
    <style>
        .notView {
            background-color: #ff505017!important;
        }
        .notView:hover{
            color: #313131;
            background-color: rgba(0,0,0,.075)!important;
        }
    </style>
@endsection
@section('page_js')

@endsection
