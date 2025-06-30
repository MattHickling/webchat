<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function newChat()
    {
       $contacts = Contact::all();
       return view('messages.display', compact('contacts'));
    }


    
    public function create(Request $request)
    {
    
        
        return redirect()->back()->with('success', 'Chat created successfully!');
    }
}
