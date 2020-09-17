<?php
// echo '<pre>';
// print_r($_SERVER);
// $title_array = array('home' => '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/client.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('web-assets/fonts/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('web-assets/styles/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('web-assets/styles/main.css?v=1.1') }}" />

    @yield('style')
</head>

<body>
    <!-- Preloader -->
    <div id="js-preloader" class="js-preloader">
        <div class="content">
            <img src="{{ asset('web-assets/images/logo-icon.png') }}" alt="">
        </div>
        <div class="preloader-inner"></div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-nav-wrapper">
        <div class="mobile-menu-inner">
            <ul class="mobile-menu text-dark">
                {{--<li><a href="{{ route('client.web.home') }}">Home</a></li>--}}
                <li><a class="text--bold text--spacing-2" href="{{ route('client.web.advertisers') }}">Advertisers</a></li>
                <li><a class="text--bold text--spacing-2" href="Publishers">Publishers</a></li>
                <li><a class="text--bold text--spacing-2" href="{{ route('client.web.contact') }}">Contact</a></li>
                {{--<li><a href="{{ route('client.web.about') }}">About Us</a></li>
                <li><a href="Blog">Blog</a></li>
                <li class="has-sub">
                    <a href="#">Dropdown <i class="sub-icon fa fa-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('web.about') }}">About Us</a></li>
                    </ul>
                </li>--}}
            </ul>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <header class="site-header fixed-header" style="background: #fff">
        <div class="container expanded">
            <div class="header-wrap">
                <div class="fixed-header-logo">
                    <a href="{{ route('client.web.home') }}"><img src="{{ asset('web-assets/images/logo.png') }}" alt="{{ route('client.web.home') }}"></a>
                </div>
                <div class="is-fixed-header-logo">
                    <a href="{{ route('client.web.home') }}"><img src="{{ asset('web-assets/images/logo.png') }}" alt="{{ route('client.web.home') }}"></a>
                </div>
                <div class="header-nav">
                    <ul class="main-menu">
                        {{--<li><a href="{{ route('client.web.home') }}">Home</a></li>--}}
                        <li><a class="text--bold text--spacing-2" href="{{ route('client.web.advertisers') }}">Advertisers</a></li>
                        <li><a class="text--bold text--spacing-2" href="{{ route('client.web.publishers') }}">Publishers</a></li>
                        <li><a class="text--bold text--spacing-2" href="{{ route('client.web.contact') }}">Contact</a></li>
                        {{--<li><a href="{{ route('client.web.about') }}">About Us</a></li>
                        <li><a href="Blog">Blog</a></li>
                        <li class="menu-item-has-children"><a href="#">Dropdown</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('web.about') }}">About Us</a></li>
                            </ul>
                        </li>--}}
                    </ul>
                </div>
                <div class="header-widgets">
                    <ul class="right-menu">
                        {{--<li class="menu-item menu-search">
                            <a href="#search" id="menu-search-btn">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>--}}
                        <li class="menu-item free-quote">
                            <div class="main-pink-button">
                                <a href="{{ route('client.web.register') }}">Register</a>
                                <a href="{{ route('client.web.login') }}">Sign in</a>
                            </div>
                        </li>
                        <li class="menu-item menu-mobile-nav">
                            <a href="#" class="menu-bar" id="menu-show-mobile-nav">
                                <span class="hamburger"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Search -->
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="Type to search..." required="">
            <button type="submit" class="primary-button"><i class="fa fa-search"></i></button>
        </form>
    </div>


    <div class="main-content">
        @yield('content')
    </div>


    <section class="footer-content">
        <div class="cta-footer" style="background-color: #51924F;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Interested to get<br>our full <em>featured</em> services?</h2>
                    </div>
                    <div class="col-lg-4">
                        <div class="main-white-button">
                            <a href="{{ route('client.web.about') }}">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-heading">
                            <img src="{{ asset('web-assets/images/logo.png') }}" alt="{{ route('client.web.home') }}">
                        </div>

                        <div class="mt-5" style="text-align: center"><h4>Follow Us</h4></div>
                        <ul class="social-icons m-0" style="text-align: center">
                            <li><a class="text--bold" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="text--bold" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="text--bold" href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a class="text--bold" href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-heading"><h4>WORK WITH US</h4></div>
                                <ul class="more-info">
                                    <li><a href="{{ route('client.web.advertisers') }}">Advertisers</a></li>
                                    <li><a href="{{ route('client.web.publishers') }}">Publishers</a></li>
                                    <li><a href="{{ route('client.web.about') }}">About Us</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3">
                                <div class="footer-heading"><h4>CONTACT</h4></div>
                                <ul class="more-info">
                                    <li><a href="{{ route('client.web.contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('client.web.customerSupport') }}">Customer Support</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3">
                                <div class="footer-heading"><h4>LEARN MORE</h4></div>
                                <ul class="more-info">
                                    <li><a href="{{ route('client.web.resourcesBlog') }}">Resources &amp; Blog</a></li>
                                    <li><a href="{{ route('client.web.pressNews') }}">Press &amp; News</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3">
                                <div class="footer-heading"><h4>TERMS</h4></div>
                                <ul class="more-info">
                                    <li><a href="{{ route('client.web.terms') }}">Terms &amp; Conditions</a></li>
                                    <li><a href="{{ route('client.web.privacy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="sub-footer">
                            <p class="color--black">Copyright © {{ date('Y') }} <a href="http://www.go2topmedia.com">Go2Top Media</a>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

    <script src="{{ asset('web-assets/scripts/vendors/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/wow.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/parallax.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/isotope.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/packery-mode.pkgd.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/owl-carousel.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/jquery.appear.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/jquery.countTo.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/slide-nav.min.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/vendors/accordions.js') }}"></script>
    <script src="{{ asset('web-assets/scripts/main.js') }}"></script>

    @yield('script')
</body>
</html>
