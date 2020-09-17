<?php

namespace App\Http\Controllers\Client\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\ClientLoginLog;
use App\Models\SmsCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Browser;

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
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    public function showLoginForm(){
        return view('client.auth.login');
    }

    public function login(Request $request){
        //validate the form data

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);




        /*$checkToFaAuth = Client::where(['email' => $request->email, 'two_fa_auth' => 1])->first();
        if (!empty($checkToFaAuth)){
            try {
                $clientId = $checkToFaAuth->id;
                Session::put('clientId', $clientId);
                $code = codeGenerated();
                SmsCode::updateOrCreate(
                    ['client_id' => $checkToFaAuth->id],
                    ['code' => $code.'_'.$checkToFaAuth->id]
                );
                sendPhoneMessage($checkToFaAuth->mobile_number, $code);
                return redirect(route('client.verifyCode'))->with('success', 'Please check your sms and input this code.');
            }catch (\Exception $exception){
                return redirect()->back()->with('error', $exception->getMessage());
            }
        }*/


        $loginClient = Client::select('id', 'mobile_number', 'two_fa_auth')->where(['email' => $request->email, 'status' => 1])->first();

        if (isset($loginClient) && $loginClient->two_fa_auth == 1){

            $checkClientLog = ClientLoginLog::where(
                [
                    'client_id'  => $loginClient->id,
                    'ip_address' => getIpAddress(),
                    'device'     => Browser::platformName(),
                    'browser'    => Browser::browserFamily(),
                    'version'    => Browser::browserVersion(),
                ])->count();

            if ($checkClientLog == 0){
                try {
                    $clientId = $loginClient->id;
                    Session::put('clientId', $clientId);
                    $code = codeGenerated();
                    SmsCode::updateOrCreate(
                        ['client_id' => $loginClient->id],
                        ['code'      => $code.'_'.$loginClient->id]
                    );
                    sendPhoneMessage($loginClient->mobile_number, $code);
                    return redirect(route('client.verifyCode'))->with('success', 'Please check your sms and input this code.');
                }catch (\Exception $exception){
                    return redirect()->back()->with('error', $exception->getMessage());
                }
            }

        }


        //attempt to log the user in
        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
            $client = Client::find(Auth::guard('client')->user()->id);
            createClientLoginLog($client->id);
            \Session::flash('success', 'Client login successfully !!');
            return redirect()->intended(route('client.dashboard'));

        } elseif (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 2], $request->remember)) {
            return redirect(route('client.login'))->with('error', 'Your account has been rejected !!');
        }elseif (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 3], $request->remember)) {
            return redirect(route('client.login'))->with('error', 'Your account is not approved. Please wait admin approval !!');
        } else {
            //if unsuccessful, redirect back with the form data
            return redirect(route('client.login'))->with('Input', $request->only('email', 'remember'))->with('error', 'Client Login invalid !!');
        }
    }


    public function verifyCodeForm(){
        return view('client.auth.verify_code');
    }

    public function verifyCodeLogin(Request $request){
        $this->validate($request, [
            'code' => 'required|min:6'
        ]);
        $clientId = \Session::get('clientId');
        $checkCode = SmsCode::where(['client_id' =>  $clientId,'code' => $request->code.'_'.$clientId])->first();
        if(!empty($checkCode)){
            createClientLoginLog($clientId);
            \Auth::guard('client')->loginUsingId($checkCode->client_id, true);
            \Session::flash('success', 'Client login successfully !!');
            return redirect(route('client.dashboard'));
        }else{
            return redirect()->back()->with('error', 'Your code is not valid please try again !!');
        }
    }

    public function logout(){
        Auth::guard('client')->logout();
        return redirect(route('client.login'))->with('success', 'Client logout successfully !!');
    }



}
