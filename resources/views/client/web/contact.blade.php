@extends('client.layout-web')

@section('title')
Contact Us - Go2Top Media
@endsection

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Say Hello To Us!</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>Contact Us</span>
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
                    <p>
                        @if(!empty($contact))
                        @if($contact->email_1 || $contact->email_2)
                        <a href="#">{{ $contact->email_1 }}</a>
                        <br>
                        <a href="#">{{ $contact->email_2 }}</a>
                        @endif
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h4>Phone Number</h4>
                    <p>
                        @if(!empty($contact))
                        @if($contact->phone_number_1 || $contact->phone_number_2)
                        <a href="#">{{ $contact->phone_number_1 }}</a>
                        <br>
                        <a href="#">{{ $contact->phone_number_2 }}</a>
                        @endif
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-item">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h4>Street Address</h4>
                    @if(!empty($contact))
                    @if($contact->address)
                    <p><a href="#">{{ $contact->address }}</a></p>
                    @endif
                    @endif
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
                    @if(session('error'))
                        <div class="_alert-danger " role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @elseif(session('success'))
                        <div class="_alert-success " role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form id="message" action="{{ route('client.web.contactStore') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                @error('name')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Full Name">
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                @error('email')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="email" type="text" value="{{ old('email') }}" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address">
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                @error('subject')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="subject" type="text" value="{{ old('subject') }}" class="form-control" id="subject" placeholder="Subject">
                            </div>
                            <div class="col-lg-12">
                                @error('message')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <textarea name="message" rows="6" class="form-control" id="your-message" placeholder="Your Message">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <button onclick="document.getElementById('message').submit();" type="submit" class="filled-button">Send Message Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if(!empty($contact))
@if($contact->map)
<section class="map">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <div class="block-heading"><h4>Find Us On Map</h4></div>
                    <div id="map">
                        <iframe src="{{ $contact->map }}" style="border:0; width: 100%; height: 400px; border: none; border-radius: 10px;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endif
@endsection
