<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Newsfeed;
use App\Models\UserDetail;
use App\Models\UserDeviceUse;
use App\Models\UserLoginLog;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Browser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'newsfeed';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:20'],
            'mobile_number' => ['required', 'max:20'],
            'date_of_birth' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (!empty($data['referral_code'])){
            $refUser = User::select('id')->where('referral_code', $data['referral_code'])->first();
        }

        $checkZero = substr($data['mobile_number'], 0, 1);
        if ($checkZero == 0){
            $phoneNumber = $data['country_code'].substr($data['mobile_number'], 1);
        }else{
            $phoneNumber = $data['country_code'].$data['mobile_number'];
        }
        $user = User::create([
            'username'      => uniqid('go-').uniqid(),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'mobile_number' => $phoneNumber,
            'date_of_birth' => date('Y-m-d', strtotime($data['date_of_birth'])),
            'county_name'   => isset(getCountryInfo()->geoplugin_countryName) ? getCountryInfo()->geoplugin_countryName:null,
            'country_code'  => isset(getCountryInfo()->geoplugin_countryCode) ? getCountryInfo()->geoplugin_countryCode:null,
            'referred_id'   => isset($refUser) ? $refUser->id:null,
            'gender'        => $data['gender'],
            'password'      => Hash::make($data['password']),
        ]);

        if (!empty($user)){
            $updateUser = User::find($user->id);
            if (empty($updateUser->referral_code)){
                $updateUser->referral_code = $user->id.'-'.uniqid();
                $updateUser->save();
            }
            UserDeviceUse::create([
                'user_id' => $user->id,
                'android' => isset($data['android']) ? 1:0 ,
                'ios' => isset($data['ios']) ? 1:0 ,
                'desktop' => isset($data['desktop']) ? 1:0 ,
                'all' => isset($data['use_all']) ? 1:0 ,
            ]);
            UserDetail::updateOrCreate(
                ['user_id' => $user->id]
            );
            createUserLoginLog($user->id);
        }
        \Session::flash('success', 'User Register and login successfully !!');
        return  $user;
    }

    public function refRegister($refCode){
        return view('auth.register_ref', compact('refCode'));
    }

    public function refRegisterStore(Request $request, $refCode){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:20'],
            'mobile_number' => ['required', 'max:20'],
            'date_of_birth' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $refUser = User::select('id')->where('referral_code', $refCode)->first();
        if (empty($refUser)){
            return redirect()->back()->with('error', 'This Referral Link is invalid');
        }

        $checkZero = substr($data['mobile_number'], 0, 1);
        if ($checkZero == 0){
            $phoneNumber = $data['country_code'].substr($data['mobile_number'], 1);
        }else{
            $phoneNumber = $data['country_code'].$data['mobile_number'];
        }
        $user = User::create([
            'username'      => uniqid('go-').uniqid(),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'mobile_number' => $phoneNumber,
            'date_of_birth' => date('Y-m-d', strtotime($data['date_of_birth'])),
            'referred_id'   => isset($refUser) ? $refUser->id:null,
            'gender'        => $data['gender'],
            'password'      => Hash::make($data['password']),
        ]);

        if (!empty($user)){
            $updateUser = User::find($user->id);
            if (empty($updateUser->referral_code)){
                $updateUser->referral_code = $user->id.'-'.uniqid();
                $updateUser->save();
            }
            UserDeviceUse::create([
                'user_id' => $user->id,
                'android' => isset($data['android']) ? 1:0 ,
                'ios' => isset($data['ios']) ? 1:0 ,
                'desktop' => isset($data['desktop']) ? 1:0 ,
                'all' => isset($data['use_all']) ? 1:0 ,
            ]);
            createUserLoginLog($user->id);
        }
        try {
            if(!empty($user)){
                createUserLoginLog($user->id);
                \Auth::loginUsingId($user->id, true);
                \Session::flash('success', 'User Register and login successfully!!');
                return redirect(route('user.dashboard'));
            }else{
                return redirect()->back()->with('error', 'Register failed please try again !!');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function storeRefRegister(Request $request, $refCode){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:20'],
            'mobile_number' => ['required', 'max:20'],
            'date_of_birth' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $refUser = User::select('id')->where('referral_code', $refCode)->first();
        if (empty($refUser)){
            return redirect()->back()->with('error', 'This Referral Link is invalid');
        }

        $checkZero = substr($data['mobile_number'], 0, 1);
        if ($checkZero == 0){
            $phoneNumber = $data['country_code'].substr($data['mobile_number'], 1);
        }else{
            $phoneNumber = $data['country_code'].$data['mobile_number'];
        }
        $user = User::create([
            'username'      => uniqid('go-').uniqid(),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'mobile_number' => $phoneNumber,
            'date_of_birth' => date('Y-m-d', strtotime($data['date_of_birth'])),
            'referred_id'   => isset($refUser) ? $refUser->id:null,
            'gender'        => $data['gender'],
            'password'      => Hash::make($data['password']),
        ]);

        if (!empty($user)){
            $updateUser = User::find($user->id);
            if (empty($updateUser->referral_code)){
                $updateUser->referral_code = $user->id.'-'.uniqid();
                $updateUser->save();
            }
            UserDeviceUse::create([
                'user_id' => $user->id,
                'android' => isset($data['android']) ? 1:0 ,
                'ios' => isset($data['ios']) ? 1:0 ,
                'desktop' => isset($data['desktop']) ? 1:0 ,
                'all' => isset($data['use_all']) ? 1:0 ,
            ]);
            createUserLoginLog($user->id);
        }
        try {
            if(!empty($user)){
                createUserLoginLog($user->id);
                \Auth::loginUsingId($user->id, true);
                \Session::flash('success', 'User Register and login successfully!!');
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Register failed please try again !!');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function avatarStore(Request $request, User $user)
    {
        //dd($request);
        $old_avatar = $user->profile_photo;
        if ($request->file('profile_photo')) {
            if (file_exists(public_path('/images/').$old_avatar)) {
                unlink(public_path('/images/').$old_avatar);
            }
            $fileName = $request->profile_photo->getClientOriginalName();
            $imageRename = time(). '_' .$fileName;
            $request->profile_photo->storeAs('images', $imageRename, 'public');
            $user->profile_photo = $imageRename;
            $user->save();
            if ($user->save()) {
                $newsfeed = new Newsfeed();
                if ($request->file('profile_photo')) {
                    $fileName = $request->profile_photo->getClientOriginalName();
                    $imageRename = time(). '_avatar_' .$fileName;
                    $request->profile_photo->storeAs('images', $imageRename, 'public');
                    $newsfeed->image = $imageRename;

                    $newsfeed->status = 0;
                    $newsfeed->user_id = Auth::user()->id;
                    $newsfeed->save();
                }
            }
        }
        return response()->json([$old_avatar], 200);
    }

    public function coverStore(Request $request, User $user)
    {
        $old_cover = $user->cover_photo;
        if ($request->file('cover_photo')) {
            if (file_exists(public_path('/images/').$old_cover)) {
                unlink(public_path('/images/').$old_cover);
            }
            $fileName = $request->cover_photo->getClientOriginalName();
            $imageRename = time(). '_' .$fileName;
            $request->cover_photo->storeAs('images', $imageRename, 'public');
            $user->cover_photo = $imageRename;
            $user->save();
            if ($user->save()) {
                $newsfeed = new Newsfeed();
                if ($request->file('cover_photo')) {
                    $fileName = $request->cover_photo->getClientOriginalName();
                    $imageRename = time(). '_cover_' .$fileName;
                    $request->cover_photo->storeAs('images', $imageRename, 'public');
                    $newsfeed->image = $imageRename;

                    $newsfeed->status = 0;
                    $newsfeed->user_id = Auth::user()->id;
                    $newsfeed->save();
                }
            }
        }
        return response()->json([$old_cover], 200);
    }

}
