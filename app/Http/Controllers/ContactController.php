<?php

// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard', ['contacts' => $contacts]);
    }
    
    /**
     * Show the contact form.
     */
    public function showForm()
    {
        return view('landing'); // Adjust to your view's name if needed
    }

    /**
     * Handle the contact form submission.
     */
    public function submitForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact record
        Contact::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('landing')->with('success', 'Message sent successfully!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
    
}
