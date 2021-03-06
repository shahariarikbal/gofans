<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $data = FaqCategory::with('getFaq')->where('status', 1)->get();
        return view('client.faq.index', compact('data'));
    }
}
