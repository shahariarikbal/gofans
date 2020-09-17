@extends('client.layout-web')

@section('title')
Advertisers - Go2Top Media
@endsection

@section('content')
<div class="parallax-banner">
    <div class="inner-header">
        <div class="inner-content" style="padding-top: 150px">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="text-info">IN-APP ADVERTISING</h4>
                    <h2 class="text-left">CONNECT WITH YOUR IDEAL MOBILE CUSTOMERS</h2>

                    <div class="main-white-button mt-5">
                        <a href="{{ route('client.web.register') }}">Contact Us</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-decoration mt-5">
                        <img src="{{ asset('web-assets/images/avb.png') }}" alt="">
                    </div>
                </div>
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

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="web-title text--blue">WHAT YOU CAN ACHIEVE</h1>
            </div>
            <div class="col-lg-4">
                <div class="feature-item height-100">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-1.svg" alt="">
                    </div>
                    <h4 class="text--blue">ENGAGE USERS WHO CONVERT</h4>
                    <p>We measure behaviors like video completion, ad engagement, in-app purchases and long term retention to ensure your ads are delivered to the users that will fuel growth for your business.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="feature-item height-100">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-2.svg" alt="">
                    </div>
                    <h4 class="text--blue">REACH EXCLUSIVE AUDIENCES</h4>
                    <p>The world's top mobile gaming publishers work with Tapjoy. Our proprietary targeting and data capabilities provide advertisers with specialized access to the highest quality mobile audiences around the world.</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="feature-item height-100">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-3.svg" alt="">
                    </div>
                    <h4 class="text--blue">PRIORITIZE RETURN ON AD SPEND</h4>
                    <p>Stop paying for users who don't generate real value for your business. Our performance marketing campaigns let you streamline channel management and reduce overhead by paying only for users who hit engagement and monetization milestones.</p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="clients-love slider-section p-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="web-title text--blue">AD GALLERY</h1>
                <p>Take a look at some examples of how our ads appear in-app. Our award winning digital creative team knows what it takes to suceed in mobile advertising.</p>
            </div>

            <div class="col-lg-12 mt-3">
                <div class="owl-testimonials owl-carousel">
                    <div class="item">
                        <div class="testimonial-item p-0" style="box-shadow: none">
                            <img class="slider-image" src="https://www.tapjoy.com/wp-content/uploads/2019/04/phoneGrey_kdking.png">
                            <p>THE KID WHO WOULD BE KING AD / PLAYABLE</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item p-0" style="box-shadow: none">
                            <img class="slider-image" src="https://www.tapjoy.com/wp-content/uploads/2019/04/phoneGrey_kdking.png">
                            <p>THE KID WHO WOULD BE KING AD / PLAYABLE</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item p-0" style="box-shadow: none">
                            <img class="slider-image" src="https://www.tapjoy.com/wp-content/uploads/2019/04/phoneGrey_kdking.png">
                            <p>THE KID WHO WOULD BE KING AD / PLAYABLE</p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial-item p-0" style="box-shadow: none">
                            <img class="slider-image" src="https://www.tapjoy.com/wp-content/uploads/2019/04/phoneGrey_kdking.png">
                            <p>THE KID WHO WOULD BE KING AD / PLAYABLE</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer-content">
    <div class="cta-footer" style="background-color: #73AC6A">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-1">
                    <h2><em>INTERPLAY</em>STUDIO</h2>
                    <p class="text--white">Need help designing impactful mobile ad campaigns? Learn more about the Interplay Studio.</p>
                </div>
                <div class="col-lg-4">
                    <div class="main-white-button">
                        <a href="">LEARN MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="clients-love client-section p-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="web-title text--blue">WORKING WITH THE BEST</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/logo-1.png">
            </div>

            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/adidas-logo.png">
            </div>

            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/20-century-fox.png">
            </div>

            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/epic-logo.png">
            </div>

            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/hothead-logo.png">
            </div>

            <div class="col-lg-2">
                <img class="client-logo" src="https://www.tapjoy.com/wp-content/uploads/2019/04/gilette-logo.png">
            </div>
        </div>
    </div>
</section>

<section class="portfolio-page-third-version mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-3">
                <h1 class="web-title text--blue">RELATED ARTICLES</h1>
            </div>
            <div class="col-lg-12">
                <div class="row masonry-layout filters-content normal-col-gap">
                    <div class="col-lg-4 masonry-item all category-analysis">
                        <div class="case-item">
                            <div class="case-thumb">
                                <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                            </div>
                            <div class="down-content height-100">
                                <div class="icon">
                                    <div class="main-purple-button mt-1">
                                        <a style="padding: 5px 25px;" href=""> Read More</a>
                                    </div>
                                </div>
                                <h4>The Modern Mobile Gamer – Personas 2019 Ebook</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 masonry-item all category-seo">
                        <div class="case-item">
                            <div class="case-thumb">
                                <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                            </div>
                            <div class="down-content height-100">
                                <div class="icon">
                                    <div class="main-purple-button mt-1">
                                        <a style="padding: 5px 25px;" href=""> Read More</a>
                                    </div>
                                </div>
                                <h4>What Is CPCV Advertising? The Cost Per Completed View Basics</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 masonry-item all category-digital">
                        <div class="case-item">
                            <div class="case-thumb">
                                <img src="{{ asset('web-assets/images/case-item-01.jpg') }}" alt="">
                            </div>
                            <div class="down-content height-100">
                                <div class="icon">
                                    <div class="main-purple-button mt-1">
                                        <a style="padding: 5px 25px;" href=""> Read More</a>
                                    </div>
                                </div>
                                <h4>Tapjoy Ranked As Top 10 Media Source In 2019 Singular ROI Index</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@section('script')

@endsection
