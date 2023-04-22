<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Business;

class BookingController extends Controller
{
    // show all bookings
    public function index()
    {
        $id = Auth::id();
        $bookings = Booking::where('client_id', $id)->get();
        return view('bookings.index', compact('bookings'));
    }

    // show the form to create a new Booking
    public function create()
    {
        $clients = Client::all();
        return view('bookings.create', [
            'clients' => $clients,
        ]);
    }

    // save a new Booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required',
            'finish_time' => 'required',
            'title' => 'nullable',
            'client_id' => 'required',
            'employee_id' => 'required',
            'created_at' => 'required'
        ]);

        $booking = Booking::create($validated);
        return redirect()->route('bookings.show', $booking);
    }

    // show a specific Booking
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    // show the form to edit an existing Booking
    public function edit($id)
    {
        $booking = Booking::findorfail($id);
        return view('bookings.edit', [
            'booking' => $booking
        ]);
    }

    // update an existing Booking
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'start_time' => 'required',
            'finish_time' => 'required',
        ]);

        $booking->update($validated);
        return redirect()->route('bookings');
    }

    // delete an Booking
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
