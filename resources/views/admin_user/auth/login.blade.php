<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/images/user.png">
    <title>Go Fans Admin | Login</title>
    <link href="{{ asset('admin') }}/css/style.min.css" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('admin') }}/images/auth-bg.jpg) no-repeat center center;">
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
                        <form class="form-horizontal mt-3" method="post" action="{{ route('AdminUser.login') }}">
                            @csrf
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


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        <a href="{{ route('AdminUser.password.request') }}" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Forgot password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 pb-3">
                                    <button class="btn btn-block btn-lg btn-custom" type="submit">Sign In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin') }}/libs/jquery/dist/jquery.min.js"></script>
</body>
</html>
