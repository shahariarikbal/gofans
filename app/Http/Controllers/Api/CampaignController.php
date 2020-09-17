<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\CampaignView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    /**
     * @authenticated
     * @response {
           * "success": true,
           * "categories": [{
                * "id": 1,
                * "name": "Category Name",
                * "description": "Category Description"
            * }]
       * }
     */
    public function category()
    {
        $categories = Category::select('id', 'name', 'description')->where('status', 1)->get();
        return response()->json(['success'=> true, 'categories'=> $categories]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "category": {
                * "id": 1,
                * "name": "Category Name",
                * "description": "Category Description"
            * },
           * "services": [{
                * "id": 1,
                * "category_id": 1,
                * "name": "App Download (Standard)",
                * "description": null,
                * "link_heading": null,
                * "link_label": null,
                * "link_view_label": null,
                * "service_type": "app",
                * "keyword_option": 0,
                * "mode": "tracking",
                * "app_icon": "download"
            * }]
       * }
     */
    public function service($catId)
    {
        $category = Category::select('id', 'name', 'description')->find($catId);
        $services = Service::select('id', 'category_id', 'name', 'description', 'link_heading', 'link_label', 'link_view_label', 'service_type', 'keyword_option', 'mode', 'app_icon')->where('category_id', $catId)->get();
        return response()->json(['success'=> true, 'category'=> $category, 'services'=> $services]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "service": {
                * "id": 1,
                * "category_id": 1,
                * "name": "App Download",
                * "description": null,
                * "link_heading": null,
                * "link_label": null,
                * "link_view_label": null,
                * "service_type": "app",
                * "keyword_option": 0,
                * "mode": "tracking",
                * "app_icon": "download",
                * "category": {
                    * "id": 1,
                    * "name": "Category Name",
                    * "description": "Category Description"
                * }
            * },
            * "campaign": {
                * "current_page": 1,
                * "data": [{
                    * "id": 1,
                    * "category_id": 2,
                    * "service_id": 4,
                    * "name": "test name",
                    * "link": "https://www.prothomalo.com/",
                    * "keywords": null,
                    * "bid_amount": "0.25",
                    * "quantity": "100.00",
                    * "mobile_platform": "Both",
                    * "app_type": null,
                    * "app_type_price": null,
                    * "play_type": null,
                    * "mode": "timing",
                    * "mode_value": "45",
                    *  "additional_data": {
                            * "channel_id": "1234",
                            * "video_id": "123456",
                            * "channel_logo": "image.png"
                        * }
                * }],
                * "first_page_url": "http://gofans.test/api/campaign/4?page=1",
                * "from": 1,
                * "last_page": 1,
                * "last_page_url": "http://gofans.test/api/campaign/4?page=1",
                * "next_page_url": null,
                * "path": "http://gofans.test/api/campaign/4",
                * "per_page": 1,
                * "prev_page_url": null,
                * "to": 1,
                * "total": 1
            * }
       * }
     */
    public function campaign($serviceId)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $service = Service::with('category')->find($serviceId);

        //"country_mode": "Partial", "start_date": "2020-03-13", "end_date": "2020-03-31", "day_limit": 1000000,

        $campaign = Campaign::select('campaigns.id', 'campaigns.category_id', 'campaigns.service_id', 'campaigns.name', 'campaigns.link', 'campaigns.keywords', 'campaigns.bid_amount', 'campaigns.quantity', 'campaigns.mobile_platform', 'campaigns.app_type', 'campaigns.app_type_price', 'campaigns.play_type', 'campaigns.mode', 'campaigns.mode_value', 'campaigns.additional_data')->where('campaigns.service_id', $serviceId)
            ->leftJoin('campaign_views', function($q) use($user) {
                $q->on('campaign_views.campaign_id', '=', 'campaigns.id');
                $q->where('campaign_views.user_id', '=', $user->id);
            })
            ->whereNull('campaign_views.id')
            ->paginate(1)->toArray();
//        return $campaign;
        if (!empty($campaign['data'])){
            $campaign['data'][0]['additional_data'] = json_decode($campaign['data'][0]['additional_data'], true);
        }

        return response()->json(['success'=> true, 'service'=> $service, 'campaign'=> $campaign]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "campaign": {
                * "id": 1,
                * "category_id": 2,
                * "service_id": 4,
                * "name": "test name",
                * "link": "https://www.prothomalo.com/",
                * "keywords": null,
                * "bid_amount": "0.25",
                * "quantity": "100.00",
                * "mobile_platform": "Both",
                * "app_type": null,
                * "app_type_price": null,
                * "play_type": null,
                * "mode": "timing",
                * "mode_value": "45"
            * }
       * }
     */
    public function campaignDetails($id)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $campaign = Campaign::select('campaigns.id', 'campaigns.category_id', 'campaigns.service_id', 'campaigns.name', 'campaigns.link', 'campaigns.keywords', 'campaigns.bid_amount', 'campaigns.quantity', 'campaigns.mobile_platform', 'campaigns.app_type', 'campaigns.app_type_price', 'campaigns.play_type', 'campaigns.mode', 'campaigns.mode_value')->where('campaigns.id', $id)
        ->leftJoin('campaign_views', function($q) use($user) {
            $q->on('campaign_views.campaign_id', '=', 'campaigns.id');
            $q->where('campaign_views.user_id', '=', $user->id);
        })
        ->whereNull('campaign_views.id')
        ->first();
        return response()->json(['success'=> true, 'campaign'=> $campaign]);
    }

    /**
     * @authenticated
     * @bodyParam ip string required
     * @bodyParam device object required {mobile_brand: iPhone, mobile_model: 7, device_id: 56789, os: IOS, os_version: 9, browser_info: null}
     * @response {
           * "success": true,
           * "message": "Your campaign successfully completed."
       * }
     */
    public function campaignComplete(Request $request, $id)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $campaign = Campaign::find($id);
        if (!empty($campaign)) {
            $data = [
                'campaign_id' => $id,
                'user_id' => $user->id,
                'quantity' => 1,
                'amount' => $campaign->bid_amount,
                'point' => $campaign->bid_amount,
                'mobile_brand' => $request->mobile_brand,
                'mobile_model' => $request->mobile_model,
                'device_id' => $request->device_id,
                'os' => $request->os,
                'os_version' => $request->os_version,
                'browser_info' => $request->browser_info,
                'ip' => $request->ip,
            ];
            CampaignView::create($data);
            return response()->json(['success'=> true, 'message'=> 'Your campaign successfully completed.']);
        } else {
            return response()->json(['success'=> false, 'message'=> 'Invalid campaign ID']);
        }
    }
}
