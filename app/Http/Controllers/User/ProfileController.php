<?php

namespace App\Http\Controllers\User;

use App\Models\ClientInterested;
use App\Models\UserDetail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller
{
    public function profileView()
    {
        $data = Auth::guard('web')->user();
        $referredBy = User::select('name')->find($data->referred_id);
        return view('user.profile.view', compact('data', 'referredBy'));
    }

    public function profileEdit()
    {
        $data = Auth::guard('web')->user();
        return view('user.profile.edit', compact('data'));
    }

    public function profileUpdate(Request $request, $id)
    {
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|max:191|unique:users,email,' . $id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('profile_photo')) {
                $user = User::find($id);
                if ($user->profile_photo){
                    if (!file_exists(public_path('media/profile/'.$user->profile_photo))){
                        $user->profile_photo = null;
                    }else{
                        unlink('media/profile/'.$user->profile_photo);
                    }
                }
                $file = $request->file('profile_photo');
                $name = $id.".audience_".time(). "." . $file->getClientOriginalExtension();
                $file->move('media/profile/', $name);
                $data['profile_photo'] = $name;
            }

            User::find($id)->update($data);
            return  redirect()->back()->with('success', 'Your profile updated successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function referrals(){
        try {
            $data = User::where('referred_id', Auth::guard('web')->user()->id)->orderBy('id', 'desc')->get();
            return view('user.referral.index', compact('data'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function updateUserProfile(Request $request){
        try {
            $data = $request->all();
            $userId = Auth::user()->id;
            $user = User::find($userId);
            if ($user->profile_step_count == 0){
                $validator = Validator::make($data, [
                    'address' => ['required', 'string', 'max:255'],
                    'city' => ['required', 'string', 'max:255'],
//                    'country' => ['required', 'string', 'max:255'],
                ]);
                if ($validator->fails()) {
                    if ($validator->fails()) {
                        return response()->json([
                            'status' => 500,
                            'error' => $validator->errors()
                        ], 200);
                    }
                }
                $user->country = $data['country'];
                $user->profile_step_count = 1;
                $user->details->current_city = $data['city'];
                $user->details->save();
                $user->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile update successfully !!'
                ], 200);
            }
            if ($user->profile_step_count == 1){

                $validator = Validator::make($data, [
                    'profilePhoto' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'coverPhoto'   => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
                if ($validator->fails()) {
                    if ($validator->fails()) {
                        return response()->json([
                            'status' => 500,
                            'error' => $validator->errors()
                        ], 200);
                    }
                }

                if ($request->hasFile('profilePhoto')) {
                    if ($user->profile_photo){
                        if (!file_exists(public_path('storage/images/'.$user->profile_photo))){
                            $user->profile_photo = null;
                        }else{
                            unlink('storage/images/'. $user->profile_photo);
                        }
                    }
                    $fileName = $data['profilePhoto']->getClientOriginalName();
                    $imageRename = time(). '_' .$fileName;
                    $data['profilePhoto']->storeAs('images', $imageRename, 'public');
                    $user->profile_photo = $imageRename;
                }

                if ($request->hasFile('coverPhoto')) {
                    if ($user->cover_photo){
                        if (!file_exists(public_path('storage/images/'.$user->cover_photo))){
                            $user->cover_photo = null;
                        }else{
                            unlink('storage/images/'. $user->cover_photo);
                        }
                    }
                    $fileName = $data['coverPhoto']->getClientOriginalName();
                    $imageRename = time(). '_' .$fileName;
                    $data['coverPhoto']->storeAs('images', $imageRename, 'public');
                    $user->cover_photo = $imageRename;
                }
                $user->profile_step_count = 2;
                $user->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile update successfully !!'
                ], 200);
            }
            if ($user->profile_step_count == 2){
                $validator = Validator::make($data, [
                    'about_me' => ['required', 'string', 'max:255'],
                ]);
                if ($validator->fails()) {
                    if ($validator->fails()) {
                        return response()->json([
                            'status' => 500,
                            'error' => $validator->errors()
                        ], 200);
                    }
                }
                $user->details->about_me = $data['about_me'];
                $user->details->education = $data['education'];
                $user->details->career = $data['career'];
                $user->profile_step_count = 3;
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Profile update successfully !!'
                ], 200);
            }

        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }


    public function aboutProfile(Request $request)
    {
        try {
            $user = User::with('details')->where('username', $request->username)->first();

            return response()->json([
                'status' => 200,
                'about' => $user,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function refRegister($refCode)
    {
        return view('auth.register_ref', compact('refCode'));
    }

    // Profile Settings code

    public function profileSetting(Request $request)
    {
        try {
            $user = User::where('username', $request->username)->first();

            $userData = [
                'id'                    =>  $user->id,
                'name'                  =>  $user->name,
                'username'              =>  $user->username,
                'email'                 =>  $user->email,
                'mobile_number'         =>  $user->mobile_number,
                'password'              =>  $user->password,
            ];

            return response()->json([
                'status' => 200,
                'setting' => $userData,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function profileSettingUserInfo(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'name' => 'required',
            'mobile_number' => 'required',
        ]);
        try {
            $settingInfo = User::find($id);
            $settingInfo->username = $request->username;
            $settingInfo->name = $request->name;
            $settingInfo->mobile_number = $request->mobile_number;
            $settingInfo->save();
            return response()->json([
                'status' => 200,
                'userInfo' => $settingInfo,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function profileSettingEmail(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
        ]);
        try {
            $settingEmail = User::find($id);
            $settingEmail->email = $request->email;
            $settingEmail->save();
            return response()->json([
                'status' => 200,
                'userEmail' => $settingEmail,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function profileSettingPassword(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8'],
        ]);
        try {
            $hashedPassword = Auth::user()->password;

            if (Hash::check($request->old_password , $hashedPassword )) {
                if (!Hash::check($request->password , $hashedPassword)) {

                    $users = User::find(Auth::user()->id);
                    $users->password = bcrypt($request->password);
                    User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

                    return response()->json([
                        'status' => 200,
                        'userPassword' => 'Password updated',
                    ], 200);
                }

                else{
                    return response()->json([
                        'status' => 500,
                        'error' => 'new password can not be the old password!'
                    ], 200);
                }

            }else {
                return response()->json([
                    'status' => 500,
                    'error' => 'Old password dose not match'
                ], 200);
            }

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }
}
