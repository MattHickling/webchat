<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\Contact as ContactRequest;
class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        // dd($request->all());
        return view('contacts.display');
    }

    public function create(ContactRequest $request)
    {
        // dd($request->surname);

        Contact::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'address_line_3' => $request->address_line_3,
            'city' => $request->city,
            'county' => $request->county,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'company' => $request->company,
            'job_title' => $request->job_title,
            'notes' => $request->notes,
            'is_favorite' => $request->boolean('is_favorite', false),
            'is_blocked' => $request->boolean('is_blocked', false),
            'is_subscribed' => $request->boolean('is_subscribed', false),
            'birthdate' => $request->birthdate,
            'source' => $request->source,
            'source_details' => $request->source_details,
        ]);
        return redirect()->back()->with('success', 'Contact added successfully!');
    }
}
