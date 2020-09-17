<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('goweb') }}/images/fav.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('goweb/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('goweb/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('goweb/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('goweb/css/responsive.css') }}">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    <div class="postoverlay"></div>
    <!-- header -->
    <div class="responsive-header">
        <div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
            <span class="mh-text">
				<a href="{{ url('/newsfeed') }}" title=""><img src="{{ asset('goweb') }}/images/logo2.png" alt=""></a>
			</span>
            <span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
        </div>
        <div class="mh-head second">
            <form class="mh-form">
                <input placeholder="search" />
                <a href="#" class="fa fa-search"></a>
            </form>
        </div>

    </div><!-- responsive header -->

    <div class="topbar stick">
        <div class="logo">
            <a title="" href="{{ url('/newsfeed') }}"><img src="{{ asset('goweb') }}/images/logo.png" alt=""></a>
        </div>

        <div class="top-area">

            <div class="user-img">
                @if(Auth::check())
                    <a href="{{ url('/timeline/'.Auth::guard('web')->user()->id) }}">
                        @if(auth()->user()->profile_photo)
                            <img src="{{ asset('storage/images/'.auth()->user()->profile_photo) }}" class="auth-avatar"/>
                        @else
                            <img src="{{ asset('goweb') }}/images/resources/admin.jpg" alt="" class="auth-avatar">
                        @endif
                        {{ Auth::guard('web')->user()->name }}
                    </a>
                @else
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('goweb') }}/images/resources/admin.jpg" alt="" class="auth-avatar">
                        Guest
                    </a>
                @endif

            </div>
        </div>
    </div>
</div><!-- topbar -->
<!-- end header -->

<section>
    <div class="gap2 color-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-banner">
                        <i><img src="{{ asset('goweb') }}/images/faq.png" alt=""></i>
                        <h1>@yield('page-title')</h1>
                    </div>
                    <nav class="breadcrumb">
                        <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                        <span class="breadcrumb-item active">@yield('page-title')</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="gap gray-bg">
        <div class="container">
            <div class="row" id="page-contents">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
<!--  timeline   -->

<!--  timeline end  -->

<!-- footer -->
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
<!-- end footer -->


<script src="{{ asset('goweb/js/main.min.js') }}"></script>
<script data-cfasync="false" src="{{ asset('goweb/js/email-decode.min.js') }}"></script>
<script src="{{ asset('goweb/js/script.js') }}"></script>
<script src="{{ asset('goweb/js/map-init.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('admin') }}/libs/toastr/build/toastr.min.js"></script>

@yield('page_js')
@stack('stack_js')
<script>
    $(function() {
        @if (session('success'))
        toastr.success("{{ session('success') }}", 'Successful.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @elseif(session('error'))
        toastr.error("{{ session('error') }}", 'Error.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @elseif(session('warning'))
        toastr.error("{{ session('warning') }}", 'Warning.. !!', {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "progressBar": true,
            timeOut: 3000
        });
        @endif
    });
</script>
</body>
</html>
