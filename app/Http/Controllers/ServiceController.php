<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('business_id', Auth::id())->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $service = new Service();
        $service->business_id = Auth::id();
        $service->title = $validatedData['title'];
        $service->description = $validatedData['description'];
        $service->price = $validatedData['price'];
        $service->save();

        return redirect('/services')->with('success', 'Service has been added');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        if ($service->business_id !== Auth::id()) {
            return redirect('/services')->with('error', 'Unauthorized action');
        }
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $service = Service::findOrFail($id);
        if ($service->business_id !== Auth::id()) {
            return redirect('/services')->with('error', 'Unauthorized action');
        }

        $service->title = $validatedData['title'];
        $service->description = $validatedData['description'];
        $service->price = $validatedData['price'];
        $service->save();

        return redirect('/services')->with('success', 'Service has been updated');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->business_id !== Auth::id()) {
            return redirect('/services')->with('error', 'Unauthorized action');
        }
        $service->delete();
        return redirect('/services')->with('success', 'Service has been deleted');
    }
}
