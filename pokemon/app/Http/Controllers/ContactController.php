<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function getContact(){
        return view('contact');
    }

    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]); 
        Contact::create ($request->all());

        return back()->with ('status', __('Your message has been recorded, we will respond as soon as possible.'));
    }
}
