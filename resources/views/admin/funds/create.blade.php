@extends('admin.layout')

@section('title')
    Admin | Funds create
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
                    <form action="{{route('funds.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Select a Client <span style="color:red">*</span> </label>
                            <select name="client_id" id="client_id" class="form-control">
                                <option value="">Select a client</option>
                                @foreach ($client_lists as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Deposite/Withdraw <span style="color:red">*</span></label>
                            <select name="fund_type" id="fund_type" class="form-control">
                                <option value="">Select a type</option>
                                <option value="deposite">Deposite</option>
                                <option value="withdraw">Withdraw</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Amount <span style="color:red">*</span></label>
                            <input type="number" class="form-control" name="amount" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="">Description <small>(optional)</small> </label>
                            <textarea name="details" id="details" class="form-control" ></textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-xs-right">
                                <button type="submit"  class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-inverse">Reset</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
