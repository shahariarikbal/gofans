<?php

namespace App\Http\Controllers\Api;

use App\Models\CampaignView;
use App\Models\UserWithdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{
    
    /**
     * @authenticated
     * @response {
           * "success": true,
           * "tasks": [{
                * "id": 2,
                * "campaign_id": 1,
                * "quantity": "1",
                * "amount": "0.25",
                * "point": 0,
                * "verification_status": 0,
                * "verified_date": null,
                * "camping": {
                    * "id": 1,
                    * "name": "jhvjhvj",
                    * "link": "https://www.prothomalo.com"
                * }
            * }]
       * }
     */
    public function myTask()
    {
        $tasks = CampaignView::select('id', 'campaign_id', 'quantity', 'amount', 'point', 'verification_status', 'verified_date')->with(['camping' => function($q) {
            $q->select('id', 'name', 'link');
        }])->where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return response()->json(['success'=> true, 'tasks'=> $tasks]);
    }
    
    /**
     * @authenticated
     * @response {
           * "success": true,
           * "task": {
                * "id": 2,
                * "campaign_id": 1,
                * "point": 0,
                * "mobile_brand": Iphone,
                * "mobile_model": 11,
                * "device_id": 123456789,
                * "os": IOS,
                * "os_version": 10,
                * "browser_info": Chrome/60,
                * "ip": 127.0.0.1,
                * "verification_status": 1,
                * "verified_date": 2020:01:01:12:20:00,
                * "camping": {
                    * "id": 1,
                    * "name": "C Name",
                    * "app_type": null,
                    * "link": "https://www.prothomalo.com/"
                * }
            * }
       * }
     */
    public function taskView($id)
    {
        $task = CampaignView::select('id', 'campaign_id', 'point', 'mobile_brand', 'mobile_model', 'device_id', 'os_version', 'browser_info', 'ip', 'verification_status', 'verified_date')->with(['camping' => function($q) {
            $q->select('id', 'name', 'app_type', 'link');
        }])->find($id);
        return response()->json(['success'=> true, 'task'=> $task]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "WithdrawHistory": [{
                * "id": 2,
                * "withdraw_point": 100,
                * "withdraw_amount": "1",
                * "status": "1"
            * }]
       * }
     */
    public function withdrawHistory()
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        
        $data = UserWithdraw::select('id', 'withdraw_point', 'withdraw_amount', 'status')->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return response()->json(['success'=> true, 'WithdrawHistory' => $data]);
    }

    /**
     * @authenticated
     * @bodyParam withdraw_point string required
     * @bodyParam remarks string required
     * @response {
           * "success": true,
           * "message": "Your withdraw payment submit successfully!"
       * }
     */
    public function withdrawStore(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        try {
            $totalEarnPoint = CampaignView::select('point')->where('user_id', $user->id)->sum('point');
            $totalWithdrawPoint = UserWithdraw::select('withdraw_point')->where('user_id', $user->id)->sum('withdraw_point');
            $userPoint = $totalEarnPoint - $totalWithdrawPoint;
            if ($userPoint <= 0){
                return response()->json(['success' => false, 'errors'=> 'Sorry You have 0 point.'], 422);
            }

            $data = $request->all();
            $credentials = $request->only('withdraw_point', 'remarks');
            $rules = [
                'withdraw_point' => "required|integer|between:1000,$userPoint",
                'remarks' => 'required',
            ];
            $validator = Validator::make($credentials, $rules);
            if($validator->fails()) {
                return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
            }
            $totalAmount = $data['withdraw_point']/1000;
            $data['user_id'] = $user->id;
            $data['withdraw_amount'] = round($totalAmount, 2);
            UserWithdraw::create($data);
            
            return response()->json(['success'=> true, 'message'=> 'Your withdraw payment submit successfully!']);

        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'errors'=> $exception->getMessage()], 422);
        }
    }
}
