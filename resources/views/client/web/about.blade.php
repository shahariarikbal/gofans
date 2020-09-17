@extends('client.layout-web')

@section('title')
About Us - Go2Top Media
@endsection

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>About Us</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>About Us</span>
            </div>
        </div>
    </div>
</div>

<section class="steps">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="step-item">
                    <div class="item-number">
                        <h6>01</h6>
                    </div>
                    <div class="item-content">
                        <h4>First Step</h4>
                        <p>Shaman synthes retro slow carb vape twee, put a bird.</p>
                    </div>
                    <div class="item-arrow">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="step-item">
                    <div class="item-number">
                        <h6>02</h6>
                    </div>
                    <div class="item-content">
                        <h4>Second Step</h4>
                        <p>Shaman synthes retro slow carb vape twee, put a bird.</p>
                    </div>
                    <div class="item-arrow">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="step-item">
                    <div class="item-number">
                        <h6>03</h6>
                    </div>
                    <div class="item-content">
                        <h4>Third Step</h4>
                        <p>Shaman synthes retro slow carb vape twee, put a bird.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-tips">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h6>TIPS FOR YOU!</h6>
                    <h2>Get Tips &amp; Tricks About How To Grow Your Business!</h2>
                </div>
                <p>Taiyaki single-origin coffee iceland, skateboard chambray 3 wolf moon vice marfa hammock. Man braid prism post-ironic kickstarter affogato. 3 wolf moon succulents quinoa, keffiyeh keytar swag woke cliche cold-pressed drinking vinegar. Squid blue bottle farm-to-table hammock palo santo pug. Banjo af affogato, typewriter franzen biodiesel bitters poke  bespoke.<br><br>Cronut chillwave dreamcatcher, franzen lomo poutine gluten-free four loko. Offal locavore selvage scenester fixie crucifix tbh DIY mlkshk vice iceland meh taxidermy. Fixie hell of ethical air plant aesthetic.</p>
                <!-- <div class="main-pink-button">
                    <a href="#">All Our Services</a>
                </div> -->
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="video-thumb">
                    <a href="http://youtube.com/"><i class="fa fa-play"></i></a>
                    <img src="{{ asset('web-assets/images/video-thumb.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h6>Our Skills</h6>
                    <h2>Why Choose Us?</h2>
                </div>
            </div>

            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="{{ asset('web-assets/images/skills-left-image.png') }}" alt="">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-5">
                        <div class="skill-item">
                            <div class="skill-box">
                                <div class="skills-circle">
                                    <ul>
                                        <li data-percent="80"><span class="bar-circle-right"></span><span class="bar-circle-left"></span><span class="bar-circle-cover"></span><b></b></li>
                                        <li data-percent="94"><span class="bar-circle-right"></span><span class="bar-circle-left"></span><span class="bar-circle-cover"></span><b></b></li>
                                        <li data-percent="76"><span class="bar-circle-right"></span><span class="bar-circle-left"></span><span class="bar-circle-cover"></span><b></b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-7">
                        <div class="skills-info">
                            <ul>
                                <li>
                                    <h4>Drawing Scatch Ideas</h4>
                                    <p>Shaman synth retro slow-carb vape  dermy twee, put a bird jean shorts franzen.</p>
                                </li>
                                <li>
                                    <h4>Creating Actual View</h4>
                                    <p>Shaman synth retro slow-carb vape  dermy twee, put a bird jean shorts franzen.</p>
                                </li>
                                <li>
                                    <h4>Developing Functinal</h4>
                                    <p>Shaman synth retro slow-carb vape  dermy twee, put a bird jean shorts franzen.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="fun-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="count-area-content">
                    <div class="count-digit first-digit">5000</div>
                    <div class="count-title">Campaigns Completed</div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="count-area-content">
                    <div class="count-digit second-digit">500</div>
                    <div class="count-title">Running Campaigns</div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="count-area-content">
                    <div class="count-digit third-digit">150</div>
                    <div class="count-title">Happy Clients</div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="count-area-content">
                    <div class="count-digit fourth-digit">1000</div>
                    <div class="count-title">Audience Pool</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h6>Our Team</h6>
                    <h2>Meet Our Members</h2>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-item">
                    <div class="team-thumb">
                        <div class="hover-effect">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{ asset('web-assets/images/member-01.jpg') }}" alt="">
                    </div>

                    <div class="down-content">
                        <h4>Donald K. Huff</h4>
                        <span>Main Director</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-item">
                    <div class="team-thumb">
                        <div class="hover-effect">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{ asset('web-assets/images/member-01.jpg') }}" alt="">
                    </div>

                    <div class="down-content">
                        <h4>Linda D. Bellows</h4>
                        <span>Web Developer</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-item">
                    <div class="team-thumb">
                        <div class="hover-effect">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{ asset('web-assets/images/member-01.jpg') }}" alt="">
                    </div>

                    <div class="down-content">
                        <h4>Catherine M. Cole</h4>
                        <span>Creative Director</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-item">
                    <div class="team-thumb">
                        <div class="hover-effect">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{ asset('web-assets/images/member-01.jpg') }}" alt="">
                    </div>

                    <div class="down-content">
                        <h4>David S. Scott</h4>
                        <span>General Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
