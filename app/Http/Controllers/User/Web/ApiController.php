<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Newsfeed;
use App\Models\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Validator;

class ApiController extends Controller
{

    public function getUser(Request $request){
        try {
            $user = User::where('username', $request->username)->first();

            $userData = [
                'id'                    =>  $user->id,
                'name'                  =>  $user->name,
                'email'                 =>  $user->email,
                'profile_photo'         =>  $user->profile_photo,
                'cover_photo'           =>  $user->cover_photo,
                'profile_step_count'    =>  $user->profile_step_count,
            ];

            return response()->json([
                'status' => 200,
                'user' => $userData,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function getNewsfeed(Request $request){
        try {
            if ($request->has('username')){
                $user = User::select('id')->where('username', $request->username)->first();
                $newsfeeds = Newsfeed::with('user', 'comments')->where('user_id', $user->id)->with('user', 'comments')->where('status', 0)->orderBy('created_at', 'desc')->get();
            }else{
                $newsfeeds = Newsfeed::with('user', 'comments')->where('status', 0)->orderBy('created_at', 'desc')->get();
            }

            $newsfeedData = [];
            foreach ($newsfeeds as $key => $newsfeed){
                $newsfeedData[] = [
                    'id'            => $newsfeed->id,
                    'user_id'       => $newsfeed->user_id,
                    'newsfeed_text' => $newsfeed->newsfeed_text,
                    'image'         => $newsfeed->image,
                    'video'         => $newsfeed->video,
                    'video_image'   => getYoutubeImage($newsfeed->video),
                    'status'        => $newsfeed->status,
                    'total_comment' => thousandsOfFormat($newsfeed->comments->count()),
                    'created_at'    =>  date('d-M-Y', strtotime($newsfeed->created_at)),
                    'user' => [
                        'username'      => $newsfeed->user->username,
                        'id'            => $newsfeed->user->id,
                        'name'          => $newsfeed->user->name,
                        'email'         => $newsfeed->user->email,
                        'profile_photo' => $newsfeed->user->profile_photo!='' && file_exists('storage/images/'.$newsfeed->user->profile_photo) ? $newsfeed->user->profile_photo:null,
                    ],
                    'comments' => getComments($newsfeed->id)
                ];
            }

            return response()->json([
                'status' => 200,
                'newsfeed' => $newsfeedData,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function newsfeedStore(Request $request)
    {
        try {
            $newsfeed = new Newsfeed();
            if ($request->hasFile('image')) {
                $fileName = $request->image->getClientOriginalName();
                $imageRename = time(). '_' .$fileName;
                $request->image->storeAs('images', $imageRename, 'public');
                $newsfeed->image = $imageRename;

                $newsfeed->status = 0;
                $newsfeed->user_id = Auth::user()->id;
                $newsfeed->save();
            }
            if ($request->newsfeed_text) {
                $newsfeed->newsfeed_text = $request->newsfeed_text;
                $newsfeed->status = 0;
                $newsfeed->user_id = Auth::user()->id;
                $newsfeed->save();
            }
            if ($request->video) {
                $newsfeed->video = $request->video;
                $newsfeed->status = 0;
                $newsfeed->user_id = Auth::user()->id;
                $newsfeed->save();
            }
            return response()->json([
                'status' => 200,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function newsfeedEdit(Newsfeed $newsfeed)
    {
        return $newsfeed;
    }

    public function newsfeedUpdate(Request $request, $id)
    {
        try {
            $newsfeed = Newsfeed::find($id);
            if ($request->hasFile('image')) {
                if ($newsfeed->image){
                    if (!file_exists(public_path('/storage/images/').$newsfeed->image)) {
                        $newsfeed->image = null;
                    }else {
                        unlink(public_path('/storage/images/').$newsfeed->image);
                    }
                }
                $request->file('image');
                $fileName = $request->image->getClientOriginalName();
                $imageRename = time(). '_' .$fileName;
                $request->image->storeAs('images', $imageRename, 'public');
                $newsfeed->image = $imageRename;
            }
            $newsfeed->newsfeed_text = $request->newsfeed_text;
            $newsfeed->video = $request->video;
            $newsfeed->status = 0;
            $newsfeed->user_id = Auth::user()->id;
            $newsfeed->save();
            return response()->json([
                'status' => 200,
            ], 200);
        } catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function newsfeedDelete(Newsfeed $newsfeed)
    {
        try {
            $image_path = public_path('/storage/images/').$newsfeed->image;
                if ($newsfeed->image) {
                    if (file_exists(public_path('/storage/images/').$newsfeed->image)) {
                        unlink($image_path);
                    }
                }
            $newsfeed->delete();
            return response()->json(['status' => 200,], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function modalImageDelete($id)
    {
        try {
            $newsfeed = Newsfeed::find($id);
            if ($newsfeed->image){
                if (!file_exists(public_path('/storage/images/').$newsfeed->image)) {
                    $newsfeed->image = null;
                }else {
                    unlink(public_path('/storage/images/').$newsfeed->image);
                }
                $newsfeed->image = null;
            }
            $newsfeed->save();

            return response()->json([
                'status' => 200,
                'message' => 'Image remove successfully.'
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function commentStore(Request $request)
    {
        try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'body' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 500,
                    'error' => $validator->errors()
                ], 200);
            }

            $comment = Comment::create([
                'post_id'  => $data['post_id'],
                'user_id'  => auth()->id(),
                'body'     => $data['body'],
            ]);

            if (!empty($comment)){
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment save successfully!!',
                ], 200);
            }else{
                return response()->json([
                    'status' => 'failed'
                ], 200);
            }

        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function commentEdit(Comment $comment)
    {
        return $comment;
    }

    public function replyEdit(Reply $reply)
    {
        return $reply;
    }

    public function commentUpdate(Request $request, $id)
    {
        try {
            $commentUpdate = Comment::find($id);
            $commentUpdate->body = $request->body;
            $commentUpdate->save();

            if (!empty($commentUpdate)){
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment has been updated!!',
                ], 200);
            }else{
                return response()->json([
                    'status' => 'failed'
                ], 200);
            }

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function commentDelete(Comment $comment)
    {
        try {
            $comment->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Comment has been deleted!!',
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function replyStore(Request $request)
    {
        try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'body' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 500,
                    'error' => $validator->errors()
                ], 200);
            }

            $reply = Reply::create([
                'comment_id'  => $data['comment_id'],
                'user_id'  => auth()->id(),
                'body'     => $data['body'],
            ]);

            if (!empty($reply)){
                return response()->json([
                    'status' => 200,
                    'message' => 'Reply save successfully!!',
                ], 200);
            }else{
                return response()->json([
                    'status' => 'failed'
                ], 200);
            }

        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function replyUpdate(Request $request, $id)
    {
        try {
            $replyUpdate = Reply::find($id);
            $replyUpdate->body = $request->body;
            $replyUpdate->save();

            if (!empty($replyUpdate)){
                return response()->json([
                    'status' => 200,
                    'message' => 'Reply has been updated!!',
                ], 200);
            }else{
                return response()->json([
                    'status' => 'failed'
                ], 200);
            }

        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function replyDelete(Reply $reply)
    {
        try {
            $reply->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Reply has been deleted!!',
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }


    public function getCountry(){
        try {
            $country = [
                'current_country' => isset(getCountryInfo()->geoplugin_countryName) ? getCountryInfo()->geoplugin_countryName:null,
                'countries'       => getCountries()
            ];
            return response()->json([
                'status' => 200,
                'country' => $country,
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function userProfilePictureChange(Request $request, User $user)
    {
        try {
            $old_avatar = $user->profile_photo;
            if ($request->hasFile('profile_photo')) {
                $fileName = $request->profile_photo->getClientOriginalName();
                $imageRename = time(). '_' .$fileName;
                $request->profile_photo->storeAs('images', $imageRename, 'public');
                $user->profile_photo = $imageRename;
                $user->save();
            }
            return response()->json([$old_avatar], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function userCoverPictureChange(Request $request, User $user)
    {
        try {
            $old_cover_photo = $user->cover_photo;
            if ($request->hasFile('cover_photo')) {
                $fileName = $request->cover_photo->getClientOriginalName();
                $imageRename = time(). '_' .$fileName;
                $request->cover_photo->storeAs('images', $imageRename, 'public');
                $user->cover_photo = $imageRename;
                $user->save();
            }
            return response()->json([$old_cover_photo], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function userPhotos(Request $request)
    {
        try {
            if ($request->has('username')){
                $user = User::select('id')->where('username', $request->username)->first();
                $userPhotos = Newsfeed::select('image')->with('user')->where('image',  '!=', null)->where('user_id', $user->id)->where('status', 0)->orderBy('created_at', 'desc')->get();
            }else{
                $userPhotos = Newsfeed::select('image')->with('user')->where('image',  '!=', null)->where('status', 0)->orderBy('created_at', 'desc')->get();
            }

            return response()->json([
                'status' => 200,
                'userPhoto' => $userPhotos,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }

    public function userVideos(Request $request)
    {
        try {
            if ($request->has('username')){
                $user = User::select('id')->where('username', $request->username)->first();
                $userVideos = Newsfeed::select('video')->with('user')->where('user_id', $user->id)->where('video',  '!=', null)->where('status', 0)->orderBy('created_at', 'desc')->get();
            }else{
                $userVideos = Newsfeed::select('video')->with('user')->where('video',  '!=', null)->where('status', 0)->orderBy('created_at', 'desc')->get();
            }

            $newsfeedUserVideo = [];
            foreach ($userVideos as $key => $userVideo){
                $newsfeedUserVideo[] = [
                    'id'            => $userVideo->id,
                    'user_id'       => $userVideo->user_id,
                    'video'         => $userVideo->video,
                    'video_image'   => getYoutubeImage($userVideo->video),
                ];
            }

            return response()->json([
                'status' => 200,
                'userVideo' => $newsfeedUserVideo,
            ], 200);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => 500,
                'error' => $exception->getMessage()
            ], 200);
        }
    }
}
