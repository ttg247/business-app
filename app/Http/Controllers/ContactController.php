<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Address;

class ContactController extends Controller
{
    public function menu()
    {
        return view('contacts.menu');
    }

    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        
        $address = Address::create([
            'street' => $request->input('street'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
        ]);

        $address_id = $address->id;

        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->address_id = $address_id;

        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        // Retrieve all accounts 
        $contact = Contact::findOrFail($id);
        $address_id = $contact->address_id;

        if ($address_id > 0)
        {
            $address = Address::find($address_id);
            $address->update([
                $address->street = $request->input('street'),
                $address->postal_code = $request->input('postal_code'),
                $address->city = $request->input('city'),
                $address->state = $request->input('state'),
                $address->country = $request->input('country'),
            ]);
            $address_id = $address->id;
        }else {
            $new_address = Address::create([
                'street' => $request->input('street'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
            ]);

            $address_id = $new_address->id;

        }
        

        $contact = Contact::findOrFail($id);
        $contact->update([
            $contact->name = $request->input('name'),
            $contact->email = $request->input('email'),
            $contact->phone = $request->input('phone'),
            $contact->address_id = $address_id,
        ]);


        return redirect()->route('contacts.index', $contact->id)->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
