@extends('client.layout-web')

@section('title')
    Customer support - Go2Top Media
@endsection

@section('content')
<div class="parallax-banner">
    <div class="inner-header">
        <div class="inner-content" style="padding-top: 150px">
            <div class="row align-items-center">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <h2 class="page--title">GOFANS CUSTOMER SUPPORT</h2>

                    <p class="text--white text-size-18 mt-3">We have outlined some of the most frequently asked questions from our gamer community to help you get the information you need. You can also follow us on our dedicated Customer Support Twitter account <a class="text--white" href="#"><u><b>@TapjoyCS</b></u></a> for top tips and a way to contact our reward specialists.</p>

                    <p class="text--white text-size-18 mt-3">Access and use of Tapjoy customer support services is governed by the <a href="#" class="text--white"><u><b>Tapjoy User Terms</b></u></a>.</p>
                </div>
                <div class="col-md-2"></div>
            </div>


        </div>
    </div>

    <div class="bg-blue mt-5">
        <div class="inner-content">
            <div class="row align-items-center">
                <div class="col-9">
                    <p style="float: right" class="text-size-18 pt-2">IF YOU HAVE A QUESTION ABOUT AN OPEN CASE, PLEASE REACH OUT TO US ON</p>
                </div>
                <div class="col-3">
                    <a href="https://twitter.com/">
                        <img class="tw-img" src="https://www.tapjoy.com/wp-content/themes/tapjoy/images/faqs/faq-twitter.svg" alt="Twitter">
                    </a>
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
                <h1 class="web-title text--blue">TOP QUESTIONS</h1>
            </div>
            <div class="col-4">
                <div class="feature-item height-100 p-2">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-1.svg" alt="">
                    </div>
                    <h4 class="text--blue">How can I submit a customer support request for an offerwall ad?</h4>
                </div>
            </div>

            <div class="col-4">
                <div class="feature-item height-100 p-2">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-2.svg" alt="">
                    </div>
                    <h4 class="text--blue">I completed an offer but didn’t get my rewards!</h4>
                </div>
            </div>

            <div class="col-4">
                <div class="feature-item height-100 p-2">
                    <div class="icon">
                        <img src="https://www.tapjoy.com/wp-content/uploads/2019/03/box-3.svg" alt="">
                    </div>
                    <h4 class="text--blue">What about phone or email support?</h4>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="clients-love slider-section p-5" style="margin: -50px 0 0 0;">
    <div class="container">
        <div class="row mt-6">

            <div class="col-lg-3">
                <h4>ALL QUESTIONS</h4>
            </div>
            <div class="col-lg-3">
                <label class="filter-label">
                    Filter Questions by:

                    <select name="faq_filter" id="faq_filter" class="faq-filter">
                        <option value="">All</option>
                        <option value="1">Denial Reasons Explained</option>
                        <option value="2">General Questions</option>
                        <option value="3">How to...</option>
                        <option value="4">Missing Rewards</option>
                        <option value="5">Technical Issues/Questions</option>
                    </select>
                </label>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mt-6" style="border-top: 1px solid #83808b;">
                    <a href="#" data-tax="1" class="faq">
                        <div class="faq-text">Can I opt out of seeing Tapjoy ads on my phone?</div>
                    </a>

                    <a href="#" data-tax="2" class="faq">
                        <div class="faq-text">How can I submit a customer support request for an offerwall ad?</div>
                    </a>

                    <a href="#" data-tax="3" class="faq">
                        <div class="faq-text">How can I submit a support request for a video ad?</div>
                    </a>

                    <a href="#" data-tax="4" class="faq">
                        <div class="faq-text">Can I opt out of seeing Tapjoy ads on my phone?</div>
                    </a>

                    <a href="#" data-tax="1" class="faq">
                        <div class="faq-text">How can I submit a customer support request for an offerwall ad?</div>
                    </a>

                    <a href="#" data-tax="5" class="faq">
                        <div class="faq-text">How can I submit a support request for a video ad?</div>
                    </a>

                    <a href="#" data-tax="5" class="faq">
                        <div class="faq-text">Can I opt out of seeing Tapjoy ads on my phone?</div>
                    </a>

                    <a href="#" data-tax="4" class="faq">
                        <div class="faq-text">How can I submit a customer support request for an offerwall ad?</div>
                    </a>

                    <a href="#" data-tax="2" class="faq">
                        <div class="faq-text">How can I submit a support request for a video ad?</div>
                    </a>

                    <a href="#" data-tax="3" class="faq">
                        <div class="faq-text">Can I opt out of seeing Tapjoy ads on my phone?</div>
                    </a>

                    <a href="#" data-tax="3" class="faq">
                        <div class="faq-text">How can I submit a customer support request for an offerwall ad?</div>
                    </a>

                    <a href="#" data-tax="4" class="faq">
                        <div class="faq-text">How can I submit a support request for a video ad?</div>
                    </a>
                </div>

                <div class="main-white-button mt-3 d-block">
                    <a href="">View All</a>
                </div>
            </div>

            <div class="col-12 mt-6">
                <h1 class="page--title" style="text-align: center">
                    HAVE ANOTHER QUESTION?
                </h1>
                <section class="features">
                <div class="row">
                    <div class="col-6">
                        <div class="feature-item height-100 p-3" style="box-shadow: 0 0 2rem rgba(0, 0, 0, 0.25);">
                            <div class="icon">
                                <img src="https://www.tapjoy.com/wp-content/themes/tapjoy/images/faqs/cs_twitter.svg" alt="">
                            </div>
                            <h4 class="text--blue">Reach out on Twitter</h4>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="feature-item height-100 p-3" style="box-shadow: 0 0 2rem rgba(0, 0, 0, 0.25);">
                            <div class="icon">
                                <img src="https://www.tapjoy.com/wp-content/uploads/2020/05/cs_submit.svg" alt="">
                            </div>
                            <h4 class="text--blue">HAVE A NEW QUESTION?</h4>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
</section>

<section class="footer-content">
    <div class="cta-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="quote-text">
                        <h4 class="title text--blue">Tapjoy User Feedback</h4>
                        <div class="title--details">”What differentiates Tapjoy is the fact they have human customer support, this is more than I can say for other reward providers. I generally receive really good rewards and customer support is responsive. Tapjoy is awesome!”</div>
                        <h4>Raj Sankla</h4>
                        <span>Tapjoy Advocate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection
