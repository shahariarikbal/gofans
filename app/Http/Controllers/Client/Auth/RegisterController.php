<?php

namespace App\Http\Controllers\Client\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Interested;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('client');
    }

    public function showRegister()
    {
        return view('client.auth.register');
    }

    public function register(Request $request){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', "unique:clients"],
                'mobile_number' => ['required', 'max:20'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $checkZero = substr($data['mobile_number'], 0, 1);
            if ($checkZero == 0){
                $phoneNumber = $data['country_code'].substr($data['mobile_number'], 1);
            }else{
                $phoneNumber = $data['country_code'].$data['mobile_number'];
            }

            $data['password'] = Hash::make($request->password);
            $data['mobile_number'] = $phoneNumber;
            $data['status'] = 3;
            $client = Client::create($data);
            if ($request->type == 'publisher') {
                if (!empty($data['client_interesteds'])) {
                    $interestedIds = [];
                    foreach ($data['client_interesteds'] as $k => $ciID) {
                        $interestedIds[] = [
                            'client_id'   => $client->id,
                            'client_interested_id'   => $k,
                        ];
                    }
                    if (!empty($interestedIds)) {
                        Interested::insert($interestedIds);
                    }
                }
            }
            return  redirect(route('client.login'))->with('success', 'Your registration successfully! Please login !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

}
