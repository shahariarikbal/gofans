@extends('user.layout')

@section('title')
    {{ $data->name }} | Edit
@endsection

@section('page_title')
    Profile Edit
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Profile Edit</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Edit My Profile</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('user.dashboard') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="ti-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <form  method="post" action="{{ route('user.profileUpdate', $data->id) }}" novalidate enctype="multipart/form-data">
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
                                        <h5>Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ old('email', isset($data) ? $data->email:'') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Skype ID<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="skype_id" value="{{ old('skype_id', isset($data) ? $data->skype_id:'') }}" class="form-control{{ $errors->has('skype_id') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                                            @if ($errors->has('skype_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('skype_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Mobile Number<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile_number" value="{{ old('mobile_number', isset($data) ? $data->mobile_number:'') }}" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                                            @if ($errors->has('mobile_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Profile Photo</h5>
                                        <div class="controls">
                                            <input type="file" class="form-control" name="profile_photo" accept="image/*">
                                            @if ($errors->has('profile_photo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('profile_photo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Select Gender<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control" name="gender">
                                                <option>-- Select Gender --</option>
                                                <option value="Male" {{ isset($data->gender) && $data->gender == 'Male' ? 'selected':''  }}>Male</option>
                                                <option value="Female" {{ isset($data->gender) && $data->gender == 'Female' ? 'selected':''  }}>Female</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-xs-12">
                            @if($data->profile_photo)
                                <img src="{{ asset('media/profile/'.$data->profile_photo) }}" class="img-thumbnail img-fluid">
                            @endif
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="reset" class="btn btn-inverse">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('page_js')

@endsection
