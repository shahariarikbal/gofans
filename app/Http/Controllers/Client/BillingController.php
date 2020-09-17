<?php

namespace App\Http\Controllers\Client;

use App\WaletBox;
use App\Attachment;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use App\Models\FundRequest;
use Illuminate\Http\Request;
use Shipu\Aamarpay\Aamarpay;
use CoinbaseCommerce\ApiClient;
use App\Http\Controllers\Controller;
use CoinbaseCommerce\Resources\Charge;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Validator;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;

class BillingController extends Controller
{
    public function addFunds(){
        return view('client.billing.add_funds');
    }

    public function invoices(){
        return view('client.billing.invoices');
    }

    //not in use
    public function fundRequestCreate()
    {
        return view('client.billing.fund_request');
    }
    //not in use
    public function fundRequest()
    {
        $reqs = FundRequest::where('client_id',auth()->user()->id)->get();
        return view('client.billing.fund_requests_view',compact('reqs'));
    }
    public function sendFundRequest(Request $r)
    {
        $data = $r->all();
        $filePath = [];
        $validator = Validator::make($data, [
            'fund-amount' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Fill up the required fields please!.')
                ->withErrors($validator)
                ->withInput();
        }
        $fund_requests = new FundRequest;
        $fund_requests->client_id = auth()->user()->id;
        $fund_requests->amount = $data['fund-amount'];
        $fund_requests->remarks = $data['remarks'];
        if($fund_requests->save())
        {
            if ($r->hasFile('fund-attachment')) {
                foreach ($r->file('fund-attachment') as $f) {
                    $filePath[] = Storage::disk('attachments_uploads')->put('fund_request_attachments', $f);
                }
                $attchment = new Attachment;
                $attchment->data =  json_encode($filePath);
                $fund_requests->requestAttachments()->save($attchment);
             }
             return response()->json([
                'status'=>200,
                'statusText'=>"success",
                'message'=>"Request has been sent successfully",
             ]);
        }
    }
    public function amarPayFundRequest(Request $r)
    {
          echo '<style>
          .btn-lg{
            display:none;
        }
        </style>';
        echo 'redirecting ..................';
          $form = aamarpay_post_button([
                'cus_name'  => auth()->user()->name, // Customer name
                'cus_email' => auth()->user()->email, // Customer email
                'cus_phone' => auth()->user()->mobile_number // Customer Phone
            ], $r->amount, '<i class="fa fa-credit-card" aria-hidden="true"></i> Pay with AmarPay <i class="fa fa-share"></i>', 'btn btn-primary   btn-lg');
            echo $form;
            echo '<script>
            document.getElementsByClassName("btn-lg")[0].click();
            </script>';
    }

    public function paidSuccess(Request $r)
    {
        $data = $r->all();
        $waletbox = new WaletBox;
        $waletbox->client_id = auth()->user()->id;
        $waletbox->amount = $data['amount'];
        $waletbox->fund_source = 'amarpay';
        $waletbox->fund_type = 'deposite';
        $waletbox->fund_added_by = auth()->user()->id;
        $waletbox->fund_source_detail = json_encode($data);
        if($waletbox->save())
        return view('client.billing.add_funds')->with('success', 'Payment Has been done successfully');
        else return view('client.billing.add_funds')->with('error', 'Unable to payment process at this time, try again');
    }
    public function paidFailed()
    {
        return view('client.billing.add_funds')->with('error', 'Unable to payment process at this time, try again');
    }
    public function makePayTmOrder(Request $r)
    {
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
        'order' => uniqid(),
        'user' => auth()->user()->id,
        'mobile_number' => auth()->user()->mobile_number,
        'email' => auth()->user()->email,
        'amount' => $r->PayTMAmount,
        'callback_url' => "http://client.go2topmedia.test/billing/payment/status"
        ]);
        return $payment->receive();
    }

    public function payTmCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if($transaction->isSuccessful()){
            $waletbox = new WaletBox;
            $waletbox->client_id = auth()->user()->id;
            $waletbox->amount = $response['TXNAMOUNT'];
            $waletbox->fund_source = 'paytm';
            $waletbox->fund_type = 'deposite';
            $waletbox->fund_added_by = auth()->user()->id;
            $waletbox->fund_source_detail = json_encode($response);
            if($waletbox->save())
            return view('client.billing.add_funds')->with('success', 'Payment Has been done successfully');
        }else if($transaction->isFailed()){
            return view('client.billing.add_funds')->with('error', $transaction->getResponseMessage());
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
        dd($transaction,$transaction->getResponseMessage(),$response);
    }


    public function coinBasePaymentRequest(Request $r)
    {
        ApiClient::init('b2c23a6a-4ab2-43a1-8fbb-458a26cc038f');
        $chargeData = [
            'name' => auth()->user()->id,
            'description' => 'Payment to GoFans app',
            'local_price' => [
                'amount' =>$r->CoinBaseAmount,
                'currency' => 'USD'
            ],
            'pricing_type' => 'fixed_price',
            "redirect_url" => "http://client.go2topmedia.test/billing/coinbase/success",
            "cancel_url" => "http://client.go2topmedia.test/billing/coinbase/success",
        ];
        $charges = Charge::create($chargeData);
        $d =  $charges['addresses'];
        $hostedUrl =  $charges['hosted_url'];
        echo 'redirecting ..................';
        echo '<form action="'.$hostedUrl.'" method="get" id="coinbaseForm"></form>';
        echo '<script>
               document.getElementById("coinbaseForm").submit();
            </script>';
        dd($d,$charges);
    }
    public function coinbaseSuccess(Request $r)
    {
        dd("dss",$r->all());
    }
    public function coinbaseFailed(Request $r)
    {
        dd("dff",$r->all());
    }
}
