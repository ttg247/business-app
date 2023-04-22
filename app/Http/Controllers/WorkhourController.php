<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workhour;
use Illuminate\Support\Facades\Auth;

class WorkhourController extends Controller
{
    public function index()
    {
        // Retrieve the workhours for the authenticated business
        $workhours = Workhour::where('business_id', Auth::id())->firstOrFail();        
        // Return the workhours view with the data
        return view('business.workhours', ['workhours' => $workhours]);
    }

    public function update(Request $request)
    {
        // Retrieve the workhours for the authenticated business
        $workhours = Workhour::where('business_id', Auth::id())->firstOrFail();

        // Update the workhours with the form data
        $workhours->update([
            'monday_start_time' => $request->input('monday_start_time'),
            'monday_end_time' => $request->input('monday_end_time'),
            'tuesday_start_time' => $request->input('tuesday_start_time'),
            'tuesday_end_time' => $request->input('tuesday_end_time'),
            'wednesday_start_time' => $request->input('wednesday_start_time'),
            'wednesday_end_time' => $request->input('wednesday_end_time'),
            'thursday_start_time' => $request->input('thursday_start_time'),
            'thursday_end_time' => $request->input('thursday_end_time'),
            'friday_start_time' => $request->input('friday_start_time'),
            'friday_end_time' => $request->input('friday_end_time'),
            'saturday_start_time' => $request->input('saturday_start_time'),
            'saturday_end_time' => $request->input('saturday_end_time'),
            'sunday_start_time' => $request->input('sunday_start_time'),
            'sunday_end_time' => $request->input('sunday_end_time'),
        ]);

        // Redirect back to the workhours page with a success message
        return redirect()->back()->with('success', 'Workhours updated successfully');
    }

    public function store(Request $request)
    {
        // Check if the workhours for the business already exists
        $workhours = Workhour::where('business_id', Auth::id())->first();

        if ($workhours) {
            // If workhours for the business exist, update them
            $workhours->update([
                'monday_start_time' => $request->monday_start_time,
                'monday_end_time' => $request->monday_end_time,
                'tuesday_start_time' => $request->tuesday_start_time,
                'tuesday_end_time' => $request->tuesday_end_time,
                'wednesday_start_time' => $request->wednesday_start_time,
                'wednesday_end_time' => $request->wednesday_end_time,
                'thursday_start_time' => $request->thursday_start_time,
                'thursday_end_time' => $request->thursday_end_time,
                'friday_start_time' => $request->friday_start_time,
                'friday_end_time' => $request->friday_end_time,
                'saturday_start_time' => $request->saturday_start_time,
                'saturday_end_time' => $request->saturday_end_time,
                'sunday_start_time' => $request->sunday_start_time,
                'sunday_end_time' => $request->sunday_end_time,
            ]);
        } else {
            // If workhours for the business do not exist, create new ones
            $workhours = Workhour::create([
                'business_id' => Auth::id(),
                'monday_start_time' => $request->monday_start_time,
                'monday_end_time' => $request->monday_end_time,
                'tuesday_start_time' => $request->tuesday_start_time,
                'tuesday_end_time' => $request->tuesday_end_time,
                'wednesday_start_time' => $request->wednesday_start_time,
                'wednesday_end_time' => $request->wednesday_end_time,
                'thursday_start_time' => $request->thursday_start_time,
                'thursday_end_time' => $request->thursday_end_time,
                'friday_start_time' => $request->friday_start_time,
                'friday_end_time' => $request->friday_end_time,
                'saturday_start_time' => $request->saturday_start_time,
                'saturday_end_time' => $request->saturday_end_time,
                'sunday_start_time' => $request->sunday_start_time,
                'sunday_end_time' => $request->sunday_end_time,
            ]);
        }

        return redirect()->back()->with('success', 'Workhours updated successfully');
    }

}
