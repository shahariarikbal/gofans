@extends('user.layout-web')

@section('content')

    <div class="ext-gap bluesh high-opacity">
        <div class="content-bg-wrap" style="background: url({{ asset('goweb/images/resources/animated-bg2.png') }})"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-banner">
                        <h1>404</h1>
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="{{ route('web.home') }}">Home</a>
                            <span class="breadcrumb-item active">error</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="gap100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-eror">
                            <img src="{{ asset('goweb/images/resources/404.svg') }}" alt="">
                            <div class="error-meta">
                                <h1>whoops! 404</h1>
                                <span>we couldn't find that page </span>
                                <a href="{{ route('web.home') }}" title="" data-ripple="">Go Back Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

