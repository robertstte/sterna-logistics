<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChange;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('myAccount');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,'.$user->customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request, $user) {
            // Actualizar el email en la tabla users
            $user->update([
                'email' => $request->email,
            ]);

            // Actualizar los datos en la tabla customers
            $user->customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        });

        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed', 
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }
    
        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'La nueva contraseña no puede ser igual a la actual.']);
        }
    
        $user->password = $request->password;

        $user->save();

        $name = $user->customer->name;

        Mail::to($user->email)->send(new PasswordChange(now()->format('d/m/Y H:i'), $name));

        return redirect()->back()->with('success', 'Contraseña actualizada correctamente');
    }

    public function updatePreferences(Request $request)
    {
        $request->validate([
            'email_notifications' => 'boolean',
            'order_updates' => 'boolean',
            'language' => 'required|in:es,en',
        ]);

        $user = Auth::user();
        
        $preferences = [
            'email_notifications' => $request->has('email_notifications'),
            'order_updates' => $request->has('order_updates'),
            'language' => $request->language,
        ];

        $user->preferences = $preferences;
        $user->save();

        return redirect()->back()->with('success', 'Preferencias actualizadas correctamente');
    }
}
