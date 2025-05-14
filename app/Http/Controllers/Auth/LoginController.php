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

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'No existe una cuenta con este correo electrónico.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'La contraseña es incorrecta.']);
        }

        Auth::login($user, $request->has('remember'));

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