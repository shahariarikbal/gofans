<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class   AudienceController extends Controller
{
    public function audienceList(){
        $data = User::orderBy('id', 'desc')->get();
        return view('admin.audience.list', compact('data'));
    }

    public function block($id){
        try{
            $data = User::find($id);
            $data->status = 2;
            $data->save();
            return back()->with('success', 'This audience is blocked !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function unblock($id){
        try{
            $data = User::find($id);
            $data->status = 1;
            $data->save();
            return back()->with('success', 'This audience is unblocked !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
