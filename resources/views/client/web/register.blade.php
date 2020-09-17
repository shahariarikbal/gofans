@extends('client.layout-web')

@section('title')
Register - Go2Top Media
@endsection

@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Client Register</h1>
                <span><a href="{{ route('client.web.home') }}">Home</a>Register</span>
            </div>
        </div>
    </div>
</div>

<section class="contact-info m-0">
    <div class="container">
        <div class="row justify-content-center" id="tabs" >
            <div class="col-3">
                <a href="#advertisers" onclick="showForm('advertisers')" data-toggle="tab" class="nav-link active">
                    <div class="info-item advertiser regActive">
                        <div class="icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h4>Advertisers</h4>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#publishers" onclick="showForm('publishers')" data-toggle="tab" class="nav-link active">
                    <div class="info-item publisher">
                        <div class="icon">
                            <i class="fa fa-trophy"></i>
                        </div>
                        <h4>Publishers</h4>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


<section class="contact-us mt-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-pane" id="advertiser">
                    <div class="inner-content tabBody">
                    <div class="block-heading"><h4 class="text--white">Advertisers Register</h4></div>
                    <form id="register" method="post" action="{{ route('client.register') }}">
                        @csrf
                        <input name="type" type="hidden" value="advertiser">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @error('name')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="name" type="text" class="form-control" placeholder="Name">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @error('email')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="email" type="email" class="form-control" placeholder="E-Mail Address">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @error('skype_id')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="skype_id" type="text" class="form-control" placeholder="Skype ID">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @error('mobile_number')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="mobile_number" type="text" class="form-control" placeholder="Mobile number">
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                @error('password')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                            </div>

                            <input type="hidden" name="country_code">
                            <div class="col-lg-6">
                                <button type="submit" onclick="document.getElementById('register').submit();" class="">Sign Up</button>
                            </div>

                            <div class="col-lg-6">
                                <span style="float: right">
                                    Already have an account? <a href="{{ route('client.web.login') }}" class="text-custom"><b>Login</b></a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                </div>

                <div class="tab-pane" style="display: none" id="publisher">
                    <div class="inner-content tabBody">
                        <div class="block-heading"><h4 class="text--white">Publishers Register</h4></div>
                        <form id="message" action="{{ route('client.register') }}" method="post">
                            @csrf
                            <input name="type" type="hidden" value="publisher">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                    @error('name')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="email" type="email" class="form-control" placeholder="E-Mail Address">
                                    @error('email')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="skype_id" type="text" class="form-control" placeholder="Skype ID">
                                    @error('skype_id')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="mobile_number" type="text" class="form-control" placeholder="Mobile number">
                                    @error('mobile_number')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                    @error('password')
                                    <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <h4 class="text--white">I Am Interested In...*</h4>
                                </div>

                                <input type="hidden" name="country_code">

                                @foreach($interesteds as $interested)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <label class="webCheckBox">{{ $interested->title }}
                                            <input type="checkbox" name="client_interesteds[{{ $interested->id }}]">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                @endforeach
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                    <textarea name="message" style="height: 70px;" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" onclick="document.getElementById('message').submit();" class="">Sign Up</button>
                                </div>

                                <div class="col-lg-6">
                                <span style="float: right">
                                    Already have an account? <a href="{{ route('client.web.login') }}" class="text-custom"><b>Login</b></a>
                                </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
    <script>
        function showForm(type){
            if(type === 'advertisers'){
                $('#advertiser').fadeIn()
                $('#advertiser').show()
                $('#publisher').hide()
                $('.regActive').removeClass('regActive');
                $('.advertiser').addClass('regActive');
            }else if(type == 'publishers'){
                $('#publisher').fadeIn()
                $('#advertiser').hide()
                $('#publisher').show()
                $('.regActive').removeClass('regActive');
                $('.publisher').addClass('regActive');
            }else{
                $('#advertiser').hide()
                $('#publisher').hide()
                $('.regActive').removeClass('regActive');
            }
        }

        setTimeout(function(){
            $.ajax({
                type: "GET",
                url: "https://ipapi.co/country_calling_code/",
                success: function(data){
                    if (data) {
                        $("input[name='country_code']").val(data);
                        $('#countryCode').text(data);
                        $('#countryCode').show();
                    }
                }
            });
        }, 100);

    </script>
@endsection
