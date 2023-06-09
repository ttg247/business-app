<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $contacts = Appointment::all();

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

        $contact = Appointment::create($validatedData);

        return redirect()->route('contacts.show', $contact->id)->with('success', 'Contact created successfully.');
    }

    public function show($id)
    {
        $contact = Appointment::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Appointment::findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $contact = Appointment::findOrFail($id);
        $contact->update($validatedData);

        return redirect()->route('contacts.show', $contact->id)->with('success', 'Contact updated successfully.');
    }

    public function destroy($id)
    {
        $contact = Appointment::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
