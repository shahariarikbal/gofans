@extends('client.layout-web')

@section('title')
Go2Top Media - Advertising Network For Digital World
@endsection

@section('content')
<div class="parallax-banner">
    <div class="inner-header">
        <div class="inner-content">
            <h4>what are you waiting for?</h4>
            <h1>Digital Advertising Network</h1>
            {{--<form action="#">
                <input type="text" placeholder="{{ env('APP_URL') }}" required="">
                <button>Analyze!</button>
            </form>--}}
            <div class="main-decoration mt-5">
                <img src="{{ asset('web-assets/images/baner-main-decoration.png') }}" alt="">
            </div>
        </div>
    </div>

    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
</div>

<section class="seo-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6>Advertise For Popular</h6>
                    <h2>Business Platforms</h2>
                </div>
            </div>
            <div class="col-lg-6">
                {{--<div class="main-purple-button">
                    <a href="our-shop.html">View All Courses</a>
                </div>--}}
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="owl-courses owl-carousel">
                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>sale</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Mobile App</h4>
                                    <!-- <span><em>$49.99</em>$29.99</span> -->
                                    <p>Looking for Cheapest Mobile App Advertising Network? Go2Top Media is expert here to advertise your Android or iOS app.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Youtube</h4>
                                    <!-- <span>$49.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>new</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Instagram</h4>
                                    <!-- <span>$39.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>sale</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Facebook</h4>
                                    <!-- <span><em>$49.99</em>$29.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Twitter</h4>
                                    <!-- <span>$49.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>new</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Podcast</h4>
                                    <!-- <span>$39.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>sale</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Music</h4>
                                    <!-- <span><em>$49.99</em>$29.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>sale</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Spotify</h4>
                                    <!-- <span><em>$49.99</em>$29.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="course-item">
                                <div class="course-thumb">
                                    <div class="ribon">
                                        {{--<h6>sale</h6>--}}
                                    </div>
                                    <img src="{{ asset('web-assets/images/course-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tidal</h4>
                                    <!-- <span><em>$49.99</em>$29.99</span> -->
                                    <p>Shaman synth retro slow-carb vape and dermy twee, put a jean shorts franzen.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <!-- <h6>Our Services</h6> -->
                    <h2>Features</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="service-item border-bottom border-right">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-01.png') }}" alt="">
                    </div>
                    <h4>Real Results</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-item border-bottom border-right">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-02.png') }}" alt="">
                    </div>
                    <h4>Instant Report</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-item border-bottom">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-03.png') }}" alt="">
                    </div>
                    <h4>Easy Dashboard</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-item border-right">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-04.png') }}" alt="">
                    </div>
                    <h4>Reach Real Audience</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-item border-right">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-05.png') }}" alt="">
                    </div>
                    <h4>Organize Huge Campaigns</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/service-icon-06.png') }}" alt="">
                    </div>
                    <h4>Awesome Support Team</h4>
                    <p>Shaman synth retro slow-carb an vaporlings twee, put a bird jean shorts unicorn knausgaard coloring.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="free-quote">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="web-assets/images/free-quote-left-image.png" alt="">
                </div>
            </div>

            <div class="col-lg-6 align-self-center">
                <div class="section-heading">
                    <!-- <h6>Get Free Quote</h6> -->
                    <h2>Let’s Boosts Your Business Traffic With Few Easy Steps!</h2>
                </div>

                <form action="#">
                    <div class="row">
                        <!-- <div class="col-lg-6">
                            <input type="text" id="name" placeholder="Your name..." required="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" id="email" placeholder="Your email address..." required="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" id="phone" placeholder="Your phone number..." required="">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" id="site" placeholder="http://yoursite.com" required="">
                        </div> -->
                        <div class="col-lg-12">
                            <button  onclick="location.href = '{{ route('client.web.register') }}';" class="button-bg">Get Start Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- <section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="feature-item">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/features-icon-01.png') }}" alt="">
                    </div>
                    <h4>Real Results</h4>
                    <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                </div>
                <div class="main-purple-button">
                    <a href="#">Continue Reading</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="feature-item">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/features-icon-02.png') }}" alt="">
                    </div>
                    <h4>Instant Report</h4>
                    <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                </div>
                <div class="main-purple-button">
                    <a href="#">Continue Reading</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="feature-item">
                    <div class="icon">
                        <img src="{{ asset('web-assets/images/features-icon-03.png') }}" alt="">
                    </div>
                    <h4>Easy Dashboard</h4>
                    <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                </div>
                <div class="main-purple-button">
                    <a href="#">Continue Reading</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="good-tips">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="section-heading">
                    <h6>Tips For You!</h6>
                    <h2>Get Our Clone Website to<br>Grow Your Business!</h2>
                </div>
                <div class="tips-content">
                    <ul>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('web-assets/images/features-icon-02.png') }}" alt="">
                            </div>
                            <div class="right-content">
                                <h4>User Dashboard</h4>
                                <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('web-assets/images/features-icon-03.png') }}" alt="">
                            </div>
                            <div class="right-content">
                                <h4>Admin Dashboard</h4>
                                <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="{{ asset('web-assets/images/features-icon-01.png') }}" alt="">
                            </div>
                            <div class="right-content">
                                <h4>Accept Online Payments</h4>
                                <p>Shaman synth retro slow-carb vape dermy, put and a bird jean shorts franzen unicorn knausgaard coloring book.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 align-self-center">
                <div class="right-image">
                    <img src="{{ asset('web-assets/images/good-tips-right-image.png') }}" alt="">
                </div>
            </div>

            <div class="col-lg-12 main-white-button mt-5" style="text-align: center">
                <a href="{{ route('client.web.contact') }}">Get Started Now</a>
            </div>
        </div>
    </div>
</section>

<!-- <section class="recent-cases">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Case Studies</h6>
                    <h2>Recent Cases</h2>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="portfolio-filters">
                    <ul>
                        <li class="active" data-filter="*">Show All</li>
                        <li data-filter=".category-analysis">Analysis</li>
                        <li data-filter=".category-digital">Digital Marketing</li>
                        <li data-filter=".category-seo">SEO Optimization</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row masonry-layout filters-content normal-col-gap">
                    <div class="col-lg-4 masonry-item all category-analysis">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 masonry-item all category-seo">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 masonry-item all category-digital">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 masonry-item all category-digital">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 masonry-item all category-analysis">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 masonry-item all category-seo">
                        <div class="case-item">
                            <a href="single-project.html">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Get Faster &amp; Better Results</h4>
                                    <span>Analysis, Digital Marketing</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="main-purple-button">
                    <a href="#">View All Cases</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="clients-love">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h6>Clients Love</h6>
                    <h2>Love from clients</h2>
                </div>
            </div>

            <div class="col-lg-10 offset-lg-1">
                <div class="owl-testimonials owl-carousel">
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('web-assets/images/author-01.png') }}" alt="">
                            </div>
                            <h4>James D. Lapierre</h4>
                            <span>Full-stack Designer</span>
                            <p>“Shaman synth retro slowcarbvape taxiderm twee, put a bird on it jean shorts franzen knausgaard coloring book.”</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('web-assets/images/author-01.png') }}" alt="">
                            </div>
                            <h4>Kevin L. Phipps</h4>
                            <span>General Manager</span>
                            <p>“Shaman synth retro slowcarbvape taxiderm twee, put a bird on it jean shorts franzen knausgaard coloring book.”</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('web-assets/images/author-01.png') }}" alt="">
                            </div>
                            <h4>Virgilio J. Dumas</h4>
                            <span>Full-stack Developer</span>
                            <p>“Shaman synth retro slowcarbvape taxiderm twee, put a bird on it jean shorts franzen knausgaard coloring book.”</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('web-assets/images/author-01.png') }}" alt="">
                            </div>
                            <h4>Charles K. Duckett</h4>
                            <span>Creative Director</span>
                            <p>“Shaman synth retro slowcarbvape taxiderm twee, put a bird on it jean shorts franzen knausgaard coloring book.”</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item">
                            <div class="image">
                                <img src="{{ asset('web-assets/images/author-01.png') }}" alt="">
                            </div>
                            <h4>Nicholas S. Rodriguez</h4>
                            <span>Sale Agent</span>
                            <p>“Shaman synth retro slowcarbvape taxiderm twee, put a bird on it jean shorts franzen knausgaard coloring book.”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
