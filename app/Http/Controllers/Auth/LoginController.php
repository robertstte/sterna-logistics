<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Session facade for consistency, though session() helper works too.

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        
        

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Las credenciales no son válidas.']);
        }

        Auth::login($user, $request->has('remember'));

        // Set user's preferred language
        if (Auth::check() && Auth::user()->lang) {
            App::setLocale(Auth::user()->lang);
            session()->put('language', Auth::user()->lang);
        }

        if ($user->role_id == 1) {
            return redirect()->route('orders.index');
        } else {
            return redirect()->route('ordersUser.index');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}