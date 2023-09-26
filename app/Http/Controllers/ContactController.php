<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function store(ContactStoreRequest $request)
    {  
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
            'type' => $request->receipt,
        ]);
  
        return redirect()->back()
                         ->with(['success' => 'Merci de nous avoir contacter. Vous recevrez une réponse sous peu.']);
    }
}
