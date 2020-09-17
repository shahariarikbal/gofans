<?php

namespace App\Http\Controllers\Client;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegionalVolumeController extends Controller
{
    public function index(Request $r){
        $requestData = isset($r) ? $r:null;
        $sql = User::select(DB::raw('COUNT(id) AS totalUser'), 'country', 'country_code');
        if(isset($r->country_name))
        {
            $sql->where('country',$r->country_name);
            $sql->where('gender',$r->gender);
            $sql->orWhere('os',$r->platform);
        }
        $volumes  =  $sql->groupBy('country', 'country_code')->get();
        $country_names = User::select(DB::raw('DISTINCT country'))->get()->toArray();
        return view('client.regional_volume.index',compact('volumes','country_names', 'requestData'));
    }
}
