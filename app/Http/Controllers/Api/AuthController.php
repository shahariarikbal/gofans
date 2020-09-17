<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\SmsCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB, Validator, Hash, Mail;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam mobile_number string required
     * @bodyParam gender string
     * @bodyParam skype_id string
     * @bodyParam device object
     * @bodyParam password string required min:6
     * @bodyParam password_confirmation string required
     * @response {
           * "success": true,
           * "message": "Thanks for signing up! Please check your email to complete your registration."
       * }
     */
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'mobile_number', 'password', 'password_confirmation');

        $rules = [
            'name' => 'required|max:255',
            'mobile_number' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            UserDetail::create([
                'user_id' => $user->id,
                'gender' => $request->gender,
                'skype_id' => $request->skype_id,
                'device' => json_encode($request->device),
            ]);

            $verification_code = Str::random(6); //Generate verification code
            DB::table('users_verification')->insert(['user_id' => $user->id, 'token' => $verification_code]);

            $data = (object) [
                'name' => $request->name,
                'email' => $request->email,
                'verification_code' => $verification_code
            ];
            Mail::send('emails.verify', ['data' => $data], function($message) use ($data) {
                $message->subject('Please verify your email address.');
                $message->to($data->email, $data->name);
            });

            return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
        } else {
            return response()->json(['success'=> false, 'message'=> 'Registration failed for technical reason. Please try after sometime.']);
        }        
    }

    /**
     * @bodyParam code string required min:6
     * @response {
           * "success": true,
           * "message": "Congrats! Your account successfully verified"
       * }
     */
    public function verify(Request $request)
    {
        $credentials = $request->only('code');

        $rules = [
            'code' => 'required|max:6'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        $check = DB::table('users_verification')->where('token', $request->code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->email_verified_at > 0){
                return response()->json(['success'=> false, 'message'=> 'Account already verified..']);
            }
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            DB::table('users_verification')->where('token', $request->code)->delete();
            return response()->json(['success'=> true, 'message'=> 'Congrats! Your account successfully verified']);
        }
        return response()->json(['success'=> false, 'message'=> 'Verification code is invalid.']);
    }

    /**
     * @bodyParam email string required
     * @response {
           * "success": true,
           * "message": "A reset email has been sent! Please check your email."
       * }
     */
    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success'=> false, 'message' => 'Your email address was not found.']);
        }

        try {
            // Password::sendResetLink($request->only('email'), function (Message $message) {
            //     $message->subject('Your Password Reset Link');
            // });

            //Create Password Reset Token
            $token = Str::random(8);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            
            $data = (object) [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ];

            Mail::send('emails.forgot', ['data' => $data], function($message) use ($data) {
                $message->subject('Password reset code.');
                $message->to($data->email, $data->name);
            });           
        } catch (\Exception $e) {
            return response()->json(['success'=> false, 'message' => $e->getMessage()]);
        }
        return response()->json(['success'=> true, 'message'=> 'A reset email has been sent! Please check your email.']);
    }

    /**
     * @bodyParam token string required
     * @bodyParam password string required min:6
     * @bodyParam password_confirmation string required
     * @response {
           * "success": true,
           * "message": "Congrats! Your password reset successfully"
       * }
     */
    public function resetPassword(Request $request)
    {
        $credentials = $request->only('token', 'password', 'password_confirmation');

        $rules = [
            'token' => 'required|max:255',
            'password' => 'required|string|min:6|confirmed'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }
        
        $check = DB::table('password_resets')->where('token', $request->token)->first();
        if(!is_null($check)){
            $user = User::where('email', $check->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            DB::table('password_resets')->where('token', $request->token)->delete();
            return response()->json(['success'=> true, 'message'=> 'Congrats! Your password reset successfully']);
        }
        return response()->json(['success'=> false, 'message'=> 'Password reset token is invalid.']);
    }

    /**
     * @bodyParam email string required
     * @bodyParam password string required
     * @response {
           * "success": true,
           * "token": "JWT Auth Token",
           * "user": {
                * "id": 1,
                * "name": "Sudip",
                * "email": "palash.sudip@gmail.com",
                * "mobile_number": "+8801712960833",
                * "profile_photo": null,
                * "referral_code": "1-5e90ac9b84370",
                * "referred_id": null,
                * "ip_address": null,
                * "country": null,
                * "country_code": null,
                * "status": 1,
                * "two_fa_auth": 0,
                * "created_at": null,
                * "updated_at": "2020-04-10 17:27:55"
            * }
           * "expires": "Token Expired time"
       * }
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = auth('api')->user();
        if ($user->two_fa_auth == 1) {
            $code = codeGenerated();
            SmsCode::updateOrCreate(
                ['user_id' => $user->id],
                ['code' => $code.'_'.$user->id]
            );
            sendPhoneMessage($user->mobile_number, $code);
        }

        return response()->json([
            'success'=> true, 
            'token' => $token,
            'user' => $user,
            'expires' => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    /**
     * @authenticated
     * @bodyParam code string required
     * @response {
           * "success": true,
           * "message": "Two factor authentication successfully"
       * }
     */
    public function twofa(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        $credentials = $request->only('code');

        $rules = [
            'code' => 'required|max:6'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success' => false, 'errors'=> $validator->messages()], 422);
        }

        $check = SmsCode::where('code', $request->code.'_'.$user->id)->first();
        if(!is_null($check)){
            return response()->json(['success'=> true, 'message'=> 'Two factor authentication successfully']);
        }
        return response()->json(['success'=> false, 'message'=> 'Two factor authentication code is invalid.']);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "message": "SMS sent your device"
       * }
     */
    public function twofaResend(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }

        if ($user->two_fa_auth == 1) {
            $code = codeGenerated();
            SmsCode::updateOrCreate(
                ['user_id' => $user->id],
                ['code' => $code.'_'.$user->id]
            );
            sendPhoneMessage($user->mobile_number, $code);
            return response()->json(['success'=> true, 'message'=> 'SMS sent your device']);
        }
        return response()->json(['success'=> false, 'message'=> 'Two factor authentication code is invalid.']);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "message": "Successfully logged out"
       * }
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['success'=> true, 'message' => 'Successfully logged out']);
    }


    /**
     * @authenticated
     * @response {
           * "success": true,
           * "data": {
                * "id": 1,
                * "name": "Sudip",
                * "email": "palash.sudip@gmail.com",
                * "mobile_number": "+8801712960833",
                * "profile_photo": null,
                * "referral_code": "1-5e90ac9b84370",
                * "referred_id": null,
                * "ip_address": null,
                * "country": null,
                * "country_code": null,
                * "status": 1,
                * "two_fa_auth": 0
            * }
       * }
     */
    public function me()
    {
        return response()->json([
            'data' => auth()->user(),
            'success' => true,
        ]);
    }


    /**
     * @authenticated
     * @response {
           * "success": true,
           * "data": {
                * "id": 1,
                * "name": "Sudip",
                * "email": "palash.sudip@gmail.com",
                * "mobile_number": "+8801712960833",
                * "profile_photo": null,
                * "referral_code": "1-5e90ac9b84370",
                * "referred_id": null,
                * "ip_address": null,
                * "country": null,
                * "country_code": null,
                * "status": 1,
                * "two_fa_auth": 0
            * }
       * }
     */
    public function profile()
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message'=> 'Authentication failed!'], 401);
        }
        
        $user = User::with('details')->find($user->id);
        return response()->json([
            'data' => $user,
            'success' => true,
        ]);
    }

    /**
     * @authenticated
     * @response {
           * "token": "token"
       * }
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
