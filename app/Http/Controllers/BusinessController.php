<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the workhours for the authenticated business
        $business = Business::where('users_id', Auth::id())->firstOrFail();        
        $services = Service::where('business_id', $business->id)->get();        
        return view('business.index', compact('business', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $business = new Business;
        $business->name = $request->name;
        $business->summary = $request->summary;
        $business->details = $request->details;
        $business->email = $request->email;
        $business->phone = $request->phone;
        $business->address = $request->address;
        $business->facebook = $request->facebook;
        $business->twitter = $request->twitter;
        $business->instagram = $request->instagram;
        $business->save();

        return redirect()->route('business.index')->with('success', 'Business created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('business.edit', compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $business = Business::where('users_id', Auth::id())->firstOrFail();

        $business->update([
            $business->name = $request->input('name'),
            $business->summary = $request->input('summary'),
            $business->details = $request->input('details'),
            $business->email = $request->input('email'),
            $business->phone = $request->input('phone'),
            $business->address = $request->input('address'),
            $business->facebook = $request->input('facebook'),
            $business->twitter = $request->input('twitter'),
            $business->instagram = $request->input('instagram'),
        ]);

        return redirect()->route('business-settings')->with('success', 'Business updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('business.index')->with('success', 'Business deleted successfully!');
    }

    public function dashboard()
    {
        // retrieve the business with the given ID
        $business = Business::where('users_id', Auth::id())->firstOrFail();

        // count the number of customers for the business
        $customerCount = Customer::where('business_id', $business->id)->count();

        // count the number of reviews for the business
        $reviewCount = Review::where('business_id', $business->id)->count();

        // count the number of bookings for the business
        $bookingCount = Booking::where('business_id', $business->id)->count();

        // return the data to the view
        return view('index', [
            'business' => $business,
            'customerCount' => $customerCount,
            'reviewCount' => $reviewCount,
            'bookingCount' => $bookingCount
        ]);
    }

}
