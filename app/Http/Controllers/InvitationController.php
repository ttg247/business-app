<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Check if the business exists
     * if it exists, reroute the user to the register page to create an account.
     * if it doesn't exist, return false.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        // Retrieve the workhours for the authenticated business
        $user_code = $request->input('invite_code');
        $business = Business::where('invite_link', $user_code)->firstOrFail();        
        if ($business) {
            return redirect()->route('register', ['business' => $business]);
        }else {
            return false;
        }
    }

    
}
