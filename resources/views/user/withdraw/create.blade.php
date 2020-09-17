@extends('user.layout')

@section('title')
    Withdraw | Payments
@endsection

@section('page_title')
    Withdraw Payments
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Withdraw Payments</li>
@endsection


@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Withdraw Payment</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('user.dashboard') }}">
                            <button class="btn btn-circle btn-info text-white">
                                <i class="ti-arrow-left"></i>
                            </button>
                            <span class="ml-2 font-normal text-dark">Back</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-7 col-xs-12">
                <form  action="{{ route('withdraw.store') }}" method="post" novalidate>
                    @csrf
                    @if($userPoint <= 0)
                        <div class="alert alert-danger alert-rounded">
                            <i class="fa fa-question-circle"></i> Your have {{ $userPoint }} points.
                        </div>
                    @else
                        <div class="alert alert-info alert-rounded">
                            Your earned coins: <span id="point">{{ $userPoint }}</span><br>
                            Maximum withdraw-able amount: ${{ round($totalAmount, 2) }}
                        </div>
                    @endif
                    <div class="material-card card">
                        <div class="card-body">

                            <div class="form-group">
                                <h5>USD<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" id="totalAmount" name="withdraw_amount" value="{{ old('withdraw_amount') }}" class="form-control{{ $errors->has('withdraw_amount') ? ' is-invalid' : '' }}" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @if ($errors->has('withdraw_amount'))
                                        <span class="text-danger">{{ $errors->first('withdraw_amount') }}</span>
                                    @endif
                                    <span style="display: none" id="message" class="text-danger"></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <h5>Select Payment Method<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="payment_method" id="paymentMethod" class="form-control{{ $errors->has('payment_method') ? ' is-invalid' : '' }}">
                                        <option value="">-- Select Method --</option>
                                        <option value="PayTM" {{ old('payment_method') == 'PayTM' ? 'selected':'' }} >PayTM</option>
                                        <option value="Bkash" {{ old('payment_method') == 'Bkash' ? 'selected':'' }}>Bkash</option>
                                        <option value="Skrill" {{ old('payment_method') == 'Skrill' ? 'selected':'' }}>Skrill</option>
                                        <option value="PayPal" {{ old('payment_method') == 'PayPal' ? 'selected':'' }}>PayPal</option>
                                        <option value="Perfect Money" {{ old('payment_method') == 'Perfect Money' ? 'selected':'' }}>Perfect Money</option>
                                        <option value="Webmoney" {{ old('payment_method') == 'Webmoney' ? 'selected':'' }}>Webmoney</option>
                                    </select>
                                    @if ($errors->has('payment_method'))
                                        <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div style="display: none" class="form-group" id="paymentID">
                                <h5> <span id="title"></span><span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <div class="input-group mb-3">
                                        <input type="text" name="payment_id" value="{{ old('payment_id') }}" class="form-control{{ $errors->has('payment_id') ? ' is-invalid' : '' }}">
                                    </div>
                                    @if ($errors->has('payment_id'))
                                        <span class="text-danger">{{ $errors->first('payment_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" id="submit" disabled class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-inverse">Reset</button>
                    </div>
                </form>

            </div>
            <div class="col-lg-5 col-md-5 col-xs-12">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white">
                        <h3 class="card-title"><i class="fa fa-cogs"></i> Additional Information</h3>
                    </div>
                    <div class="card-body" >
                        <h3 id="category-description">
                            Minimum withdraw amount: ${{$minimumAmount}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
<script>
    function calculatePoint(amount){
        let amnt = parseInt(amount);
        let userPoint = "{{ $userPoint }}";
        var point = (amnt*1000);
        var fPoint = parseInt(userPoint) - point;
        if(fPoint <= 0){
            $("#point").text(0);
            alert('Not sufficient your points.')
        }else{
            $("#point").text(fPoint);
        }
        if (amount === ''){
            $("#point").text(userPoint);
        }
    }
    $(document).ready(function(){
        $("#totalAmount").on("change paste keyup", function() {
            let totalAmount = "{{ round($totalAmount, 2) }}";
            let thisAmount = $("#totalAmount").val();
            $("#withdrawAmount").text(thisAmount);
            calculatePoint(thisAmount);

            let minAmo =  parseInt("{{ $minimumAmount }}");
            let maxAmo = parseInt("{{ $maximumAmount }}");

            if(thisAmount < minAmo){
                var message = "You can't this amount. Minimum withdraw $"+minAmo;
                $("#message").text(message);
                $("#message").show();
                $("#submit").prop('disabled', true);
            }else if(thisAmount > maxAmo){
                var message = "You can't this amount. Maximum withdraw $"+maxAmo;
                $("#message").text(message);
                $("#message").show();
                $("#submit").prop('disabled', true);
            }else if(totalAmount < minAmo){
                var message = "You can't withdraw this amount. Your current balance is: "+ totalAmount;
                $("#message").text(message);
                $("#message").show();
                $("#submit").prop('disabled', true);
            }else {
                $("#message").hide();
                $("#submit").prop('disabled', false);
            }
        });

        $('#paymentMethod').on('change', function() {
            let paymentMethod = this.value;
            if (paymentMethod === "PayTM"){
                let MethodTitle = 'PayTM Number';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else if (paymentMethod === "Bkash"){
                let MethodTitle = 'Personal bKash Number';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else if (paymentMethod === "Skrill"){
                let MethodTitle = 'Skrill ID';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else if (paymentMethod === "PayPal"){
                let MethodTitle = 'PayPal Email';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else if (paymentMethod === "Perfect Money"){
                let MethodTitle = 'USD ID';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else if (paymentMethod === "Webmoney"){
                let MethodTitle = 'Wmid or email';
                $('#title').text(MethodTitle);
                $('#paymentID').show();
            }else{
                $('#paymentID').hide();
            }
        });
    });
</script>
@endsection
