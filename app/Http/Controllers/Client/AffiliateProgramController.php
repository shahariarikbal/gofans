<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffiliateProgramController extends Controller
{
    public function overview(){
        return view('client.affiliate.overview');
    }

    public function referrals(){
        return view('client.affiliate.referrals');
    }
}
