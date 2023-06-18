<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;

class OpportunityController extends Controller
{
    public function menu()
    {
        $pipeline = Opportunity::all();

        return view('opportunities.menu');
    }

    public function index()
    {
        $opportunities = Opportunity::all();

        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $deal = Opportunity::create($validatedData);

        return redirect()->route('opportunities.show', $deal->id)->with('success', 'deal created successfully.');
    }

    public function show($id)
    {
        $deal = Opportunity::findOrFail($id);

        return view('opportunities.show', compact('deal'));
    }

    public function edit($id)
    {
        $deal = Opportunity::findOrFail($id);

        return view('opportunities.edit', compact('deal'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $deal = Opportunity::findOrFail($id);
        $deal->update($validatedData);

        return redirect()->route('opportunities.show', $deal->id)->with('success', 'deal updated successfully.');
    }

    public function destroy($id)
    {
        $deal = Opportunity::findOrFail($id);
        $deal->delete();

        return redirect()->route('opportunities.index')->with('success', 'deal deleted successfully.');
    }

    //creates a new proposal
    public function createProposal($id)
    {

    }

    //creates a new offer
    public function createOffer($id)
    {

    }

    //close an existing deal
    public function close($id)
    {

    }
}

