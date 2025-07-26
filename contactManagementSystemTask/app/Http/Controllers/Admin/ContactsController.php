<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class ContactsController extends Controller
{
  
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

   
    public function create()
    {
        return view('admin.contacts.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|numeric',
            'address' => 'nullable|string|max:255',
        ]);
    
        Contact::create($request->all());
    
        \Log::info('Redirecting after contact creation');
        return redirect()->route('admin.contacts.index')->with('success', 'Contact added successfully.');
    }
    

 
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

   
    public function update(Request $request, $id)
    {
       
        $contact = Contact::findOrFail($id);

      
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|numeric',
            'address' => 'nullable|string|max:255',
        ]);

    
        $contact->update($request->all());

    
        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully.');
    }
    
    
    public function destroy($id)
    {
      
        $contact = Contact::findOrFail($id);
        $contact->delete();

      
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
