<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Newsfeed - GoFans</title>
    <link rel="icon" href="{{ asset('goweb') }}/images/fav.png" type="image/png" sizes="16x16">

{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ mix('goweb/css/all.css') }}" rel="stylesheet">
    @if (Auth::check())
        <script>window.authUser = {!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser = null;</script>
    @endif
</head>

<body class="ps-scrollbar-y">
    <div id="app">
        @if(Auth::user()->profile_step_count == 4)
        <div class="theme-layout">
            <div class="postoverlay"></div>
            <!-- header -->
            <web-header></web-header>
            <!-- end header -->

            <!--  timeline   -->
            <router-view :key="$route.path" name="profile"></router-view>
            <!--  timeline end  -->

            <section>
                <div class="gap gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row merged20" id="page-contents">
                                    <!-- left category sidebar -->
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-sm-1 order-md-1">
                                        <div class="sidebar-hidden">
                                            <left-category :key="$route.path"></left-category>
                                        </div>
                                    </div>
                                    <!-- end left category sidebar -->

                                    <!-- main content  -->
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-sm-0 order-md-0">
                                        <router-view :key="$route.fullPath" ></router-view>
                                    </div>
                                    <!-- end main content  -->

                                    <!-- right ad content  -->
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-2 order-sm-2 order-md-2">
                                        <right-ad-content :key="$route.path"></right-ad-content>
                                    </div>
                                    <!-- end right ad content  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- footer -->
            <web-footer></web-footer>
            <!-- end footer -->

        </div>
        <div class="side-panel">
            <h4 class="panel-title">General Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>use night mode</span>
                    <input type="checkbox" id="nightmode1" />
                    <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notifications</span>
                    <input type="checkbox" id="switch22" />
                    <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notification sound</span>
                    <input type="checkbox" id="switch33" />
                    <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>My profile</span>
                    <input type="checkbox" id="switch44" />
                    <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show profile</span>
                    <input type="checkbox" id="switch55" />
                    <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
            <h4 class="panel-title">Account Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>Sub users</span>
                    <input type="checkbox" id="switch66" />
                    <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>personal account</span>
                    <input type="checkbox" id="switch77" />
                    <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Business account</span>
                    <input type="checkbox" id="switch88" />
                    <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show me online</span>
                    <input type="checkbox" id="switch99" />
                    <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Delete history</span>
                    <input type="checkbox" id="switch101" />
                    <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Expose author name</span>
                    <input type="checkbox" id="switch111" />
                    <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
        </div><!-- side panel -->
        @else
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
            <step-profile></step-profile>
        @endif
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('goweb/js/all.js') }}"></script>

</body>
</html>
