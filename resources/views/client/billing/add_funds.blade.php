@extends('client.layout')

@section('title')
    Billing | Add Funds
@endsection

@section('page_title')
    Add Funds
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Add Funds</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Add Funds</h3>
            </div>
            <div class="col-sm-12 col-md-6">
                <ul class="list-inline dl mb-0 float-left float-md-right">
                    <li class="list-inline-item text-info mr-3">
                        <a href="{{ route('client.dashboard') }}">
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
            <div class="col-md-12 col-lg-7">
                <div class="card">
                    <div class="card-header bg-gradient-success text-white">
                        <h4 class="card-title"><i class="fa fa-money-bill-alt"></i> Select your payment method</h4>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4">
                                <button style="padding: 8px!important;" class="btn btn-block btn-info btn-lg" type="button" onclick="showCard('PayPal')"><i class="fab fa-paypal" aria-hidden="true"></i> Paypal</button>
                            </div>

                            <div class="col-md-4">
                                <button style="padding: 8px!important;" class="btn btn-block btn-primary btn-lg" type="button" onclick="showCard('AmarPay')"><i class="fa fa-credit-card"></i> AmarPay</button>
                            </div>

                            <div class="col-md-4">
                                <button style="padding: 8px!important;" class="btn btn-block btn-success btn-lg" type="button" onclick="showCard('PerfectMoney')"><i class="fa fa-credit-card"></i> PerfectMoney</button>
                            </div>

                            <div class="col-md-4 mt-3">
                                <button style="padding: 8px!important;" class="btn btn-block btn-warning text-white btn-lg" type="button" onclick="showCard('PayTM')"><i class="fa fa-briefcase"></i> PayTM</button>
                            </div>

                            <div class="col-md-4 mt-3">
                                <button style="padding: 8px!important;" class="btn btn-block text-white btn-cyan btn-lg" type="button" onclick="showCard('CoinBase')"><i class="fa fa-briefcase"></i> CoinBase</button>
                            </div>

                            <div class="col-md-4 mt-3">
                                <button style="padding: 8px!important;" class="btn btn-block  btn-danger btn-lg" type="button" onclick="showCard('WireTransfer')"><i class="fa fa-briefcase"></i> Wire Transfer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card paypalCard"style="display: none" >
                    <div class="card-header bg-gradient-info text-white">
                        <h4 class="card-title"><i class="fab fa-paypal"></i> Paypal</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"><strong>Balance (USD)</strong></div>
                            <div class="col-md-6 text-center">
                                <input type="range" value="100"  min="10" max="1000" step="1" class="slider" id="paypalVal">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input min="10" max="1000" value="100" step="1" class="form-control paypalAmount" type="number" name="paypalAmount">
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <span>Use the slider to adjust the amount you want to purchase</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <span>Advertiser Budget: &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="paypalBudget">$100</span>
                            </div>
                            <div class="col-md-6">
                                <span>Price (incl. 0% VAT): &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="paypalVat">$100.00</span>
                            </div>
                        </div>

                        <div class="footer-btn mt-3">
                            <div class="text-center">
                                <button class="btn btn-info btn-lg" type="button"><i class="fab fa-paypal" aria-hidden="true"></i> Pay with Paypal <i class="fa fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card skrillCard" style="display: none">
                    <div class="card-header bg-gradient-primary text-white">
                        <h4 class="card-title"><i class="fa fa-credit-card"></i> AmarPay</h4>
                    </div>

                    <div class="card-body">
                    <form action="{{ route('client.amarPay') }}" method="post">
                        @csrf
                           <input type="hidden" name="cus_name" value="{{auth()->user()->name}}">
                           <input type="hidden" name="cus_email" value="{{auth()->user()->email}}">
                           <input type="hidden" name="cus_phone" value="{{auth()->user()->mobile_number}}">
                            <div class="row">
                                <div class="col-md-3"><strong>Balance (USD)</strong></div>
                                <div class="col-md-6 text-center">
                                    <input type="range" value="100"  min="10" max="1000" step="1" class="slider" id="skrillVal">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input min="10" max="1000" value="100" step="1" class="form-control paypalAmount" type="number" name="amount">
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <span>Use the slider to adjust the amount you want to purchase</span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <span>Advertiser Budget: &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="skrillBudget">$100</span>
                                </div>
                                <div class="col-md-6">
                                    <span>Price (incl. 0% VAT): &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="skrillVat">$100.00</span>
                                </div>
                            </div>
                            <div class="footer-btn mt-3">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay with AmarPay <i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card PerfectMoneyCard" style="display: none">
                    <div class="card-header bg-gradient-success text-white">
                        <h4 class="card-title"><i class="fa fa-credit-card"></i> PerfectMoney</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"><strong>Balance (USD)</strong></div>
                            <div class="col-md-6 text-center">
                                <input type="range" value="100"  min="10" max="1000" step="1" class="slider" id="PerfectMoneyVal">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input min="10" max="1000" value="100" step="1" class="form-control paypalAmount" type="number" name="PerfectMoneyAmount">
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <span>Use the slider to adjust the amount you want to purchase</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <span>Advertiser Budget: &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="PerfectMoneyBudget">$100</span>
                            </div>
                            <div class="col-md-6">
                                <span>Price (incl. 0% VAT): &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="PerfectMoneyVat">$100.00</span>
                            </div>
                        </div>

                        <div class="footer-btn mt-3">
                            <div class="text-center">
                                <button class="btn btn-success btn-lg" type="button"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay with PerfectMoney <i class="fa fa-share"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card PayTMCard" style="display: none">
                    <div class="card-header bg-gradient-warning text-white">
                        <h4 class="card-title"><i class="fa fa-credit-card"></i> PayTM</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('client.payTmPayment')}}" method="post"> @csrf
                            <div class="row">
                                <div class="col-md-3"><strong>Balance (USD)</strong></div>
                                <div class="col-md-6 text-center">
                                    <input type="range" value="100"  min="10" max="1000" step="1" class="slider" id="PayTMVal">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input min="10" max="1000" value="100" step="1" class="form-control paypalAmount" type="number" name="PayTMAmount">
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <span>Use the slider to adjust the amount you want to purchase</span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <span>Advertiser Budget: &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="PayTMBudget">$100</span>
                                </div>
                                <div class="col-md-6">
                                    <span>Price (incl. 0% VAT): &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="PayTMVat">$100.00</span>
                                </div>
                            </div>

                            <div class="footer-btn mt-3">
                                <div class="text-center">
                                <button class="btn btn-warning btn-lg"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay with PayTM <i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card CoinBaseCard" style="display: none">
                    <div class="card-header bg-gradient-cyan text-white">
                        <h4 class="card-title"><i class="fa fa-credit-card"></i> CoinBase</h4>
                    </div>

                    <div class="card-body">
                    <form action="{{route('client.coinbasePayment')}}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-3"><strong>Balance (USD)</strong></div>
                                <div class="col-md-6 text-center">
                                    <input type="range" value="100"  min="10" max="1000" step="1" class="slider" id="CoinBaseVal">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input min="10" max="1000" value="100" step="1" class="form-control paypalAmount" type="number" name="CoinBaseAmount">
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <span>Use the slider to adjust the amount you want to purchase</span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <span>Advertiser Budget: &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="CoinBaseBudget">$100</span>
                                </div>
                                <div class="col-md-6">
                                    <span>Price (incl. 0% VAT): &nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="CoinBaseVat">$100.00</span>
                                </div>
                            </div>

                            <div class="footer-btn mt-3">
                                <div class="text-center">
                                    <button class="btn btn-cyan btn-lg" type="submit"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay with CoinBase <i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card transferCard" style="display: none">
                    <div class="card-header bg-gradient-danger text-white">
                        <h4 class="card-title"><i class="fa fa-briefcase"></i> Wire Transfer</h4>
                    </div>
                    <div class="card-body" id="fund-request">
                        <p class="text-justify">
                            We accept wire transfers for transaction amounts greater than <strong>$500</strong>. This payment option is not instant and advertising budget will be credited to your account after the funds are credited to our bank account. Depending on your country of origin it might take some days until payment providers process a cross-border wire transfer. Please reach out to your account manager to receive our bank details.
                        </p>
                        {{--  action="{{route('client.sendFundRequest')}}" --}}
                        <form  @submit="submitFundRequest" id="fund-request-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="my-input">Amount <span class="text-danger">*</span></label>
                                <input id="my-input" class="form-control" v-model="fund_amount" type="number" name="fund-amount" required>
                            <p class="text-danger" v-if="fund_amount===null">@{{fund_amount_validation_msg}}</p>
                            </div>
                            <div class="form-group">
                            <label for="my-input">Remarks @{{fund_remarks}}</label>
                                <textarea name="remarks" class="form-control" id="" v-model="fund_remarks" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group file-area">
                                <input id="form-file" class="form-control input-file" type="file"
                                multiple="multiple">
                                <div class="file-dummy">
                                    <p class="success">Attachments</p>
                                    <p class="default">Click to select files</p>
                                </div>
                                <small><strong>Note: (pdf/jpeg/png types are supported)</strong> </small>
                                <div class="file_previews">
                                    <ul>
                                        <li v-for="f in previewFiles" class="d-flex justify-content-between">
                                            <div class="icon-holder">
                                                <i class="fas fa-file-pdf" style="font-size:100px" v-if="f.type === 'application/pdf'"></i>
                                                <i class="fas fa-file-word" style="font-size:100px" v-if="f.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'"></i>
                                                <i class="far fa-file-excel" style="font-size:100px" v-if="f.type === 'application/vnd.ms-excel'"></i>
                                                <img :src="f.file" v-if="f.type === 'image/jpeg' || f.type === 'image/png'" alt="f.name">
                                            </div>
                                            <div class="content-holder">
                                                <a href="f.file">@{{f.name}}</a>
                                            </div>
                                            <div class="content-holder">
                                                <button type="button" @click="removeItem(f)" class="btn btn-sm btn-danger">X</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Send Request <i class="far fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title"><i class="fa fa-life-ring"></i> Additional Information</h4>
                            </div>
                            <div class="col-md-1">
                                <div class="text-right">
                                    <i  class="fa fa-chevron-down" data-toggle="collapse" href="#FAQ" role="button" aria-expanded="false" aria-controls="collapseExample"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="collapse show" id="FAQ">
                        <div class="card-body text-justify">
                            <h4>Payment methods</h4>
                            <p>
                                We currently support PayPal, Skrill and wire transfer as payment methods. PayPal and Skrill are automated and advertising budget will be credited to your account balance instantly when using either of these two options. You are able to add a variable budget between $10 and $1,000. Additionally, you’ll find an invoice for your purchases in the billing section right after the transaction has been completed. For further information on wire transfers please see the text below. Advertising budget can be split among multiple campaigns and doesn’t expire.
                            </p>
                            <h4>Tax Information</h4>
                            <p>Country specific VAT is applied at checkout for the following purchases:</p>
                            <ul>
                                <li>Customers from Germany</li>
                                <li>Private customers from the European Union</li>
                                <li>Companies from the European Union without valid Vat No. (Value Added Tax Identification Number)*</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_css')
    <style>
        .paypalAmount{
            margin-top: -10px;
        }
        .footer-btn{
            padding: 20px 10px;
            margin: 0;
            background-color: #f5f5f5;
            border-top: 1px solid #e5e5e5;
        }
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        /* wire transfar css */
        .file-area
        {
            width: 100%;
            position: relative;
        }
        .input-file{
            width: 100%;
            height: 60%;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            cursor: pointer;
        }
        .file-dummy{
            width: 100%;
            padding: 30px;
            background: rgba(185, 175, 175, 0.2);
            border: 2px dashed rgb(47, 28, 28);
            text-align: center;
            transition: background 0.3s ease-in-out;
        }
        .file-dummy .success{
            display: none;
        }
         .file-dummy:hover {
            background: rgba(255,255,255,0.1);
        }
        .input-file:focus + .file-dummy {
            outline: 2px solid blue;
            outline: -webkit-focus-ring-color auto 5px;
        }
        .input-file:valid + .file-dummy {
        border-color: rgba(0,255,0,0.4);
        background-color: rgba(0,255,0,0.3);
        }
        .input-file:valid + .file-dummy .success{
            display: inline-block;
        }
        .input-file:valid + .file-dummy .default{
            display: none;
        }
        .file_previews{
            padding: 20px;
            background: rgb(255, 255, 255);
        }
        .file_previews ul li{
            padding: 20px;
            border:2px dashed rgba(185, 175, 175, 0.2);
        }
        .file_previews .icon-holder{
            width: 100px;
            height: 100px;
        }
        .file_previews .icon-holder img{
             width: 100%;
        }
        .file_previews .content-holder{
             padding: 50px 0px;
        }
        /* End wire transfar css */
    </style>
@endsection

@section('page_js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>


    function showCard(e){
        if(e === "PayPal"){
            $(".paypalCard").show();
            $(".skrillCard").hide();
            $(".transferCard").hide();
            $(".PerfectMoneyCard").hide();
            $(".PayTMCard").hide();
            $(".CoinBaseCard").hide();
        }else if (e === "AmarPay"){
            $(".paypalCard").hide();
            $(".skrillCard").show();
            $(".transferCard").hide();
            $(".PerfectMoneyCard").hide();
            $(".PayTMCard").hide();
            $(".CoinBaseCard").hide();
        }else if (e === "PerfectMoney"){
            $(".paypalCard").hide();
            $(".skrillCard").hide();
            $(".transferCard").hide();
            $(".PerfectMoneyCard").show();
            $(".PayTMCard").hide();
            $(".CoinBaseCard").hide();
        }else if (e === "PayTM"){
            $(".paypalCard").hide();
            $(".skrillCard").hide();
            $(".transferCard").hide();
            $(".PerfectMoneyCard").hide();
            $(".PayTMCard").show();
            $(".CoinBaseCard").hide();
        }else if (e === "CoinBase"){
            $(".paypalCard").hide();
            $(".skrillCard").hide();
            $(".transferCard").hide();
            $(".PerfectMoneyCard").hide();
            $(".PayTMCard").hide();
            $(".CoinBaseCard").show();
        }else if (e === "WireTransfer"){
            $(".paypalCard").hide();
            $(".skrillCard").hide();
            $(".transferCard").show();
            $(".PerfectMoneyCard").hide();
            $(".PayTMCard").hide();
            $(".CoinBaseCard").hide();
        }else{

        }
    }

    $(document).ready(function(){
        $(document).on('input', '#paypalVal', function() {
            var paypalVal = $(this).val();
            $("input[name='paypalAmount']").val(paypalVal);
            $("#paypalBudget").html("$"+paypalVal);
            $("#paypalVat").html("$"+paypalVal+".00");
        });

        $(document).on('input', '#skrillVal', function() {
            var skrillVal = $(this).val();
            $("input[name='amount']").val(skrillVal);
            $("#skrillBudget").html("$"+skrillVal);
            $("#skrillVat").html("$"+skrillVal+".00");
        });

        $(document).on('input', '#PerfectMoneyVal', function() {
            var PerfectMoneyVal = $(this).val();
            $("input[name='PerfectMoneyAmount']").val(PerfectMoneyVal);
            $("#PerfectMoneyBudget").html("$"+PerfectMoneyVal);
            $("#PerfectMoneyVat").html("$"+PerfectMoneyVal+".00");
        });

        $(document).on('input', '#PayTMVal', function() {
            var PayTMVal = $(this).val();
            $("input[name='PayTMAmount']").val(PayTMVal);
            $("#PayTMBudget").html("$"+PayTMVal);
            $("#PayTMVat").html("$"+PayTMVal+".00");
        });

        $(document).on('input', '#CoinBaseVal', function() {
            var CoinBaseVal = $(this).val();
            $("input[name='CoinBaseAmount']").val(CoinBaseVal);
            $("#CoinBaseBudget").html("$"+CoinBaseVal);
            $("#CoinBaseVat").html("$"+CoinBaseVal+".00");
        });
    });

    // wire transfer section
    let app = new Vue({
                el: '#fund-request',
                data:{
                    previewFiles:[],
                    storedFile:[],
                    fund_amount:null,
                    fund_amount_validation_msg:'',
                    fund_remarks:'',
                },
                methods: {
                    submitFundRequest(evt){
                        evt.preventDefault();
                        let formData = document.getElementById('fund-request-form');
                        let myForm = new FormData(formData);
                        if(this.previewFiles.length !== 0)
                        {
                            this.previewFiles.forEach(ff=>{
                                myForm.append('fund-attachment[]',ff.file_data,ff.name);
                            });
                        }
                        if(this.fund_amount!==null)
                        {
                            fetch('{{route("client.sendFundRequest")}}',{
                            headers:{
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            },
                            credentials: "same-origin",
                            method:"POST",
                            body: myForm
                            }).then(res=>res.json())
                            .then(res=>{
                                if(res.status === 200)
                                {
                                    this.previewFiles =[];
                                    this.fund_amount = null;
                                    this.fund_remarks = '';
                                    toastr.success(res.message, 'Successful.. !!', {
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut",
                                    "progressBar": true,
                                    timeOut: 3000
                                    });
                                }

                            });
                        }
                        else
                        {
                            this.fund_amount_validation_msg = "Amount field is required";
                        }

                    },
                    removeItem(item)
                    {
                        this.previewFiles.splice(this.previewFiles.indexOf(item),1);
                    }
                },
        });
        let attachment = document.getElementById('form-file');
        let image_preview = document.getElementById('previews');
        attachment.addEventListener('change',evt=>{
           Array.from(evt.target.files).forEach(fl => {
                let reader = new FileReader();
                let type = fl.type;
                let name = fl.name;
                reader.addEventListener('load',e=>{
                    app.previewFiles.push({
                        name: name,
                        type: type,
                        file: e.target.result,
                        file_data: fl,
                    });
                });
                reader.readAsDataURL(fl);
            });
        });
    // wire transfer section end
</script>
@endsection
