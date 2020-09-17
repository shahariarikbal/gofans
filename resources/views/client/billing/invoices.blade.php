@extends('client.layout')

@section('title')
    Billing | Invoices
@endsection

@section('page_title')
    Invoices
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">invoices</li>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-6">
                <h3 class="font-light">Invoice List</h3>
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
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="goTable table table-bordered table-hover">
                                <thead class="bg-gradient-light text-center">
                                <tr>
                                    <td>ID</td>
                                    <td>Issue Date</td>
                                    <td>Country</td>
                                    <td>Package</td>
                                    <td>Transaction ID</td>
                                    <td>Amount</td>
                                    <td>Tax</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                <form>
                                    <tr>
                                        <td><input type="text" class="form-control"></td>
                                        <td>
                                            <input type="text" class="form-control">
                                            <input type="text" class="form-control">
                                        </td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td>
                                            <select multiple class="form-control">
                                                <option>All</option>
                                                <option>Invoice</option>
                                                <option>Add Fund</option>
                                                <option>Spent</option>
                                                <option>Sent</option>
                                                <option>Notice</option>
                                                <option>Paid</option>
                                                <option>Deleted</option>
                                                <option>Revoked</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-window-close"></i></button>
                                        </td>
                                    </tr>
                                </form>
                                    @for($i = 0; $i < 100; $i++)
                                    <tr>
                                        <td>IN-18{{ $i }}</td>
                                        <td>2019-12-06</td>
                                        <td>BD</td>
                                        <td>Advertiser $10{{ $i }} Package (10{{ $i }}.00)</td>
                                        <td>7BJ41961W18374358</td>
                                        <td>$ 10{{ $i }}.00</td>
                                        <td>$ 0.00</td>
                                        <td>
                                            <span class="badge badge-success font-medium text-white">Paid</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-success">Download</button>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">

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
    </style>
@endsection

@section('page_js')
<script>
    $(document).ready(function(){
        $("#paypalCard").click(function(){
            $(".paypalCard").show();
            $(".skrillCard").hide();
            $(".transferCard").hide();
        });
        $("#skrillCard").click(function(){
            $(".paypalCard").hide();
            $(".skrillCard").show();
            $(".transferCard").hide();
        });
        $("#transferCard").click(function(){
            $(".paypalCard").hide();
            $(".skrillCard").hide();
            $(".transferCard").show();
        });
        $(document).on('input', '#paypalVal', function() {
            var paypalVal = $(this).val();
            $("input[name='paypalAmount']").val(paypalVal);
            $("#paypalBudget").html("$"+paypalVal);
            $("#paypalVat").html("$"+paypalVal+".00");
        });

        $(document).on('input', '#skrillVal', function() {
            var skrillVal = $(this).val();
            $("input[name='skrillAmount']").val(skrillVal);
            $("#skrillBudget").html("$"+skrillVal);
            $("#skrillVat").html("$"+skrillVal+".00");
        });
    });
</script>
@endsection
