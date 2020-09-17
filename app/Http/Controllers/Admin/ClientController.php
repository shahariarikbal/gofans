<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clientList(){
        $data = Client::orderBy('id', 'desc')->get();
        return view('admin.client.list', compact('data'));
    }

    public function profile(){
        return view('admin.client.profile');
    }

    public function campaign(){
        return view('admin.client.campaign');
    }

    public function transaction(){
        return view('admin.client.transaction');
    }

    public function approve($id){
        try{
            $client = Client::find($id);
            $client->status = 1;
            $client->save();
            return back()->with('success', 'Client account is approved !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function reject($id){
        try{
            $client = Client::find($id);
            $client->status = 3;
            $client->save();
            return back()->with('success', 'Client account is rejected !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }


}
