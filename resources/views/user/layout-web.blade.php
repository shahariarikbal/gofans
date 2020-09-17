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
    <link href="{{ asset('admin') }}/libs/toastr/build/toastr.min.css" rel="stylesheet">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="postoverlay"></div>
        <!-- header -->
        @include('user.web.includes._header')
        <!-- end header -->

        <!--  timeline   -->
        @yield('timeline')
        <!--  timeline end  -->

        {{-- <!-- right sidebar user chat -->--}}
        {{-- @include('user.web.includes._right_chat_bar')--}}
        {{-- <!-- end right sidebar user chat -->--}}

        {{-- <!-- left sidebar menu -->--}}
        {{-- @include('user.web.includes._left_menu')--}}
        {{--<!-- end left sidebar menu -->--}}

        <section>
            <div class="gap gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row merged20" id="page-contents">
                                <!-- left category sidebar -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-sm-1 order-md-1">
                                    <div class="sidebar-hidden">
                                        @include('user.web.includes._left_category_menu')
                                    </div>
                                </div>
                                <!-- end left category sidebar -->

                                <!-- main content  -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-lg-1 order-sm-0 order-md-0">
                                    @yield('content')
                                </div>
                                <!-- end main content  -->

                                <!-- right ad content  -->
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 order-lg-2 order-sm-2 order-md-2">
                                    @include('user.web.includes._right_ad_content')
                                </div>
                                <!-- end right ad content  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        @include('user.web.includes._footer')
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
            @if(session('success'))
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