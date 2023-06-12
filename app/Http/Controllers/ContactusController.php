<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function append_conatact_us_form(){

      return view('pages.ContactUs');
    }
    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'yourQuery' => 'required|max:500'
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        Contact::insert([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'yourQuery' => $request->yourQuery,
        ]);
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Thanks for being awesome! We have received your message and would like to thank you for writing to us. ..."]); 
    }

    public function view_contact_details(){
        $Contact = Contact::latest()->get();
        return view('admin.contact.contactview', compact('Contact'));

        dd('jkkjjkkjjk');

    }
}
