<?php

namespace App\Http\Controllers\Api;

use Validator, Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserSocialAccount;
use App\Models\UserDetail;

class ProfileController extends Controller
{
    /**
     * @authenticated
     * @bodyParam name string required
     * @bodyParam mobile_number string required
     * @bodyParam email string required
     * @bodyParam gender string required
     * @bodyParam skype_id string
     * @response {
           * "success": true,
           * "message": "Your account details successfully updated."
       * }
     */
    public function updateProfile(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('name', 'mobile_number', 'email', 'gender');

        $rules = [
            'name' => 'required|max:255',
            'mobile_number' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id.',id',
            'gender' => 'required|string'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        $user = User::find($user->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->mobile_number = $request->mobile_number;
        $user->skype_id = $request->skype_id;
        $user->email = $request->email;
        $user->save();

        return response()->json(['success'=> true, 'message'=> 'Your account details successfully updated.', 'user' => $user]);
    }

    /**
     * @authenticated
     * @bodyParam current_password string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * @response {
           * "success": true,
           * "message": "Your password successfully updated."
       * }
     */
    public function updatePassword(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('current_password', 'password', 'password_confirmation');

        $rules = [
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['success' => false, 'message'=> 'Current password does not match the database password'], 422);
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success'=> true, 'message'=> 'Your password successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam profile_photo file required
     * @response {
           * "success": true,
           * "message": "Your profile photo successfully updated."
       * }
     */
    public function updateProfilePicture(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('profile_photo');

        $rules = [
            'profile_photo' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        if ($request->file('profile_photo') != null) {
            $file = $request->file('profile_photo');
            $image = time().'-'.$file->getClientOriginalName();
            $file->move('uploads/users', $image);

            User::where('id', $user->id)->update([
                'profile_photo' => $image,
            ]);
        }

        return response()->json(['success'=> true, 'message'=> 'Your profile photo successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam cover_photo file required
     * @response {
           * "success": true,
           * "message": "Your cover photo successfully updated."
       * }
     */
    public function updateCoverPicture(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('cover_photo');

        $rules = [
            'cover_photo' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        if ($request->file('cover_photo') != null) {
            $file = $request->file('cover_photo');
            $image = time().'-'.$file->getClientOriginalName();
            $file->move('uploads/users', $image);

            UserDetail::where('id', $user->id)->update([
                'cover_photo' => $image,
            ]);
        }

        return response()->json(['success'=> true, 'message'=> 'Your cover photo successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam career string required
     * @response {
           * "success": true,
           * "message": "Your career successfully updated."
       * }
     */
    public function updateCareer(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('career');

        $rules = [
            'career' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        UserDetail::where('id', $user->id)->update([
            'career' => $request->career,
        ]);

        return response()->json(['success'=> true, 'message'=> 'Your career successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam education string required
     * @response {
           * "success": true,
           * "message": "Your education successfully updated."
       * }
     */
    public function updateEducation(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('education');

        $rules = [
            'education' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        UserDetail::where('id', $user->id)->update([
            'education' => $request->education,
        ]);

        return response()->json(['success'=> true, 'message'=> 'Your education successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam skill object required
     * @response {
           * "success": true,
           * "message": "Your skill successfully updated."
       * }
     */
    public function updateSkill(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('skill');

        $rules = [
            'skill' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        UserDetail::where('id', $user->id)->update([
            'skill' => json_encode($request->skill),
        ]);

        return response()->json(['success'=> true, 'message'=> 'Your skill successfully updated.']);
    }

    /**
     * @authenticated
     * @bodyParam two_fa_auth string required
     * @response {
           * "success": true,
           * "message": "2 factor authentication is enabled/disabled on your account."
       * }
     */
    public function twofa(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        $credentials = $request->only('two_fa_auth');

        $rules = [
            'two_fa_auth' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        $user = User::find($user->id);
        $user->two_fa_auth = $request->two_fa_auth;
        $user->save();

        $status = ($user->two_fa_auth==1)?'enabled':'disabled';
        return response()->json(['success'=> true, 'message'=> '2 factor authentication is '.$status.' on your account.', 'user' => $user]);
    }

    /**
     * @authenticated
     * @bodyParam account_type string required Google, Facebook, Twitter, LinkedIn
     * @bodyParam account_id string required
     * @bodyParam account_token string
     * @bodyParam refresh_token string
     * @bodyParam social_permission string
     * @bodyParam other_data string
     * @bodyParam response_object object
     * @response {
           * "success": true,
           * "message": "Your account successfully added"
       * }
     */
    public function socialAccountStore(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $credentials = $request->only('account_type', 'account_id');

        $rules = [
            'account_type' => 'required',
            'account_id' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        UserSocialAccount::updateOrCreate(['user_id' => $user->id, 'account_type' => $request->account_type], [
            'user_id' => $user->id,
            'account_type' => $request->account_type,
            'account_id' => $request->account_id,
            'account_token' => $request->account_token,
            'refresh_token' => $request->refresh_token,
            'social_permission' => $request->social_permission,
            'other_data' => $request->other_data,
            'response_object' => json_encode($request->response_object),
        ]);

        return response()->json(['success'=> true, 'message'=> 'Your '.$request->account_type.' account successfully added.']);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "accounts": [
                * {
                    * "id": 1,
                    * "account_type": "Facebook",
                    * "account_id": "345678",
                    * "account_token": "wer765tyuiopoiuy",
                    * "refresh_token": "qui",
                    * "social_permission": "Text data",
                    * "other_data": "Text data",
                    * "response_object": {
                        * "account_id":"345678",
                        * "account_token":"wer765tyuiopoiuy"
                    * }
                * }
            * ]
       * }
     */
    public function socialAccountGet()
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $accounts = UserSocialAccount::select('id', 'account_type', 'account_id', 'account_token', 'social_permission', 'other_data', 'refresh_token', 'response_object')->where('user_id', $user->id)->get();
        return response()->json(['success'=> true, 'accounts'=> $accounts]);
    }
}
