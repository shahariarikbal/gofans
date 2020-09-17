<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jun 2020 19:10:21 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Login or Register</title>
    <link rel="icon" href="{{ asset('/goweb/') }}/images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/main.min.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/color.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/responsive.css">
</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="container-fluid pdng0">
        <div class="row merged">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="land-featurearea">
                    <div class="land-meta">
                        <h1>Make Cool Friends !!!</h1>
                        <p>
                            Friend Finder is a social network template that can be used to connect people.
                            The template offers Landing pages, News Feed, Image/Video Feed, Chat Box,
                            Timeline and lot more. <br />
                            <br />Why are you waiting for? Buy it now.
                        </p>
                        <div class="friend-logo">
                            <span><img src="{{ asset('/goweb/') }}/images/wink.png" alt=""></span>
                        </div>
                        <a href="#" title="" class="folow-me">Follow Us on</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="login-reg-bg">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">Reset Password</h2>
                        <p>
                            You can update your password..
                        </p>
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div>
                                <strong>New Password</strong>
                                <input type="password" class="form-control reset_pass" name="password" placeholder="Password">
                            </div>
                            <div>
                                <strong>Confirm Password</strong>
                                <input type="password" class="form-control reset_pass" name="password_confirmation" placeholder="Password Confirm">
                            </div>
                            <br/>
                            <div class="form-group text-center">
                                <div class="col-xs-12 pb-3">
                                    <button class="btn btn-block btn-lg btn-success" type="submit">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('/goweb/') }}/js/main.min.js"></script>
<script src="{{ asset('/goweb/') }}/js/script.js"></script>
<script src="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</body>


</html>
