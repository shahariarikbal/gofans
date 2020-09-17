<?php

namespace App\Http\Controllers\Client;

use App\Models\Campaign;
use App\Models\SideNotification;
use Auth;
use App\User;
use Validator;
use App\Client;
use App\Models\UserLoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(){
        $volums = $this->getCountryWiseUserVolume();
        $notifications = SideNotification::where('client_id', auth()->id())->where('is_delete', 0)->orderBy('id', 'desc')->get();

        $campaigns = Campaign::select(DB::raw('COUNT(id) AS totalCampaigns'), DB::raw('SUM(bid_amount * quantity) AS totalAmount'))->where('status', 0);
        $campaigns = Campaign::select(DB::raw('COUNT(id) AS totalCampaigns'), DB::raw('SUM(bid_amount * quantity) AS totalAmount'))->unionAll($campaigns)->get();

//        dd($campaigns[0]->totalCampaigns);

        return view('client.index',compact('volums', 'notifications', 'campaigns'));
    }

    public function profileView(){
        $data = Auth::guard('client')->user();
        return view('client.profile.view', compact('data'));
    }

    public function profileEdit(){
        $data = Auth::guard('client')->user();
        return view('client.profile.edit', compact('data'));
    }

    public function profileUpdate(Request $request, $id){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|max:191|unique:clients,email,' . $id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('profile_photo')) {
                $client= Client::find($id);
                if ($client->profile_photo){
                    if (!file_exists(public_path('media/profile/'.$client->profile_photo))){
                        $client->profile_photo = null;
                    }else{
                        unlink('media/profile/'.$client->profile_photo);
                    }
                }
                $file = $request->file('profile_photo');
                $name = $id.".client_".time(). "." . $file->getClientOriginalExtension();
                $file->move('media/profile/', $name);
                $data['profile_photo'] = $name;
            }
            Client::find($id)->update($data);
            return  redirect()->back()->with('success', 'Your profile updated successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }


    public function twoFaAuthActive(){
        try {
            $client = Client::find(auth()->id());
            $client->two_fa_auth = 1;
            $client->save();
            return response()->json([
                'status' => 200,
                'message' => "Your tow factor authentication is actived.",
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function twoFaAuthInactive(){
        try {
            $client = Client::find(auth()->id());
            $client->two_fa_auth = 0;
            $client->save();
            return response()->json([
                'status' => 200,
                'message' => "Your tow factor authentication is inactived.",
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /* seamless functionality */
    public function getCountryWiseUserVolume()
    {
        return User::select(DB::raw('COUNT(id) AS totalUser'), 'country', 'country_code')->groupBy('country', 'country_code')->get();
    }
    /* end of seamless functionality */

}
