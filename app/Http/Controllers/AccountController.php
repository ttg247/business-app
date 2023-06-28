<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $AddressController;

    public function __construct(AddressController $AddressController)
    {
        $this->address = $AddressController;
    }
    /**
     * Display a list of the review settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu()
    {
        $clientId = Auth::id();
        $businessId = Account::where('user_id', $clientId)
                    ->value('id');
        return view('business.menu', compact('businessId'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the workhours for the authenticated business
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;
        $business = Account::where('id', $user_business_id)->firstOrFail();        
        $services = Service::where('business_id', $business->id)->get();        
        return view('business.index', compact('business', 'services'));
    }

    public function all()
    {
        // Retrieve the workhours for the authenticated business
        $businesses = Account::all();               
        return view('business.all', compact('businesses'));
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
        
        $address = Address::create([
            'street' => $request->input('street'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
        ]);

        $address_id = $address->id;

        $business = new Account;

        $business->name = $request->input('name');
        $business->website = $request->input('website');
        $business->summary = $request->input('summary');
        $business->details = $request->input('details');
        $business->email = $request->input('email');
        $business->phone = $request->input('phone');
        $business->address_id = $address_id;
        $business->facebook = $request->input('facebook');
        $business->twitter = $request->input('twitter');
        $business->instagram = $request->input('instagram');
        $business->type = $request->input('type');
        $business->revenue = $request->input('revenue');
        $business->industry = $request->input('industry');
        $business->invite_link = $request->input('invitation');
        
        $business->save();
 
        return redirect()->route('accounts_list')->with('success', 'Business created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account, Request $request, $id)
    {        
        
        $account = Account::findOrFail($id);
        return view('business.edit', [
            'account' => $account,
        ]);
        
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
        // Retrieve the workhours for the authenticated business
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;
        $business = Account::where('id', $user_business_id)->firstOrFail(); 

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

    public function update_account(Request $request, $id)
    {        
        // Retrieve all accounts 
        $business = Account::where('id', $id)->firstOrFail(); 
        $address_id = $business->address_id;

        if ($address_id > 0)
        {
            $address = Address::find($address_id);
            $address->update([
                $address->street = $request->input('street'),
                $address->postal_code = $request->input('postal_code'),
                $address->city = $request->input('city'),
                $address->state = $request->input('state'),
                $address->country = $request->input('country'),
            ]);
            $address_id = $address->id;
        }else {
            $new_address = Address::create([
                'street' => $request->input('street'),
                'postal_code' => $request->input('postal_code'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
            ]);

            $address_id = $new_address->id;

        }
        

        $business->update([
            $business->name = $request->input('name'),
            $business->website = $request->input('website'),
            $business->summary = $request->input('summary'),
            $business->details = $request->input('details'),
            $business->email = $request->input('email'),
            $business->phone = $request->input('phone'),
            $business->address_id = $address_id,
            $business->facebook = $request->input('facebook'),
            $business->twitter = $request->input('twitter'),
            $business->instagram = $request->input('instagram'),
            $business->type = $request->input('type'),
            $business->revenue = $request->input('revenue'),
            $business->industry = $request->input('industry'),
            $business->invite_link = $request->input('invitation'),
        ]);



        return redirect()->route('accounts_list')->with('success', 'Business updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $business)
    {
        $business->delete();
        return redirect()->route('business.index')->with('success', 'Business deleted successfully!');
    }

}
