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
        if($request->user()) {
            $request->merge([
                'user_id' => $request->user()->id,
                'name'    => $request->user()->name,
                'email'   => $request->user()->email,
            ]);
        }
        Contact::create ($request->all());
        return back()->with ('status', __('Your message has been recorded, we will respond as soon as possible.'));
}
    
    }
