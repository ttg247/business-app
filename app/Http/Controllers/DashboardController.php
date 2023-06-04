<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // retrieve the business with the given ID
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;
        $business = Business::where('id', $user_business_id)->firstOrFail();  

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
