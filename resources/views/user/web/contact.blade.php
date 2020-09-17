@extends('user.layout-web')

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Say Hello To Us!</h1>
                <span><a href="{{ route('web.home') }}">Home</a>Contact Us</span>
            </div>
        </div>
    </div>
</div>

<section class="contact-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="info-item">
                    <div class="icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h4>Email Address</h4>
                    <p><a href="#">contact@oxana.com</a><br><a href="#">info@oxana.com</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h4>Phone Number</h4>
                    <p><a href="#">+1 547 6877 534</a><br><a href="#">001 547 6877 534</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h4>Street Address</h4>
                    <p><a href="#">342 Better Street<br>Peculiar, KS 64078</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <div class="block-heading"><h4>Say Hello To Us!</h4></div>
                    <form id="message" action="#" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                            </div>
                            <div class="col-lg-12">
                                <textarea name="your-message" rows="6" class="form-control" id="your-message" placeholder="Your Message" required=""></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" id="form-submit" class="filled-button">Send Message Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="map">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <div class="block-heading"><h4>Find Us On Map</h4></div>
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23481.794658246406!2d21.09932224141022!3d42.635403966818785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549de02b95feb3%3A0x40df47fa2a0e9612!2sPrishtina!5e0!3m2!1sen!2s!4v1504188040281" style="border:0; width: 100%; height: 400px; border: none; border-radius: 10px;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection