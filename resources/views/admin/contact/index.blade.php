@extends('admin.layout')

@section('title')
    Admin | Contact Setting
@endsection

@section('page_title')
    Contact Setting
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Contact Setting</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Update Contact Setting</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="material-card card">
                    <div class="card-body">
                        <form action="{{ route('admin.contactSettingStore') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Email 1</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <input type="text" name="email_1" value="{{ old('email_1', isset($data) ? $data->email_1:'') }}" class="form-control{{ $errors->has('email_1') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('email_1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email_1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Email 2</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <input type="text" name="email_2" value="{{ old('email_2', isset($data) ? $data->email_2:'') }}" class="form-control{{ $errors->has('email_2') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('email_2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email_2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Phone number 1</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <input type="text" name="phone_number_1" value="{{ old('phone_number_1', isset($data) ? $data->phone_number_1:'') }}" class="form-control{{ $errors->has('phone_number_1') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('phone_number_1'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone_number_1') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Phone number 2</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <input type="text" name="phone_number_2" value="{{ old('phone_number_2', isset($data) ? $data->phone_number_2:'') }}" class="form-control{{ $errors->has('phone_number_2') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('phone_number_2'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone_number_2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Address</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <textarea name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" >{{ old('address', isset($data) ? $data->address:'') }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="pt-2">Map Url</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="controls">
                                            <input type="url" name="map" value="{{ old('map', isset($data) ? $data->map:'') }}" class="form-control{{ $errors->has('map') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('map'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('map') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group border-top">
                                <div class="row  mt-3">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
