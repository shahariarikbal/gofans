@extends('admin_user.layout')

@section('title')
    Admin | Withdraw Rate
@endsection

@section('page_title')
    Withdraw Rate
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Withdraw Rate</h3>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <form  method="post" action="{{ route('AdminUser.withdrawRateStore') }}" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-xs-12">
                                    <div class="form-group">
                                        <h5>Minimum amount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="minimum_amount" value="{{ old('minimum_amount', isset($data) ? $data->minimum_amount:'') }}" class="form-control{{ $errors->has('minimum_amount') ? ' is-invalid' : '' }}" required>
                                            @if ($errors->has('minimum_amount'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('minimum_amount') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Maximum amount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="maximum_amount" value="{{ old('maximum_amount', isset($data) ? $data->maximum_amount:'') }}" class="form-control{{ $errors->has('maximum_amount') ? ' is-invalid' : '' }}" required>
                                            @if ($errors->has('maximum_amount'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('maximum_amount') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="reset" class="btn btn-inverse">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
