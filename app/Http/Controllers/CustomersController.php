<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::with('customerType')->paginate(15);

        return view('customers', compact('customers'));
    }
}