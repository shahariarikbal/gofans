<?php

namespace App\Http\Controllers\Client\Web;

use App\Http\Controllers\Controller;
use App\Models\ClientInterested;
use App\Models\Contact;
use App\Models\ContactSetting;
use Illuminate\Http\Request;
use Validator;

class WebController extends Controller
{
    public function index()
    {
        return view('client.web.index');
    }

    public function advertisers()
    {
        return view('client.web.advertisers');
    }

    public function publishers()
    {
        return view('client.web.publishers');
    }

    public function about()
    {
        return view('client.web.about');
    }

    public function terms()
    {
        return view('client.web.terms');
    }

    public function privacy()
    {
        return view('client.web.privacy');
    }

    public function login()
    {
        return view('client.web.login');
    }

    public function register()
    {
        $interesteds = ClientInterested::get();
        return view('client.web.register', compact('interesteds'));
    }

    public function contact()
    {
        $contact = ContactSetting::where('type', 'client-web')->first();
        return view('client.web.contact', compact('contact'));
    }

    public function contactStore(Request $request)
    {
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email',  'max:255'],
                'message' => ['required', 'max:400'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            Contact::create([
                'type'       => 'client-web',
                'name'       => $data['name'],
                'email'      => $data['email'],
                'subject'    => $data['subject'],
                'message'    => $data['message'],
                'ip_address' => getIpAddress(),
            ]);
            return  redirect()->back()->with('success', 'Thank you for contact us, We will contact soon.');
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function customerSupport(){
        return view('client.web.customer_support');
    }

    public function resourcesBlog(){
        return view('client.web.resources_blog');
    }

    public function pressNews(){
        return view('client.web.press_news');
    }

    public function error()
    {
        return view('client.web.error');
    }

    public function loginCheck()
    {

    }

    public function loginAccess($loginKey)
    {

    }

}
