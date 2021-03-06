@extends('client.layout-web')

@section('title')
Go2Top Media - PRESS & NEWS
@endsection

@section('content')

    <section class="blog-page pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="blog-head-title">PRESS & NEWS</h1>
                </div>
                <div class="col-lg-8">
                    <div class="blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <a href="#"><img src="{{ asset('web-assets') }}/images/blog-item-03.jpg" alt=""></a>
                                    </div>
                                    <div class="blog-banner p-2">
                                        <a href="#">
                                        <h4 class="blog-title">ClickZ: Tapjoy offers new guide to offerwalls</h4>
                                        <h6 class="blog-title-s">March 10, 2020</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-widget recent-posts">
                                    <div class="blog-heading">
                                        <h4>MOST POPULAR</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="blog-thumb">
                                                    <img src="{{ asset('web-assets') }}/images/blog-thumb-02.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h6>15 SEO Practices Web Architecture</h6>
                                                    <span>Febuary 15, 2020</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="blog-thumb">
                                                    <img src="{{ asset('web-assets') }}/images/blog-thumb-02.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h6>Few Easy Steps For Huge Audience</h6>
                                                    <span>Febuary 15, 2020</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="blog-thumb">
                                                    <img src="{{ asset('web-assets') }}/images/blog-thumb-02.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h6>Best Resolution For Social Media</h6>
                                                    <span>Febuary 15, 2020</span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-page-second-version pb-0 mt-0">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="portfolio-filters" style="text-align: center!important;">
                    <ul>
                        <li class="blog-cat-nav active" data-filter="*">All</li>
                        <li class="blog-cat-nav" data-filter=".category-analysis">Press</li>
                        <li class="blog-cat-nav" data-filter=".category-digital">News</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg--gray pb-5">
            <div class="container">
            <div class="row">


                <div class="col-lg-12 mt-5">
                    <div class="row masonry-layout filters-content normal-col-gap">
                        <div class="col-lg-4 masonry-item all category-analysis">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 masonry-item all category-seo">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 masonry-item all category-digital">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 masonry-item all category-digital">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 masonry-item all category-analysis">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 masonry-item all category-seo">
                            <div class="case-item">
                                <div class="case-thumb">
                                    <img src="{{ asset('web-assets') }}/images/case-item-v2-01.jpg" alt="">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <h4>Get Faster &amp; Better Results</h4>
                                            <span>Analysis, Digital Marketing</span>
                                            <div class="main-purple-button">
                                                <a href="#">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="main-purple-button">
                        <a href="#">Load More Cases</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="features mb-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="web-title text--blue">MEDIA KIT</h1>
                </div>
                <div class="col-lg-4">
                    <div class="feature-item height-100">
                        <div class="icon">
                            <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/logo-mk-1.png" alt="">
                        </div>
                        <h4 class="text--blue">Company Logo</h4>

                        <div class="main-purple-button newsBtn">
                            <a href="#">Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="feature-item height-100">
                        <div class="icon">
                            <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/bios-mk.png" alt="">
                        </div>
                        <h4 class="text--blue">Executive bios and headshots</h4>
                        <div class="main-purple-button newsBtn">
                            <a href="#">Download</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="feature-item height-100">
                        <div class="icon">
                            <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/art.svg" alt="">
                        </div>
                        <h4 class="text--blue">Supplementary Artwork</h4>
                        <div class="main-purple-button newsBtn">
                            <a href="#">Download</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
