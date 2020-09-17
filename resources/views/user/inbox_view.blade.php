@extends('user.layout')

@section('title')
    {{ $data->message->subject }}
@endsection

@section('page_title')
    View Message
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.inbox') }}">Index</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Message </li>
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
            <div class="card-body border-bottom">
                <h4 class="mb-0">{{ $data->message->subject }}</h4>
            </div>

            <div class="card-body border-bottom">
                <h4 class="mb-3">Hello {{ Auth::guard('web')->user()->name }},</h4>

                <p>{{ $data->message->message }}</p>
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
