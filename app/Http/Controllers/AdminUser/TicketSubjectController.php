<?php

namespace App\Http\Controllers\AdminUser;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketSubject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class TicketSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TicketSubject::orderBy('id', 'desc')->get();
        return  view('admin_user.ticket_subject.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return  view('admin_user.ticket_subject.create', compact('data'));
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
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            TicketSubject::create($data);
            return  redirect()->back()->with('success', 'Subject save successfully!');
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
        $data = TicketSubject::find($id);
        return  view('admin_user.ticket_subject.edit', compact('data'));
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
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            TicketSubject::find($id)->update($data);
            return  redirect()->back()->with('success', 'Subject update successfully!');
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

    public function userTickets(){
        $data = Ticket::orderBy('id', 'desc')->get();
        return  view('admin_user.ticket_subject.tickets', compact('data'));
    }

    public function ticketOpen($id){
        try{
            $data = Ticket::find($id);
            $data->close_date = null;
            $data->status = 1;
            $data->save();
            return  redirect()->back()->with('success', 'Ticket ticket open successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function ticketClosed($id){
        try{
            $data = Ticket::find($id);
            $data->close_date = now();
            $data->status = 0;
            $data->save();
            return  redirect()->back()->with('success', 'Ticket ticket closed successfully!');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
