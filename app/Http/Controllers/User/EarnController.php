<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CampaignView;
use App\Models\Category;
use App\Models\Service;
use App\Models\UserWithdraw;
use Illuminate\Http\Request;
use DB;

class EarnController extends Controller
{
    public function index($id){
        try{
            $category = Category::with('services')->find($id);
            return view('user.earn.index', compact('category'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function earnPointService($serviceId){
        try{
            $thisService = Service::with('audienceCampaigns')->find($serviceId);
            $category = Category::with('services')->find($thisService->category_id);
            return view('user.earn.service', compact('category', 'thisService'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function earningHistory(){
        try{

            $referralEarns = DB::table('referral_earns')->select('id', 'user_id', 'point', 'amount', 'date', 'status', 'referral_earns.created_at as type_check');

            $data = DB::table('campaign_views')->select('id', 'user_id', 'point', 'amount', 'campaign_views.verified_date as date', 'campaign_views.verification_status as status', 'campaign_views.campaign_id as type_check')
                ->where('verification_status', 1)
                ->union($referralEarns)
                ->where('user_id', auth()->id())
                ->orderBy('date', 'desc')
                ->get();
            return view('user.earn.earning_history', compact('data'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }



}
