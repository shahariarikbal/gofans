<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketSubject;
use Illuminate\Http\Request;
use Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ticket::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return  view('user.ticket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        $subjects = TicketSubject::where('status', 1)->orderBy('id', 'desc')->get();
        return  view('user.ticket.create', compact('data', 'subjects'));
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
                'subject_id' => ['required', 'numeric'],
                'message' => ['required', 'string', 'max:400'],
            ],[
                'subject_id.required' => 'The subject field is required.',
                'subject_id.numeric' => 'The subject is invalid.'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data['user_id'] = auth()->guard('web')->user()->id;
            Ticket::create($data);
            return  redirect(route('ticket.index'))->with('success', 'Ticket save successfully!');
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
        $data = Ticket::find($id);
        $subjects = TicketSubject::where('status', 1)->orderBy('id', 'desc')->get();
        return  view('user.ticket.edit', compact('data', 'subjects'));
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
                'subject_id' => ['required', 'numeric'],
                'message' => ['required', 'string', 'max:400'],
            ],[
                'subject_id.required' => 'The subject field is required.',
                'subject_id.numeric' => 'The subject is invalid.'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            Ticket::find($id)->update($data);
            return  redirect()->back()->with('success', 'Ticket update successfully!');
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
