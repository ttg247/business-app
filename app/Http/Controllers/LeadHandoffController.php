<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadHandoffController extends Controller
{
    public function handoff(Lead $lead)
    {
        // Retrieve the sales representative(s) responsible for the handoff
        $salesReps = User::whereIn('role', ['sales', 'account_manager'])->get();

        // Update the lead record with the assigned sales representative(s)
        $lead->salesReps()->sync($salesReps);

        // Optionally, you can add additional logic here, such as sending notifications or updating status

        return response()->json(['message' => 'Lead handoff completed']);
    }
}
