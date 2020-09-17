<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\Friendship;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class FriendController extends Controller
{

    public function getSuggestFriend(){
        try {
            $friends = User::select('users.id', 'users.username', 'users.name', 'users.profile_photo', 'friendships.status AS friendStatus')
            ->leftJoin('friendships', function ($join) {
                $join->on(function ($q) {
                    $q->on('friendships.sender_id', 'users.id');
                    $q->on('friendships.receiver_id', \DB::raw(auth()->user()->id));
                });
                $join->orOn(function ($q) {
                    $q->on('friendships.receiver_id', 'users.id');
                    $q->on('friendships.sender_id', \DB::raw(auth()->user()->id));
                });
            })->whereNull('friendships.id')
            ->where('users.id', '!=', Auth::id())->orderBy('users.id', 'desc')->get();
            return response()->json([
                'status' => 200,
                'friends' => $friends,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function getFriendship(Request $request){
        try {
            $user = User::select('id')->where('username', $request->username)->first();
            $users = Friendship::select('users.id', 'users.username', 'users.name', 'users.profile_photo', 'friendships.status AS friendStatus', 'friendships.id AS friendId')
                ->where('friendships.receiver_id', isset($user) ? $user->id : Auth::id())
                ->where('friendships.status', $request->request_type)
                ->leftJoin('users', 'friendships.sender_id', '=', 'users.id')
                ->orderBy('users.id', 'desc')
                ->get();
            return response()->json([
                'status'     => 200,
                'friendship' => $users,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function getFriends(Request $request){
        try {
            $user = User::select('id')->where('username', $request->username)->first();
            $users = Friendship::select('users.id', 'users.username', 'users.email', 'users.name', 'users.profile_photo', 'friendships.status AS friendStatus', 'friendships.id AS friendId')
                ->where('friendships.status', 'accept')
                ->leftJoin('users', function ($join) use ($user){
                    $join->on(function ($q) use ($user) {
                        $q->on('friendships.sender_id', 'users.id');
                        $q->on('friendships.receiver_id', \DB::raw($user->id));
                    });
                    $join->orOn(function ($q) use ($user) {
                        $q->on('friendships.receiver_id', 'users.id');
                        $q->on('friendships.sender_id', \DB::raw($user->id));
                    });
                })->where('users.id', '!=', null)
                ->orderBy('users.id', 'desc')
                ->get();
            return response()->json([
                'status'     => 200,
                'friendship' => $users,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function getMyFriendRequest(Request $request){
        try {
            $user = User::select('id')->where('username', $request->username)->first();
            $users = Friendship::select('users.id', 'users.username', 'users.name', 'users.profile_photo', 'friendships.status AS friendStatus', 'friendships.id AS friendId')
                ->where('friendships.status', 'request')
                ->leftJoin('users', function ($join) use ($user){
                    $join->on(function ($q) use ($user) {
                        $q->on('friendships.sender_id', 'users.id');
                        $q->on('friendships.receiver_id', \DB::raw($user->id));
                    });
                    $join->orOn(function ($q) use ($user) {
                        $q->on('friendships.receiver_id', 'users.id');
                        $q->on('friendships.sender_id', \DB::raw($user->id));
                    });
                })->where('users.id', '!=', null)
                ->orderBy('users.id', 'desc')
                ->get();
            return response()->json([
                'status'     => 200,
                'friendship' => $users,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function checkFriend(Request $request){
        try {
            $friends = User::select('users.id', 'users.username', 'users.name', 'users.profile_photo', 'friendships.status AS friendStatus', 'friendships.id AS friendId', 'friendships.sender_id AS requestSendBy')
                ->leftJoin('friendships', function ($join) {
                    $join->on(function ($q) {
                        $q->on('friendships.sender_id', 'users.id');
                        $q->on('friendships.receiver_id', \DB::raw(auth()->user()->id));
                    });
                    $join->orOn(function ($q) {
                        $q->on('friendships.receiver_id', 'users.id');
                        $q->on('friendships.sender_id', \DB::raw(auth()->user()->id));
                    });
                })->where('friendships.id', '!=', null)
                ->where('username', $request->username)->first();

            if ($friends){
                $requestSendBy = isset($friends->requestSendBy) && $friends->requestSendBy == auth()->user()->id ? 'me':'he';
            }else{
                $requestSendBy = null;
            }

            return response()->json([
                'status' => 200,
                'checkFriend' => $friends,
                'requestSendBy' => $requestSendBy,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function addFriend(Request $request){
        try {
            Friendship::create([
                'sender_id'   => Auth::user()->id,
                'receiver_id' => $request->receiver_id,
            ]);
            if ($request->has('type') && $request->type == 'step_profile'){
                $user = User::find(Auth::user()->id);
                $user->profile_step_count = 4;
                $user->save();
            }

            return response()->json([
                'status'  => 200,
                'message' => 'Friend request send successfully'
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function cancelRequest(Request $request){
        try {
            Friendship::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->first()->delete();
            return response()->json([
                'status'  => 200,
                'message' => 'Friend request remove successfully'
            ], 200);

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function acceptRequest(Request $request){
        try {
            $friend = Friendship::find($request->friendId);
            $friend->status = 'accept';
            $friend->save();
            return response()->json([
                'status'  => 200,
                'message' => 'Friend request save successfully.'
            ], 200);

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function blockFriend(Request $request){
        try {
            $friend = Friendship::find($request->friendId);
            $friend->status = 'block';
            $friend->save();
            return response()->json([
                'status'  => 200,
                'message' => 'This Friend has been blocked.'
            ], 200);

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function removeRequest(Request $request){
        try {
           Friendship::find($request->friendId)->delete();
            return response()->json([
                'status'  => 200,
                'message' => 'Friend request remove successfully.'
            ], 200);

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }
}
