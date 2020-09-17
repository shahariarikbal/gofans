<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SmsCode;
use App\Models\UserDetail;
use App\Models\UserLoginLog;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Browser;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        //attempt to log the user in
        $loginUser = User::select('id', 'mobile_number', 'two_fa_auth')->where(['email' => $request->email, 'status' => 1])->first();

        if (isset($loginUser) && $loginUser->two_fa_auth == 1){

            $checkUserLog = UserLoginLog::where(
                [
                    'user_id' => $loginUser->id,
                    'ip_address' => getIpAddress(),
                    'device'     => Browser::platformName(),
                    'browser'    => Browser::browserFamily(),
                    'version'    => Browser::browserVersion(),
                ])->count();

            if ($checkUserLog == 0){
                try {
                    $userId = $loginUser->id;
                    Session::put('userId', $userId);
                    $code = codeGenerated();
                    SmsCode::updateOrCreate(
                        ['user_id' => $loginUser->id],
                        ['code' => $code.'_'.$loginUser->id]
                    );
                    sendPhoneMessage($loginUser->mobile_number, $code);
                    return redirect(route('user.verifyCode'))->with('success', 'Please check your sms and input this code.');
                }catch (\Exception $exception){
                    return redirect()->back()->with('error', $exception->getMessage());
                }
            }

        }

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)){
            //if successful, redirect to their intended location
            $user = User::find(Auth::guard('web')->user()->id);
            UserDetail::updateOrCreate(
                ['user_id' => $user->id]
            );
            if (empty($user->referral_code)){
                $user->referral_code = Auth::guard('web')->user()->id.'-'.uniqid();
                $user->save();
            }
            createUserLoginLog($user->id);

            \Session::flash('success', 'User login successfully !!');
            return redirect()->intended(url('newsfeed'));
        }elseif(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 2], $request->remember)){
            return redirect()->back()->with('warning', 'Your account is blocked. Please contact our support team. !!');
        }
        return redirect()->back()->with('Input', $request->only('email', 'remember'))->with('error', 'Your are not registered user. Please register now !!');
    }


    public function verifyCodeForm(){
        return view('auth.verify_code');
    }

    public function verifyCodeLogin(Request $request){
        $this->validate($request, [
            'code' => 'required|min:6'
        ]);
        $userId = \Session::get('userId');
        $checkCode = SmsCode::where(['user_id' =>  $userId,'code' => $request->code.'_'.$userId])->first();
        if(!empty($checkCode)){
            createUserLoginLog($userId);
            \Auth::loginUsingId($checkCode->user_id, true);
            \Session::flash('success', 'User login successfully !!');
            return redirect(route('user.dashboard'));
        }else{
            return redirect()->back()->with('error', 'Your code is not valid please try again !!');
        }
    }

    public function resendCode(){
        try {
            $userId = \Session::get('userId');
            $loginUser = User::find($userId);
            $code = codeGenerated();
            SmsCode::updateOrCreate(
                ['user_id' => $userId],
                ['code' => $code.'_'.$userId]
            );
            sendPhoneMessage($loginUser->mobile_number, $code);
            return redirect()->back()->with('success', 'Code resend successfully !!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect(route('login'))->with('success', 'User logout successfully !!');
    }



    public function redirectToProvider($provider)
    {
        session(['provider' => $provider]);
        return Socialite::driver($provider)->redirect('callback');
    }


    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {

        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        $provider = session('provider');
        $user = Socialite::driver($provider)->user();
        $email = $user->getEmail();
        $exists = User::where('email', $email)->first();
        $data = $request->all();

        UserDetail::updateOrCreate(
            ['user_id' => $exists->id]
        );
        if($exists){
            Auth::guard('web')->loginUsingId($exists->id, true);
            return redirect('newsfeed');
        }elseif(isset($email)){
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password =  md5(time());
            if($newUser->save()){
                Auth::guard('web')->loginUsingId($newUser->id, true);
            }
            return redirect('newsfeed');
        }else{
            return redirect('/')->with('error', 'You must grant email access in order to login.');
        }
    }
}
