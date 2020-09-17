<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/images/client.png">
    <title>Go Fans Audience | Reset Password</title>
    <link href="{{ asset('admin') }}/css/style.min.css" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{ asset('admin') }}/images/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ session('warning') }}
                </div>
            @endif
            <div id="loginform">
                <div class="logo">
                    <span class="db">
                        <img class="mb-3" width="250" src="{{ asset('admin') }}/images/logos/client-full.png" alt="logo" />
                    </span>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3" method="post" action="{{ route('client.password.request') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-custom" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="email" placeholder="Enter your email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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

                            <div class="form-group text-center">
                                <div class="col-xs-12 pb-3">
                                    <button class="btn btn-block btn-lg btn-custom" type="submit">Reset Password</button>
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
