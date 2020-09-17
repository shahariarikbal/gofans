<?php

namespace App\Http\Controllers\User;

use App\Models\Faq;
use App\Models\UserMessageSend;
use App\User;
use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function twoFactorAuth(){
        return view('user.two_fa_auth.index');
    }

    public function twoFaAuthActive(){
        try {
            $user = User::find(auth()->id());
            $user->two_fa_auth = 1;
            $user->save();
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
            $user = User::find(auth()->id());
            $user->two_fa_auth = 0;
            $user->save();
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

    public function faq()
    {
        $data = Faq::where('status', 1)->orderBy('id', 'desc')->get();
        return view('user.faq', compact('data'));
    }

    public function inbox()
    {
        $countMessage = UserMessageSend::where('user_id', auth()->id())
            ->orWhere('user_id', 0)
            ->count();

        $data = UserMessageSend::with('message')
            ->where('user_id', auth()->id())
            ->orWhere('user_id', 0)
            ->orderBy('message_id', 'desc')
            ->paginate(15);
        return view('user.inbox', compact('data', 'countMessage'));
    }

    public function viewMessage($id){
        try {
            $dataUp = UserMessageSend::find($id);
            $dataUp->status = 1;
            $dataUp->save();
            $data = UserMessageSend::with('message')->find($id);

            $countMessage = UserMessageSend::where('user_id', auth()->id())
                ->orWhere('user_id', 0)
                ->count();
            return view('user.inbox_view', compact('data', 'countMessage'));
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }



}
