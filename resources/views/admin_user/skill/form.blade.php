@extends('admin_user.layout')

@section('title')
    Admin | Skill | {{ isset($data)?'Edit':'Create' }}
@endsection

@section('page_title')
    Skill
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('skill.index') }}">Skill</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ isset($data)?'Edit':'Create' }}</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Skill {{ isset($data)?'Edit':'Create' }}</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('skill.index') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="fa fa-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <form  method="post" action="{{ isset($data)?route('skill.update', $data->id):route('skill.store') }}" novalidate>
                    @if (isset($data)) @method('PATCH') @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-xs-12">
                            <div class="material-card card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h5>Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ old('name', isset($data) ? $data->name:'') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <h5>Status<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input {{ $errors->has('status') ? ' is-invalid' : '' }}" {{ isset($data->status) && $data->status  == 1 ? 'checked':'' }} value="1" id="active" name="status">
                                                    <label class="custom-control-label" for="active">Active</label>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input {{ $errors->has('status') ? ' is-invalid' : '' }}" {{ isset($data->status) && $data->status == 0 ? 'checked':'' }} value="0" id="inactive" name="status">
                                                    <label class="custom-control-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
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
@endsection
