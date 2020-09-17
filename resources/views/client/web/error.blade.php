@extends('client.layout-web')

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Error Page</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>Error Page</span>
            </div>
        </div>
    </div>
</div>

<section class="error-page">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <div class="error-container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <h1>404</h1>
                    </div>

                    <div class="col-lg-6">
                        <h4>Oops! Page Not Found!</h4>
                        <p>Shaman synth retro slow-carb. Vape taxidermy twee, putting a bird onixit fran xezen celiac unic knausgaard fingerstache.</p>
                        <div class="main-white-button">
                            <a href="{{ route('client.web.home')}}">Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
