<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function showPlans()
    {
        $plans = Plan::all();
        $currentPlan = Auth::user()->customer->plan;
        return view('plans', compact('plans', 'currentPlan'));
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