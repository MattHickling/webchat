<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Request $request)
    {
        $userId = auth()->id();

        $contacts = Contact::where('id', '!=', $userId)
            ->where('is_blocked', false)
            ->get();

        $contactId = $request->get('contact_id');

        if ($contactId) {
            $messages = Message::where(function ($query) use ($userId, $contactId) {
                    $query->where('user_id', $userId)
                        ->where('contact_id', $contactId);
                })
                ->orWhere(function ($query) use ($userId, $contactId) {
                    $query->where('user_id', $contactId)
                        ->where('contact_id', $userId);
                })
                ->orderBy('created_at')
                ->get();
        } else {
            $messages = collect(); // no messages if no contact selected
        }

        return view('messages.display', compact('contacts', 'messages', 'contactId', 'userId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'body' => 'required|string',
        ]);

        Message::create([
            'contact_id' => $request->contact_id,
            'content' => $request->body,
            'type' => 'text',
            'status' => 'sent',
            'sent_at' => now(),
            'delivered_at' => now(),
            'read_at' => null,
            'media_url' => $request->media_url ?? null,
            'media_type' => $request->media_type ?? null,
            'reply_to_message_id' => $request->reply_to_message_id ?? null,
            'is_starred' => $request->is_starred ?? false,
            'is_read' => false,
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
