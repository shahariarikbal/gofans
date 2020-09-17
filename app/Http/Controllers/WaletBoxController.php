<?php

namespace App\Http\Controllers;

use App\Client;
use App\WaletBox;
use App\Models\FundRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WaletBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wbs = WaletBox::get();
        return view('admin.funds.index',compact('wbs'));
    }

    public function getFundRequests()
    {
        $reqs = FundRequest::get();
       return view('admin.funds.fund_requests',compact('reqs'));
    }

    public function actionFundRequest(Request $r)
    {
        $req =  FundRequest::find($r->id);
        $req->status = $r->status;
        if($req->save())
        {
            if($req->status == 1)
            {
                $wb  = new WaletBox;
                if(isset($r->client_id))
                    $wb->client_id =$r->client_id;
                    $wb->fund_type = "deposite";
                if(isset($r->amount))
                    $wb->amount = $r->amount;
                    $wb->fund_source_detail = json_encode(['message'=>"fund request"]);

                $wb->fund_source = 'manual';
                $wb->fund_added_by = auth()->user()->id;
                $wb->save();
            }


            return redirect()->back()->with('success', 'Request status has been changed');
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_lists = Client::get();
        return view('admin.funds.create',compact('client_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'client_id' => 'required',
            'fund_type' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Fill up the required fields please!.')
                ->withErrors($validator)
                ->withInput();
        }

        $wb  = new WaletBox;
        if(isset($data['client_id']))
            $wb->client_id = $data['client_id'];
        if(isset($data['fund_type']))
            $wb->fund_type = $data['fund_type'];
        if(isset($data['amount']))
            $wb->amount = $data['amount'];
        if(isset($data['details']))
            $wb->fund_source_detail = json_encode(['message'=>$data['details']]);

        $wb->fund_source = 'manual';
        $wb->fund_added_by = auth()->user()->id;

        if($wb->save())
        {
            $cli = Client::find($wb->client_id);
            if($data['fund_type'] == "deposite")
            $cli->balance += $data['amount'];
            elseif($data['fund_type'] == "withdraw")
            $cli->balance -= $data['amount'];
            $cli->save();
            return redirect()->route('funds.index')->with('success','Amount funded successfully');
        }
        return redirect()->route('funds.create')->with('error','Problem saving data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WaletBox  $waletBox
     * @return \Illuminate\Http\Response
     */
    public function show(WaletBox $waletBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WaletBox  $waletBox
     * @return \Illuminate\Http\Response
     */
    public function edit(WaletBox $waletBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WaletBox  $waletBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaletBox $waletBox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WaletBox  $waletBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaletBox $waletBox)
    {
        //
    }
}
