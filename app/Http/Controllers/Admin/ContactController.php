<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = ContactSetting::where('type', 'client-web')->first();
        return view('admin.contact.index', compact('data'));
    }

    public function store(Request $request){
        try {
            ContactSetting::updateOrCreate(
                ['type'   => "client-web"],
                [
                    'email_1'           => $request->get('email_1'),
                    'email_2'           => $request->get('email_2'),
                    'phone_number_1'    => $request->get('phone_number_1'),
                    'phone_number_2'    => $request->get('phone_number_2'),
                    'address'           => $request->get('address'),
                    'map'               => $request->get('map'),
                ]
            );
            return redirect()->back()->with('success', 'Contact setting save successfully');

        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function clientContact(){
        $data = Contact::where('type', 'client-web')->orderBy('id', 'desc')->get();
        return view('admin.contact.contact', compact('data'));

    }
}
