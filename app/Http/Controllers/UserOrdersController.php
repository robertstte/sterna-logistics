<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ChecksUserRole;

class UserOrdersController extends Controller
{
    use ChecksUserRole;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!$this->checkRole(2)) {
            return $this->redirectBasedOnRole();
        }

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