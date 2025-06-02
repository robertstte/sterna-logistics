<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assuming User model is in App\Models
use App\Models\Customer; // Assuming Customer model is in App\Models

class StripePaymentController extends Controller
{
    public function showForm()
    {
        return view('stripe.form');
    }

    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Cambio de plan',
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', ['plan_id' => $request->plan_id]), // Pass plan_id to success URL
            'cancel_url' => route('stripe.cancel'),
        ]);
    
        return redirect($checkoutSession->url);
    }

    public function handlePaymentSuccess(Request $request)
    {
        $newPlanId = $request->query('plan_id');
        $user = Auth::user();

        if ($user && $newPlanId) {
            $customer = Customer::where('user_id', $user->id)->first();

            if ($customer) {
                $customer->plan_id = $newPlanId;
                $customer->save();
                return redirect()->route('plans.show')->with('success', 'Plan updated successfully!');
            } else {
                // Handle case where customer record is not found for the user
                return redirect()->route('plans.show')->with('error', 'Customer profile not found. Plan not updated.');
            }
        } elseif (!$newPlanId) {
            // Handle case where plan_id is missing from redirect
            return redirect()->route('plans.show')->with('error', 'Payment successful, but new plan ID was missing in redirect.');
        } else {
            // Handle case where user is not authenticated (should be protected by middleware)
            return redirect()->route('login')->with('error', 'You must be logged in to update your plan.');
        }
    }
}
