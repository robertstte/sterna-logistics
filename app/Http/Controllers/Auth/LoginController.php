<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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
     
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->role_id == 1) {
                Auth::login($user);
                return redirect()->intended('orders');
            }
        }
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}