<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('id', 'ASC')->get();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view('admin.category.create', compact('data'));
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
                'status' => ['required', Rule::in(['0', '1'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            Category::create($data);
            return  redirect()->back()->with('success', 'Category save successfully!');
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
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
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
                'status' => ['required', Rule::in(['0', '1'])],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            Category::find($id)->update($data);
            return  redirect()->back()->with('success', 'Category update successfully!');
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

    public function active($id){
        try{
            $data = Category::find($id);
            $data->status = 1;
            $data->save();
            return back()->with('success', 'This category is active !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function inactive($id){
        try{
            $data = Category::find($id);
            $data->status = 0;
            $data->save();
            return back()->with('success', 'This category is inactive !!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }


}
