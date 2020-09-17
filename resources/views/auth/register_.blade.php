<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/images/user.png">
    <title>Go To Top Audience | Register</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="{{ asset('admin') }}/css/style.min.css" rel="stylesheet">
    <style>
        .source-traffic div{
            margin-right: 18px;
        }
        .source-traffic div .custom-control-label{
            vertical-align: middle !important;
        }
    </style>
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('admin') }}/images/auth-bg2.jpg) no-repeat center center;">
        <div class="auth-box">
            @if(session('error'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> {{ Session::get('error') }}
                </div>
            @endif
            <div id="loginform">
                <div class="logo">
                    <span class="db">
                        <img class="mb-3" width="250" src="{{ asset('admin') }}/images/logos/user-full.png" alt="logo" />
                    </span>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3" method="post" action="{{ route('register') }}">
                            @csrf
                            <div>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" value="{{ old('name') }}" name="name" placeholder="Name">
                                </div>
                            </div>

                           <div>
                               @error('email')
                               <small class="text-danger">{{ $message }}</small>
                               @enderror
                               <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text bg-custom" id="basic-addon1"><i class="ti-email"></i></span>
                                   </div>
                                   <input type="text" class="form-control form-control-lg" value="{{ old('email') }}" name="email" placeholder="Email">
                               </div>
                           </div>

                            <div>
                                @error('mobile_number')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon1"><i class="ti-mobile"></i></span>
                                        <span style="display: none" class="input-group-text" id="countryCode"></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Mobile number">
                                </div>
                            </div>

                            <div>
                                @error('date_of_birth')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon1"><i class="ti-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="date_of_birth" value="{{ old('date_of_birth') }}" id="datepicker-autoclose" placeholder="Date of birth">
                                </div>
                            </div>

                            <div>
                                @error('referral_code')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon1"><i class="ti-help-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="referral_code" value="{{ old('referral_code') }}" placeholder="Referral code">
                                </div>
                            </div>

                            <div>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                                </div>
                            </div>

                            <div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="card-title">Select Gender</h4>
                                <div class="form-inline">
                                    <div class="custom-control custom-radio mr-3">
                                        <input type="radio" id="Male" value="Male" name="gender" class="custom-control-input">
                                        <label class="custom-control-label"  for="Male">Male</label>
                                    </div>

                                    <div class="custom-control custom-radio ml-3">
                                        <input type="radio" id="Female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="Female">Female</label>
                                    </div>
                                </div>
                                @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <h4 class="card-title">Devices to be Used</h4>
                                <div class="form-inline">
                                    <div class="d-flex source-traffic">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="android" name="android" >
                                            <label class="custom-control-label" for="android">Android</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ios" name="ios">
                                            <label class="custom-control-label" for="ios">IOS</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="desktop" name="desktop">
                                            <label class="custom-control-label" for="desktop">Desktop</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"  class="custom-control-input" id="use_all" name="use_all">
                                            <label class="custom-control-label" for="use_all">All</label>
                                        </div>
                                    </div>
                                </div>
                                @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <input type="hidden" name="country_code">

                            </div>

                            <div class="form-group text-center">
                                <div class="col-xs-12 pb-3">
                                    <button class="btn btn-block btn-lg btn-custom" type="submit">Sign Up</button>
                                </div>
                            </div>

                        </form>

                        <div class="form-group mb-0 mt-2 ">
                            <div class="col-sm-12 text-center ">
                                Already have an account? <a href="{{ route('login') }}" class="text-custom ml-1 "><b>Sign In</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin') }}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    jQuery('#datepicker-autoclose').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });

    setTimeout(function(){
        $.ajax({
            type: "GET",
            url: "https://ipapi.co/country_calling_code/",
            success: function(data){
                if (data) {
                    $("input[name='country_code']").val(data);
                    $('#countryCode').text(data);
                    $('#countryCode').show();
                }
            }
        });
        }, 100);
</script>
</body>
</html>
