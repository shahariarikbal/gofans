<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>Password Reset</title>

    <!-- Stylesheets
    ================================================= -->
    <link rel="stylesheet" href="{{ asset('au-web') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('au-web') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('au-web') }}/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ asset('au-web') }}/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/images/user.png"/>
    <style>
        @media (min-width: 1200px){
            .container {
                width: 1200px;
            }
        }
        @media (min-width: 992px){
            .container {
                width: 970px;
            }
        }
        input[type=checkbox] {
            margin: 0 8px 0px -20px;
        }
        .reset_pass {
            border-radius: 400px; margin-left: 15px; border: 1px solid #000001
        }
    </style>
</head>
<body>

<!-- Landing Page Contents
================================================= -->
<div id="lp-register">
    <div class="container" style="padding: 30px">
        <div class="row">
            <div class="col-sm-4">
                <div class="intro-texts">
                    <h1 class="text-white">Make Cool Friends !!!</h1>
                    <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
                    <button class="btn btn-primary">Learn More</button>
                </div>
            </div>
            <div class="col-sm-7 col-sm-offset-1">
                <div class="reg-form-container">

                    <!-- Register/Login Tabs-->
                    <div class="reg-options">
                        <ul class="nav nav-tabs">
                            <li><a href="{{ route('register') }}" >Register</a></li>
                            <li class="active"><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </div>

                    <!--Registration Form Contents-->
                    <div class="tab-content">
                        <!--Registration Form Contents Ends-->

                        <!--Login-->
                        <div class="tab-pane active" id="login">
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
                            <div class="panel-body">
                                <div class="text-center">
                                    <h3 style="color: #000001"><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Forgot Password?</h2>
                                    <p>You can reset your password here.</p>
                                    <div class="panel-body">

                                        <form id="reset-form" role="form" autocomplete="off" class="form" method="post" action="{{ route('AdminUser.password.email') }}">
                                            @csrf
                                            <div class="form-group">
                                                @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                    <input type="email" id="email" name="email" placeholder="email address" value="{{ old('email') }}" autocomplete="email" required autofocus class="form-control @error('email') is-invalid @enderror">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!--Buy button-->

<!-- Scripts
================================================= -->
<script src="{{ asset('au-web') }}/js/jquery-3.1.1.min.js"></script>
<script src="{{ asset('au-web') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('au-web') }}/js/jquery.appear.min.js"></script>
<script src="{{ asset('au-web') }}/js/jquery.incremental-counter.js"></script>
<script src="{{ asset('au-web') }}/js/script.js"></script>


</body>
</html>
