<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Account;


class UserController extends Controller
{
    //authenticate customer invite link and return the business
    public function authenticate_invite_link(Request $request){
        $invite_link = $request -> input('invite_link');
        $customer_business = Account::where('users_link', $invite_link)->first();
        
        if ($customer_business !== null){
            
            return redirect('/create-business');
        }
        
        return false;
    }

    //register user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Generate a unique token
        $token = Str::random(80);        

        // Create the new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'business_id' => $request->input('business'),
            'api_token' => hash('sha256', $token),
        ]);

        
        // Log in the new user
        auth()->login($user);

        $business = Account::find($request->input('business'));
        $business->users_id = Auth::id();
        $business->save();

        // Redirect to the home page or some other destination
        return redirect('/');
    }
    
    //login user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();  
            $user = Auth::user();
            $users_account_id = $user->business_id;
            $account = Account::findOrFail($users_account_id);
            $website = $account->website;
            $request->session()->put('website', $website);
            return redirect()->intended('/');
        }
    
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    //logout user
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
