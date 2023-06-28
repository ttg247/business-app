<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Contact;
use App\Models\Account;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        $accounts = Account::all();        
        $contacts = Contact::all();
        return view('leads.index', compact('leads', 'contacts', 'accounts'));
    }

    public function create()
    {
        $accounts = Account::all();
        $contacts = Contact::all();
        return view('leads.create', compact('accounts', 'contacts'));
    }

    public function store(Request $request)
    {

        $lead = new Lead;
        $lead->contact_id = $request->input('contact');
        $lead->account_id = $request->input('account');
        $lead->user_id = Auth::id();
        $lead->job_title = $request->input('job_title');
        $lead->department = $request->input('department');
        $lead->status = $request->input('status');
        $lead->source = $request->input('source');
        $lead->source_description = $request->input('source_description');
        $lead->referred_by = $request->input('referred_by');
        $lead->save();

        return redirect()->route('allLeads')->with('success', 'lead created successfully.');
    }

    public function show($id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.show', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $accounts = Account::all();        
        $contacts = Contact::all();

        return view('leads.edit', compact('lead', 'accounts', 'contacts'));
    }

    public function update(Request $request, $id)
    {

        $lead = Lead::findOrFail($id);
        $lead->update([
            $lead->contact_id = $request->input('contact'),
            $lead->account_id = $request->input('account'),
            $lead->job_title = $request->input('job_title'),
            $lead->department = $request->input('department'),
            $lead->status = $request->input('status'),
            $lead->source = $request->input('source'),
            $lead->source_description = $request->input('source_description'),
            $lead->referred_by = $request->input('referred_by'),
        ]);

        return redirect()->route('allLeads', $lead->id)->with('success', 'lead updated successfully.');
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

