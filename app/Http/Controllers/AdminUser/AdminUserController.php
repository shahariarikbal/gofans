<?php

namespace App\Http\Controllers\AdminUser;

use App\AdminUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AdminUserController extends Controller
{
    public function index(){
        return view('admin_user.index');
    }

    public function profileView(){
        $data = Auth::guard('AdminUser')->user();
        return view('admin_user.profile.view', compact('data'));
    }

    public function profileEdit(){
        $data = Auth::guard('AdminUser')->user();
        return view('admin_user.profile.edit', compact('data'));
    }

    public function profileUpdate(Request $request, $id){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|max:191|unique:admin_users,email,' . $id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            AdminUsers::find($id)->update($data);
            return  redirect()->back()->with('success', 'Your profile updated successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
