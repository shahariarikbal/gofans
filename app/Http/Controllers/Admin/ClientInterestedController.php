<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientInterested;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ClientInterestedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interesteds = ClientInterested::orderBY('id', 'desc')->get();
        return view('admin.client_interested.index', compact('interesteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required'],
                'status' => ['required', Rule::in(['0', '1'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $dataStore = ClientInterested::create($data);
            return  response()->json($dataStore, 201);
        }catch (\Exception $exception){
            return  response()->json($exception->getMessage());
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
        $interested = ClientInterested::find($id);
        return  $interested;
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
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required'],
                'status' => ['required', Rule::in(['0', '1'])],
            ]);
            $dataUpdate = ClientInterested::find($id)->update($data);
            return  response()->json($dataUpdate, 200);
        }catch (\Exception $exception){
            return  response()->json($exception->getMessage());
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
        try{
            ClientInterested::find($id)->delete();
            return redirect()->back()->with('success', 'This client interested is delete successfully !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function active($id){
        try{
            $data = ClientInterested::find($id);
            $data->status = 1;
            $data->save();
            return back()->with('success', 'This client interested is active !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function inactive($id){
        try{
            $data = ClientInterested::find($id);
            $data->status = 0;
            $data->save();
            return back()->with('success', 'This client interested is inactive !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
