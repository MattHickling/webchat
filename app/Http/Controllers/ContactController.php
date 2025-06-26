<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        return view('contacts.display');
    }

    public function create(Request $request)
    {
        
        return redirect()->back()->with('success', 'Contact added successfully!');
    }
}
