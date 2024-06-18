<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactEntry;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('pages.contact');
    }

    public function submitForm(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'privacy_policy' => 'required|accepted',
        ], [
            'privacy_policy.required' => 'You must agree to the privacy policy.',
            'privacy_policy.accepted' => 'You must agree to the privacy policy.',
        ]);

        // Create a new ContactEntry instance
        $entry = new ContactEntry();
        $entry->first_name = $request->first_name;
        $entry->last_name = $request->last_name;
        $entry->email = $request->email;
        $entry->subject = $request->subject;
        $entry->message = $request->message;
        $entry->privacy_policy = $request->privacy_policy;
        
        // Save the entry to the database
        $entry->save();
        
        // Redirect back with success message
        return redirect()->route('pages.contact')->with('success', 'Form submitted successfully!');
    }
}
