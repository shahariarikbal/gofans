<?php

namespace App\Http\Controllers\AdminUser;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(){
        $data = User::orderBy('id', 'desc')->get();
        return view('admin_user.user.list', compact('data'));
    }

    public function profile(){
        return view('admin_user.user.profile');
    }

    public function unblock($id){
        try{
            $data = User::find($id);
            $data->status = 1;
            $data->save();
            return back()->with('success', 'User account is unblocked !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function block($id){
        try{
            $data = User::find($id);
            $data->status = 2;
            $data->save();
            return back()->with('success', 'User account is blocked !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function withdrawRequest(){
        return view('admin_user.user.withdraw_request');
    }

}
