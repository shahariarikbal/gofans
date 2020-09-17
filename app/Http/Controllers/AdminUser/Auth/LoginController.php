<?php

namespace App\Http\Controllers\AdminUser\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
        $this->middleware('guest:AdminUser')->except('logout');
    }

    public function showLoginForm(){
        return view('admin_user.auth.login');
    }

    public function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        //attempt to log the user in
        if(Auth::guard('AdminUser')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)){
            //if successful, redirect to their intended location
            \Session::flash('success', 'Admin login successfully !!');
            return redirect()->intended(route('AdminUser.dashboard'));
        }
        //if unsuccessful, redirect back with the form data
        return redirect()->back()->with('Input', $request->only('email', 'remember'))->with('error', 'Invalid credential !!');
    }

    public function logout(){
        Auth::guard('AdminUser')->logout();
        return redirect(route('AdminUser.login'))->with('success', 'Admin logout successfully !!');
    }



}
