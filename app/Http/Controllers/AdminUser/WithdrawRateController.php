<?php

namespace App\Http\Controllers\AdminUser;

use App\Http\Controllers\Controller;
use App\Models\UserWithdrawRate;
use Illuminate\Http\Request;
use Validator;

class WithdrawRateController extends Controller
{
    public function index(){
        $data = UserWithdrawRate::first();
        return view('admin_user.withdraw_rate.index', compact('data'));
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'minimum_amount' => ['required', 'numeric'],
                'maximum_amount' => ['required', 'numeric'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            UserWithdrawRate::updateOrCreate(
                ['status' => 1], // For This "1" is update status
                [
                    'minimum_amount' => $request->minimum_amount,
                    'maximum_amount' => $request->maximum_amount,
                ]
            );
            return  redirect()->back()->with('success', 'Withdraw Rate updated successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
