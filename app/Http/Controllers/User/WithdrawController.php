<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CampaignView;
use App\Models\UserWithdraw;
use App\Models\UserWithdrawRate;
use Illuminate\Http\Request;
use Validator;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = UserWithdraw::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
            return view('user.withdraw.index', compact('data'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $totalEarnPoint = CampaignView::select('point')->where('user_id', auth()->id())->where('verification_status', 1)->sum('point');
            $totalWithdrawPoint = UserWithdraw::select('withdraw_point')->where('user_id', auth()->id())->sum('withdraw_point');
            $userPoint = $totalEarnPoint - $totalWithdrawPoint;
            $totalAmount = $userPoint/1000;
            $withdrawRate = UserWithdrawRate::first();
            $minimumAmount =  isset($withdrawRate->minimum_amount) ? $withdrawRate->minimum_amount:10;
            $maximumAmount =  isset($withdrawRate->maximum_amount) ? $withdrawRate->maximum_amount:50;
            return view('user.withdraw.create', compact('userPoint', 'totalAmount',  'minimumAmount', 'maximumAmount'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $totalEarnPoint = CampaignView::select('point')->where('user_id', auth()->id())->where('verification_status', 1)->sum('point');
            $totalWithdrawPoint = UserWithdraw::select('withdraw_point')->where('user_id', auth()->id())->sum('withdraw_point');
            $userPoint = $totalEarnPoint - $totalWithdrawPoint;
            $totalAmount = $userPoint/1000;
            if ($userPoint <= 0){
                return  redirect()->back()->with('error', 'Sorry You have 0 point.');
            }
            $data = $request->all();

            $withdrawRate = UserWithdrawRate::first();
            $minimumAmount =  isset($withdrawRate->minimum_amount) ? $withdrawRate->minimum_amount:10;
            $maximumAmount =  isset($withdrawRate->maximum_amount) ? $withdrawRate->maximum_amount:50;

            if($data['withdraw_amount'] < $minimumAmount){
                return  redirect()->back()->with('error', "You can't withdraw this  amount. Minimum withdraw $".$minimumAmount);
            }else if($data['withdraw_amount'] > $maximumAmount){
                return  redirect()->back()->with('error', "You can't withdraw this amount. Maximum withdraw $".$maximumAmount);
            }else if($totalAmount < $minimumAmount){
                return  redirect()->back()->with('error', "You can't withdraw this amount. Your current balance is: $totalAmount");
            }

            $validator = Validator::make($data, [
                'withdraw_amount' => "required|integer|between:10,50",
                'payment_method' => 'required',
                'payment_id' => 'required',
            ],[
                'withdraw_amount' => "The fidel required! Minimum withdraw $10 & Maximum withdraw $50"
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['user_id'] = auth()->guard('web')->user()->id;

            $withdraw_point = ($data['withdraw_amount']*1000);
            $data['withdraw_point'] = $withdraw_point;
            UserWithdraw::create($data);
            return  redirect(route('withdraw.index'))->with('success', 'Your withdraw payment submit successfully!');

        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
