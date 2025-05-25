<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $plans = Plan::all();
        $countries = Country::all();
        return view('register', compact('plans', 'countries'));
    }
    

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2, 
            ]);
            Customer::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address ?? null,
                'phone' => $request->phone ?? null,
                'country_id' => $request->country_id ?? null,
                'customer_type_id' => $request->customerType,
                'plan_id' => 1, // Plan gratuito por defecto
            ]);

            // Autenticar al usuario después del registro
            Auth::login($user);
        });

        return redirect()->route('plans.show')->with('welcome', true);
    }
}
