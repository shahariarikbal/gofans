<?php

namespace App\Http\Controllers\AdminUser;

use App\Http\Controllers\Controller;
use App\Models\UserMessage;
use App\Models\UserMessageSend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserMessage::orderBy('id', 'desc')->get();
        return view('admin_user.user_message.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $users = User::orderBy('id', 'desc')->get();
        return view('admin_user.user_message.create', compact('data', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required', 'max:500'],
                'users' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $message = UserMessage::create($data);

            if ($message->id){
                if (!empty($data['users'])) {
                    $users = $data['users'];
                    $userData = [];
                    foreach ($users as $k => $user) {
                        if ($user == 0){
                            $userData[] = [
                                'user_id'   => $user,
                                'message_id' => $message->id,
                                'status' => 0,
                            ];
                            break;
                        }else{
                            $userData[] = [
                                'user_id'   => $user,
                                'message_id' => $message->id,
                                'status' => 0,
                            ];
                        }
                    }
                    if (!empty($userData)) {
                        UserMessageSend::insert($userData);
                    }else{
                        return redirect()->back()->with('error', 'Users Message send failed!');
                    }
                }
            }

            return  redirect()->back()->with('success', 'Users message send successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserMessage::find($id);
        $data->getMessage = $data->getMessage->pluck('user_id')->toArray();
        $users = User::orderBy('id', 'desc')->get();
        return view('admin_user.user_message.edit', compact('data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required', 'max:500'],
                'users' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $message = UserMessage::find($id)->update($data);
            if ($message == true){
                if (!empty($data['users'])) {
                    UserMessageSend::where('message_id', $id)->delete();
                    $users = $data['users'];
                    $userData = [];
                    foreach ($users as $k => $user) {
                        if ($user == 0){
                            $userData[] = [
                                'user_id'   => $user,
                                'message_id' => $id,
                                'status' => 0,
                            ];
                            break;
                        }else{
                            $userData[] = [
                                'user_id'   => $user,
                                'message_id' => $id,
                                'status' => 0,
                            ];
                        }
                    }
                    if (!empty($userData)) {
                        UserMessageSend::insert($userData);
                    }else{
                        return redirect()->back()->with('error', 'Users Message send failed!');
                    }
                }
            }

            return  redirect()->back()->with('success', 'Users message send successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
