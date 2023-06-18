<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Contact;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();

        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'contact_id' => 'required',
            'status' => 'required',
            'score' => 'required',
        ]);

        $lead = Lead::create($validatedData);

        return redirect()->route('leads.show', $lead->id)->with('success', 'lead created successfully.');
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.show', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'contact_id' => 'required',
            'status' => 'required',
            'score' => 'required',
        ]);

        $lead = Lead::findOrFail($id);
        $lead->update($validatedData);

        return redirect()->route('leads.show', $lead->id)->with('success', 'lead updated successfully.');
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'lead deleted successfully.');
    }

    public function showQualifiedLeads()
    {
        $qualifiedLeads = Lead::where('qualified', true)->get();

        return view('leads.qualified', ['leads' => $qualifiedLeads]);
    }

    public function scoreLeads()
    {
        $leads = Lead::all();

        foreach ($leads as $lead) {
            $score = 0;

            // Implement scoring criteria based on lead data
            if ($lead->source === 'referral') {
                $score += 10;
            }
            // Add more scoring rules as needed

            $lead->score = $score;
            $lead->save();
        }

        return response()->json(['message' => 'Leads scored successfully']);
    }

    public function handoff(Lead $lead)
    {
        // Retrieve the sales representative(s) responsible for the handoff
        $salesReps = User::whereIn('role', ['sales', 'account_manager'])->get();

        // Update the lead record with the assigned sales representative(s)
        $lead->salesReps()->sync($salesReps);

        // Optionally, you can add additional logic here, such as sending notifications or updating status

        return response()->json(['message' => 'Lead handoff completed']);
    }

    public function showMenu()
    {
        return view('leads.menu');
    }
    
    public function qualifyLeads()
    {
        $qualificationThreshold = 20; // Define the qualification threshold

        $leads = Lead::all();

        foreach ($leads as $lead) {
            if ($lead->score >= $qualificationThreshold) {
                $lead->qualified = true;
            } else {
                $lead->qualified = false;
            }

            $lead->save();
        }

        return response()->json(['message' => 'Leads qualified successfully']);
    }
}

