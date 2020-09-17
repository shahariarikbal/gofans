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
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/main.min.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/color.css">
    <link rel="stylesheet" href="{{ asset('/goweb/') }}/css/responsive.css">
</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="registration-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding-0">
                    <div class="left-wrapper">
                        <div class="title-heading">
                            <h1>Make Cool Friends !!!</h1>
                        </div>
                        <div class="paragraph">
                            <p>
                                Friend Finder is a social network template that can be used to connect people.
                                The template offers Landing pages, News Feed, Image/Video Feed, Chat Box,
                                Timeline and lot more. <br />
                                <br />Why are you waiting for? Buy it now.
                            </p>
                        </div>
                        <div class="friend-logo text-center">
                            <span><img src="{{ asset('/goweb/') }}/images/wink.png" alt="image" class="img-fluid"></span>
                        </div>
                        <div class="follow-us-link">
                            <a href="#" class="folow-me">Follow Us on</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding-0">
                    <div class="right-wrapper">
                        <div class="registration-forms sign">
                            <h2 class="log-title">Register</h2>
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

                            <form id='registration_form' method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="name" value="{{ old('name') }}" name="name" />
                                    <label class="control-label" for="name">* Name</label><i class="mtrl-select"></i>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" />
                                    <label class="control-label" for="email">* Email</label><i class="mtrl-select"></i>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <input type="text" readonly id="basic-addon1" name="mobile_number" class="input-group-text" value="+880" style="width: 80px;">
                                    </div>
                                        <input id="mobile" name="mobile_number" class="form-control" placeholder="* Mobile Number" aria-label="Mobile Number" aria-describedby="basic-addon1">
                                </div>
                                @error('mobile_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col">
                                        <input id="password" class="form-control" type="password" name="password" title="Enter password" placeholder="* Password" />
                                    </div>
                                    <div class="col">
                                        <input id="password" class="form-control input-group-lg" type="password" name="password_confirmation" title="Enter Confirm Password" placeholder="* Confirm Password" />
                                    </div>
                                    @error('password')
                                    <div class="form-group col-xs-12">
                                        <small class="text-danger" style="margin-left: 15px;">{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="datepicker-autoclose" value="{{ old('date_of_birth') }}" style="border: 1px solid lightgray;padding: 15px;height: 40px;" type="text" autocomplete="off" name="date_of_birth" title="Select Date of Birth" placeholder="* Date of Birth" />
                                    @error('date_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-radio">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="Male" checked="checked" /><i class="check-box"></i>Male *
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" value="Female" /><i class="check-box"></i>Female*
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="checkbox" style="margin-left: 10px;">
                                    <p class="birth"><strong>Devices to be Used</strong></p>
                                    <div class="row" style="width: 300px;">
                                        <label>
                                            <input type="checkbox" checked="checked" /><i class="check-box"></i>Android
                                        </label>
                                        <label style="margin-left: 5px;">
                                            <input type="checkbox" name="iso" /><i class="check-box"></i>Iso
                                        </label>
                                        <label style="margin-left: 5px;">
                                            <input type="checkbox" name="desktop" /><i class="check-box"></i>Desktop
                                        </label>
                                        <label style="margin-left: 5px;">
                                            <input type="checkbox" name="all" /><i class="check-box"></i>All
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="country_code">
                                <div class="submit-btns">
                                    <button class="btn btn-success">Register Now</button>
                                    <a href="{{ route('login') }}" class="reg-text">Already have an account ?</a>
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
        <div class="footer-section bg-white p-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <span class="copyright">© goFans {{ date('Y') }}. All rights reserved.</span>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                        <a href="{{ route('web.privacyPolicy') }}" class="text-dark mr-2" title="Privacy Policy" data-ripple="">Privacy Policy</a>
                        <a href="{{ route('web.termsServices') }}" class="text-dark mr-2" title="Terms and Services" data-ripple="">Terms and Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('/goweb/') }}/js/main.min.js"></script>
    <script src="{{ asset('/goweb/') }}/js/script.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script>
        jQuery('#datepicker-autoclose').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            uiLibrary: 'bootstrap4',
            todayHighlight: true
        });

        setTimeout(function() {
            $.ajax({
                type: "GET",
                url: "https://ipapi.co/country_calling_code/",
                success: function(data) {
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
