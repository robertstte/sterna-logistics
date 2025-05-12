<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::whereHas('customer', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->with('customer')
            ->with('status')
            ->with('orderDetail.transport.transportType')
            ->with('orderDetail.packageType')
            ->with('orderDetail.originCountry')
            ->with('orderDetail.destinationCountry')
            ->with('orderDetail.originCountry.locations')
            ->with('orderDetail.destinationCountry.locations')
            ->get();

        $statuses = Status::all();

        return view('userOrders', compact('orders', 'statuses'));
    }
  
}