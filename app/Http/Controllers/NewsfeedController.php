<?php

namespace App\Http\Controllers;

use App\Models\Newsfeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsfeedController extends Controller
{
    public function store(Request $request)
    {

        $newsfeed = new Newsfeed();
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $imageRename = time(). '_' .$fileName;
            $request->image->storeAs('images', $imageRename, 'public');
            $newsfeed->image = $imageRename;

            $newsfeed->status = $request->status;
            $newsfeed->user_id = Auth::user()->id;
            $newsfeed->save();
        }
        if ($request->newsfeed_text) {
            $newsfeed->newsfeed_text = $request->newsfeed_text;
            $newsfeed->status = $request->status;
            $newsfeed->user_id = Auth::user()->id;
            $newsfeed->save();
        }

        if ($request->hasFile('image') == '' && $request->newsfeed_text == '') {
            return redirect()->back()->with('error', 'Newsfeed Text or image required');
        }
        return redirect()->back()->with('success', 'Newsfeed has been uploaded');
    }

    public function edit(Newsfeed $newsfeed)
    {
        return $newsfeed;
    }

    public function update(Request $request)
    {
        $newsfeed = Newsfeed::find($request->id);
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $imageRename = time(). '_' .$fileName;
            $request->image->storeAs('images', $imageRename, 'public');
            $newsfeed->image = $imageRename;
        }
        $newsfeed->newsfeed_text = $request->newsfeed_text;
        $newsfeed->status = $request->status;
        $newsfeed->user_id = Auth::user()->id;
        $newsfeed->save();
        return redirect()->back()->with('success', 'Newsfeed has been updated');
    }

    public function delete($id)
    {
        $newsfeed = Newsfeed::find($id);
        $newsfeed->delete();
        return redirect()->back()->with('success', 'Newsfeed has been deleted');
    }
}
