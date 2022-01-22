<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $data=Contact::all();
        return view('pages.contact.contact', compact('data'));
    }

    public function wContact(){
        return view('website.contact');
    }

    public function storeContact(Request $data){
        $data->validate([
            'name'=>'required',
            'email'=>'required',
            'occupation'=>'required',
            'message'=>'required',
        ]);

        Contact::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'occupation'=>$data->occupation,
            'message'=>$data->message,
        ]);
        return redirect()->back()->with('success','Contact submitted successfully.');

    }
    public function deletecontact($delcontact)
    {
        Contact::find($delcontact)->delete();
        return redirect()->back()->with('delete','Event deleted successfully.');
    }


}
