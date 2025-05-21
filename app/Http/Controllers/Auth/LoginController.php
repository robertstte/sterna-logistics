<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('orders.index');
            } else {
                return redirect()->route('ordersUser.index');
            }
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Las credenciales proporcionadas no son correctas.']);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}