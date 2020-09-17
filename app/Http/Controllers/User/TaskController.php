<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CampaignView;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function myTask(){
        $data = CampaignView::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return view('user.task.index', compact('data'));
    }

    public function taskView($id){
        $data = CampaignView::find($id);
        return view('user.task.view', compact('data'));
    }


}
