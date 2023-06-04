<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a list of the review settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu()
    {
        $clientId = Auth::id();
        $businessId = Business::where('users_id', $clientId)
                    ->value('id');
        return view('reviews.menu', compact('businessId'));
    }

    /**
     * Display a listing of the reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;         
        $reviews = Review::where('business_id', $user_business_id)->get();
        $businessId = Business::where('id', $user_business_id)->value('id');
        return view('reviews.index', compact('businessId', 'reviews'));
    }

    /**
     * Show the form for creating a new review.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;

        $review = new Review;
        $review->business_id = $user_business_id;
        $review->name = $validatedData['name'];
        $review->email = $request->input('email');
        $review->message = $validatedData['message'];
        $review->approved = 1;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    /**
     * Show the form for editing the specified review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $review = Review::find($id);
        $review->name = $validatedData['name'];
        $review->email = $request->input('email');
        $review->message = $validatedData['message'];
        $review->save();

        return redirect()->back()->with('success', 'Review updated successfully!');
    }

    /**
     * Remove the specified review from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    /**
     * Approve the specified pending review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $review = Review::find($id);
        $review->approved = true;
        $review->save();

        return redirect()->back()->with('success', 'Review approved successfully!');
    }

    /**
     * Display a list of the pending reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $user = User::where('id', Auth::id())->firstOrFail();        
        $user_business_id = $user -> business_id;
        $reviews = Review::where('business_id', $user_business_id)
                        ->where('approved', false)
                        ->get();
        
        return view('reviews.pending', compact('reviews'));
    }


}
