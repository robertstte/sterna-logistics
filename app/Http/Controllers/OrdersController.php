<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')
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

        return view('orders', compact('orders', 'statuses'));
    }

    public function update(Request $request, $order_id)
    {
        $request->validate([
            'description' => 'required|string',
            'arrival_date' => 'required|date',
            'status' => 'required|integer',
            'observations' => 'nullable|string'
        ]);

        $order = Order::findOrFail($order_id);

        $order->update([
            'status_id' => $request->status
        ]);

        $order->orderDetail->update([
            'arrival_date' => $request->arrival_date,
            'description' => $request->description,
            'observations' => $request->observations
        ]);

        return redirect()->route('orders.index');
    }
}