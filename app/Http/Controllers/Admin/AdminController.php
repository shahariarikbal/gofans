<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;
use Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::orderBy('id', 'desc')->get();
        $modules = getModule();
        return view('admin.administrator.index', compact('data', 'modules'));
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
        return view('admin.administrator.create', compact('data', 'modules'));
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
                'email' => ['required', 'string', 'email', 'max:255', "unique:users"],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required', Rule::in(['super_admin', 'admin'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
            $data['permission'] = isset($request->access) ? json_encode($request->access):null;
            Admin::create($data);
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
        $data = Admin::find($id);
        $permission = json_decode($data->permission, true);
        $modules = getModule();
        return view('admin.administrator.edit', compact('data', 'modules', 'permission'));
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
                'email' => 'required|max:191|unique:admins,email,' . $id,
                'role' => ['required', Rule::in(['super_admin', 'admin'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['password'] = Hash::make($request->password);
            $data['permission'] = isset($request->access) ? json_encode($request->access):null;
            Admin::find($id)->update($data);
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
        return view('admin.profile.view', compact('data'));
    }

    public function profileEdit(){
        $data = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('data'));
    }

    public function profileUpdate(Request $request, $id){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required|max:191|unique:admins,email,' . $id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            Admin::find($id)->update($data);
            return  redirect()->back()->with('success', 'Your profile updated successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
