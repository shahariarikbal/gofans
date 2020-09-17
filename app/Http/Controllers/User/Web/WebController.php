<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Newsfeed;
use App\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $newsfeed = Newsfeed::with('user', 'comments')->where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('user.web.index', compact('newsfeed'));
    }

    public function vueIndex()
    {
        return view('user.vue-layout');
    }

    public function about()
    {
        return view('user.web.about');
    }

    public function contact()
    {
        return view('user.web.contact');
    }

    public function error()
    {
        return view('user.web.error');
    }

    public function timeline(User $user)
    {
        $usersPost = Newsfeed::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $showUserTimelinePost = Newsfeed::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        //return $timeLinePost;
        return view('user.web.timeline', compact('usersPost', 'user', 'showUserTimelinePost'));
    }

    public function comment(Request $request, $post)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->body = $request->body;
        $comment->post_id = $post;
        $comment->save();
        return response()->json($comment, 201);
    }

    public function show()
    {
        return Comment::with('user')->get();
    }

    public function privacyPolicy(){
        return view('user.web.privacy_policy');
    }

    public function termsServices(){
        return view('user.web.terms_services');
    }
}
