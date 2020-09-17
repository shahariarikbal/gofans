<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\WaletBox;
use PHPHtmlParser\Dom;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\CampaignPrice;
use App\Models\TrafficSource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.campaign.index')->with('campaigns',Campaign::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get categories and its relavant services
        $cate = \App\Models\Category::select("*")->get()->toArray();
        $services = \App\Models\Service::with('service_price')->select('*')->get()->toArray();
        return view('client.campaign.create',compact('cate','services'));
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

       dd($data);

        $validator = Validator::make($data, [
            'category_id' => 'required',
            'service_id' => 'required',
            'app_link' => 'required',
            'BidPerInstall' => 'required',
            'service_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Fill up the required fields please!.')
                ->withErrors($validator)
                ->withInput();
        }
        if(auth()->user()->balance() <  ($data['BidPerInstall'] * $data['campign_quantity']))
           return redirect()->back()->with('error','You do not have sufficent balance to create a campaign');

        $campaign = new Campaign;
        if(isset($data['category_id']))
            $campaign->category_id = $data['category_id'];

        if(isset($data['service_id']))
            $campaign->service_id = $data['service_id'];

        if(isset($data['campaign_name']))
            $campaign->name = $data['campaign_name'];

        if(isset($data['app_link']))
            $campaign->link = $data['app_link'];

        if(isset($data['keywords']))
           $campaign->keywords = $data['keywords'];


        if(isset($data['service_mode']))
            $campaign->mode = $data['service_mode'];

        if(isset($data['service_mode_value']))
            $campaign->mode_value = $data['service_mode_value'];

        // if(isset($data['countries']))
        // $campaign->mode_value = json_encode($data['countries']);

        if(isset($data['start_date']))
            $campaign->start_date = date('Y-m-d',strtotime($data['start_date']));


        if(isset($data['end_date']))
            $campaign->end_date = date('Y-m-d',strtotime($data['end_date']));


        if(isset($data['BidPerInstall']))
        $campaign->bid_amount = $data['BidPerInstall'];

        if(isset($data['campign_quantity']))
        $campaign->quantity = $data['campign_quantity'];


        if(isset($data['day_limit']))
        $campaign->day_limit = $data['day_limit'];

        if($campaign->save())
        {
            $traffic_source = [];
            if(isset($data['traffic_source_android']))
            {
                $traffic_source[] = [
                    'campaign_id' => $campaign->id,
                    'traffic_source_name' => $data['traffic_source_android'],
                    'created_at' => now(),
                ];
            }
            if(isset($data['traffic_source_ios']))
            {
                $traffic_source[] = [
                    'campaign_id' => $campaign->id,
                    'traffic_source_name' => $data['traffic_source_ios'],
                    'created_at' => now(),
                ];
            }
            if(isset($data['traffic_source_desktop']))
            {
                $traffic_source[] = [
                    'campaign_id' => $campaign->id,
                    'traffic_source_name' => $data['traffic_source_desktop'],
                    'created_at' => now(),
                ];
            }
            if(isset($data['traffic_source_podcast']))
            {
                $traffic_source[] = [
                    'campaign_id' => $campaign->id,
                    'traffic_source_name' => $data['traffic_source_podcast'],
                    'created_at' => now(),
                ];
            }
            if(!empty($traffic_source)) TrafficSource::insert($traffic_source);
            WaletBox::create([
                'campaign_id' => $campaign->id,
                'client_id' => auth()->user()->id,
                'fund_type' => 'withdraw',
                'amount' => $data['BidPerInstall'] * $data['campign_quantity'],
                'fund_source' => 'campaign',
                'fund_source_detail' => 'balance debited by the campaign '.$campaign->id,
                'fund_added_by' => auth()->user()->id,
                ]);
            //campaign prices save
            CampaignPrice::create([
                'campaign_id' => $campaign->id,
                'quantity' => isset($data['campign_quantity'])?$data['campign_quantity']:null,
                'amount'   => isset($data['BidPerInstall'])?$data['BidPerInstall']:null,
            ]);
            return redirect()->route('campaign.show', [$campaign])->with('success', 'New user save successfully');
        }
        else
            return redirect()->back()->with('error', 'Something went wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  view('client.campaign.show')->with('campaign',Campaign::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    public function priceAdjustment(Request $r, $id)
    {
        $data = $r->all();
        $amount = isset($data['amount'])?$data['amount']:null;
        $qntity = isset($data['quantity'])?$data['quantity']:null;
        $campign = null;
        if($amount!=null && $qntity!=null)
        {
            $campaign_balances = CampaignPrice::where('campaign_id',$id)->latest()->first();
            $campaign_balance = $campaign_balances->quantity * $campaign_balances->amount;
            $new_balance = $qntity * $amount;
            if($new_balance > $campaign_balance)
            {
                WaletBox::create([
                    'campaign_id' => $id,
                    'client_id' => auth()->user()->id,
                    'fund_type' => 'withdraw',
                    'amount' => $new_balance - $campaign_balance,
                    'fund_source' => 'campaign',
                    'fund_source_detail' => 'balance adjustment '.$id,
                    'fund_added_by' => auth()->user()->id,
                    ]);
            }
            else
            {
                WaletBox::create([
                    'campaign_id' => $id,
                    'client_id' => auth()->user()->id,
                    'fund_type' => 'deposite',
                    'amount' => $new_balance - $campaign_balance,
                    'fund_source' => 'campaign',
                    'fund_source_detail' => 'balance credited by the campaign '.$id,
                    'fund_added_by' => auth()->user()->id,
                    ]);
            }

            $campign = CampaignPrice::create([
                'campaign_id' => $id,
                'quantity' => $qntity,
                'amount'   => $amount,
            ]);
        }

        if($campign !=null)
        {
            return response()->json(['status'=>200,'message'=>"New Balance adjusted"]);
        }
        return response()->json(['status'=>403,'message'=>"There is an error"]);
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

        try{
            $data = $request->all();
            if(isset($data['start_date'])){
                $data['start_date'] = date('Y-m-d',strtotime($data['start_date']));
            }
            if(isset($data['end_date'])){
                $data['end_date'] = date('Y-m-d',strtotime($data['end_date']));
            }

            Campaign::find($id)->update($data);
            return response()->json([
                'status' => 200,
                'message'   => 'Campaign update successfully',
            ]);
            return  redirect()->back()->with('success', 'Category update successfully!');
        }catch (\Exception $exception){
            return response()->json([
                'status' => 5000,
                'message'   => $exception->getMessage(),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cam = Campaign::find($id);
        if($cam!=null)
         {
             $cam->delete();
             return redirect()->route('campaign.index')->with('success','Campaign record has been successfully removed');
         }

         return redirect()->route('campaign')->with('error','Error occured deleting record');
    }


    public function viewCampaign($id)
    {
        $campaign = Campaign::find($id);
        $campaignData = array(
            'identifier'        => $campaign->id,
            'name'              => $campaign->name,
            'category_name'     => $campaign->category->name,
            'service_name'      => $campaign->service->name,
            'service_link_view_name'      => $campaign->service->link_view_label,
            'link'              => $campaign->link,
            'keywords'          => $campaign->keywords,
            'start_date'        => $campaign->start_date,
            'end_date'          => $campaign->end_date,
            'bid_amount'        => $campaign->campaign_price->last()->amount,
            'quantity'          => (int)$campaign->campaign_price->last()->quantity,
            'day_limit'         => $campaign->day_limit,
            'mobile_platform'   => $campaign->mobile_platform,
            'app_type'          => $campaign->app_type,
            'app_type_price'    => $campaign->app_type_price,
            'play_type'         => $campaign->play_type,
            'mode'              => $campaign->mode,
            'mode_value'        => $campaign->mode_valued,
            'status'            => $campaign->status,
            'country_mode'      => $campaign->country_mode,
            'created_at'        => date('d M Y H:i:s', strtotime($campaign->created_at)),
        );
        return response()->json([
            'status' => 200,
            'data'   => $campaignData,
        ]);
    }

    public function validateAndroid(Request $request)
    {
        $data= $request->all();
        $app_link = $data['app_link'];
        if($data['app_type'] == 'android')
        {
            $a = parse_url($app_link);
            $query = explode('&',$a['query']);
            $id_contains = '';
            foreach($query as $q)
            {
            if(strpos($q,'id')!==false)
                $id_contains = $q;

            }
            $pure_id = explode('=',$id_contains)[1];
            $gplay = new \Nelexa\GPlay\GPlayApps();
            $appId = new \Nelexa\GPlay\Model\AppId($pure_id, 'en', 'in');
            $appinfo = $gplay->getAppInfo($appId);

            if($gplay->existsApp($appId))
            {
                $appinfo = json_decode(json_encode($gplay->getAppInfo($appId)),true);
                return response()->json([
                    "status"=>200,
                    "message"=>"App is validated",
                    "app_name"=>$appinfo['name'],
                    'app_icon'=>$appinfo['icon'],
                    'number_of_installs'=>$appinfo['installs']
                ]);
                //dd($appinfo,$appinfo['icon'],$appinfo['name'],$appinfo['installs']);
            }
            else
            {
                return response()->json([
                    "status"=>400,
                    "message"=>"unable to validate app",
                ]);
            }
        }
        elseif($data['app_type'] == 'ios')
        {

                $dom = new Dom;
                $res = @file_get_contents($app_link);
                if($res !== false)
                {

                    $dom->load($res);
                    $name = $dom->find('.app-header__title')[0];
                    $rating = $dom->find('.star-rating__count')[0];
                    $icons = $dom->find('img')[0]->getTag();
                    return response()->json([
                        "status"=>200,
                        "message"=>"App is validated",
                        "app_name"=>$name->text,
                        'app_icon'=>$icons->getAttribute('src')['value'],
                        'number_of_installs'=>$rating->text
                    ]);
                    //dd($name->text,$rating->text,$icons->getAttribute('src')['value']);
                }
                else
                {
                    return response()->json([
                        "status"=>400,
                        "message"=>"invalid App Url, try again please",
                    ]);
                }

        }

    }
}
