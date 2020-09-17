<?php

namespace App\Http\Controllers\AdminUser;

use App\AdminUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AdminUsers::orderBy('id', 'desc')->get();
        $modules = getAdminUsersModule();
        return view('admin_user.administrator.index', compact('data', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $modules = getModule();
        return view('admin_user.administrator.create', compact('data', 'modules'));
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
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', "unique:admin_users"],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required', Rule::in(['super', 'admin'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
            $data['permission'] = isset($request->access) ? json_encode($request->access):null;
            AdminUsers::create($data);
            return  redirect()->back()->with('success', 'Administrator save successfully!');
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
        $data = AdminUsers::find($id);
        $permission = json_decode($data->permission, true);
        $modules = getModule();
        return view('admin_user.administrator.edit', compact('data', 'modules', 'permission'));
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
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|max:191|unique:admin_users,email,' . $id,
                'role' => ['required', Rule::in(['super_admin', 'admin'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
            $data['permission'] = isset($request->access) ? json_encode($request->access):null;
            AdminUsers::find($id)->update($data);
            return  redirect()->back()->with('success', 'Administrator update successfully!');
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

    public function profileView(){
        $data = Auth::guard('admin')->user();
        return view('admin_user.profile.view', compact('data'));
    }

    public function profileEdit(){
        $data = Auth::guard('admin')->user();
        return view('admin_user.profile.edit', compact('data'));
    }
}
