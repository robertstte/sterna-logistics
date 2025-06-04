<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use App\Models\Plan;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordChange;
use App\Mail\PasswordRecovery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $plans = Plan::all();
        $currentPlan = Auth::user()->customer->plan;
        return view('myAccount', compact('plans', 'currentPlan'));
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
        $language = $user->lang;

        Mail::to($user->email)->send(new PasswordChange(now()->format('d/m/Y H:i'), $name, $language));

        return redirect()->back()->with('success', 'Contraseña actualizada correctamente');
    }

    public function passwordRecovery(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $token = Str::random(60);

        $name = $user->customer->name;

        $language = $user->lang;

        PasswordToken::create([
            'user_id' => $user->id,
            'token' => $token,
            'expires_at' => Carbon::now()->addHours(1),
            'used' => false,
        ]);

        Mail::to($user->email)->send(new PasswordRecovery(now()->format('d/m/Y H:i'), $name, $token, $language));

        return redirect()->route('login')->with('success', 'Te hemos enviado un enlace para recuperar tu contraseña.');
    }

    public function updatePreferences(Request $request)
    {
        $request->validate([
            'email_notifications' => 'nullable|boolean',
            // 'order_updates' => 'nullable|boolean', // No column for this yet in users table
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

        // Update locale for the current session
        App::setLocale($request->language);
        session()->put('language', $request->language);

        return redirect()->back()->with('success', __('Preferencias actualizadas correctamente.'));
    }

    public function updatePlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id'
        ]);

        $customer = Auth::user()->customer;
        $customer->plan_id = $request->plan_id;
        $customer->save();

        return redirect()->back()->with('success', 'Plan actualizado correctamente');
    }
}
