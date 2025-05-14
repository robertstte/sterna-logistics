<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\ChecksUserRole;

class OrdersController extends Controller
{
    use ChecksUserRole;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        $orders = Order::orderBy('created_at', 'desc')
        ->with('customer')
        ->with('status')
        ->with('orderDetail.transport.transportType')
        ->with('orderDetail.packageType')
        ->with('orderDetail.originCountry')
        ->with('orderDetail.destinationCountry')
        ->with('orderDetail.departureLocation')
        ->with('orderDetail.arrivalLocation')
        ->paginate(15);

        $statuses = Status::all();

        return view('orders', compact('orders', 'statuses'));
    }

    public function show(Order $order)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $order_id)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

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

        return redirect()->route('orders');
    }
}