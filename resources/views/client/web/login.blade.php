@extends('client.layout-web')

@section('title')
Sign In - Go2Top Media
@endsection

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Client Login</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>Login</span>
            </div>
        </div>
    </div>
</div>

<section class="contact-us mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="inner-content">
                    @if(session('error'))
                        <div class="_alert-danger " role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @elseif(session('success'))
                        <div class="_alert-success " role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="block-heading"><h4>Login Now</h4></div>
                    <form id="LogIN" action="{{ route('client.login') }}" method="post">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @error('email')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="email" type="email" class="form-control" placeholder="E-Mail Address">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @error('password')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="col-lg-12" style="text-align: center">
                                <button onclick="document.getElementById('LogIN').submit();" type="submit">Login</button>
                            </div>

                            <div class="col-lg-12 mt-3" style="text-align: center">
                                <span>
                                    Don't have an account? <a href="{{ route('client.web.register') }}" class="text-custom"><b>Sign Up</b></a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


