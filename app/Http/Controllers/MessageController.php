<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function newChat()
    {
       
       $contacts = Contact::all();
       return view('messages.display', compact('contacts'));
    }

    public function show(Request $request)
    {
        $contacts = Contact::all();
        $contactId = $request->get('contact_id');

        $messages = collect();

        if ($contactId) {
            $messages = Message::where('contact_id', $contactId)
                ->orderBy('created_at')
                ->get();
        }

        return view('messages.show', compact('contacts', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'body' => 'required|string',
        ]);

        Message::create([
            'contact_id' => $request->contact_id,
            'body' => $request->body,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('messages.show', ['contact_id' => $request->contact_id])
            ->with('success', 'Message sent!');
    }




    
    public function create(Request $request)
    {
    
        
        return redirect()->back()->with('success', 'Chat created successfully!');
    }
}
