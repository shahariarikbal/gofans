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
                <div class="land-featurearea" style="height: calc(100vh - 60px);">
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
                <div class="login-reg-bg" style="height: calc(100vh - 60px);">
                    <div class="log-reg-area sign">
                        <h2 class="log-title">Login</h2>
                        <p>
                            Don’t use GoFans Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                        </p>
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
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="my-email" required="required"  class="@error('email') is-invalid @enderror" />
                                <label class="control-label" for="my-email">Email</label><i class="mtrl-select"></i>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required="required" class="@error('password') is-invalid @enderror" />
                                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <a href="{{ url('/password/reset') }}" title="" class="forgot-pwd">Forgot Password?</a>
                            <div class="submit-btns">
                                <button class="btn btn-success signin" type="submit"><span>Login</span></button>
                                <span class="reg-text-span">Don't have an account ? Please Click </span><a href="{{ route('register') }}" class="reg-text">Register</a>
                            </div>
                        </form>
                        <hr>
                        <a href="{{ route('social.login', ['facebook']) }}" class="fb btn-fb">
                            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottombar bg-white p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="timeline-info text-right m-0">
                        <span class="copyright">© goFans {{ date('Y') }}. All rights reserved.</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="timeline-info text-right m-0">
                        <ul>
                            <li>
                                <a href="{{ route('web.privacyPolicy') }}" title="Privacy Policy" data-ripple="">Privacy Policy</a>
                                <a href="{{ route('web.termsServices') }}" title="Terms and Services" data-ripple="">Terms and Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>


</html>
