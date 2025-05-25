<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Status;
use App\Models\PackageType;
use App\Models\Transport;
use App\Models\Country;
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

        // Obtener solicitudes de pedidos pendientes
        $orderRequests = \App\Models\OrderRequest::where('customer_id', Auth::user()->customer->id)
            ->with(['packageType', 'transport', 'originCountry', 'destinationCountry'])
            ->latest()
            ->get();
            
        $statuses = Status::all();
        
        // Obtener datos para el formulario de solicitud de pedidos
        $packageTypes = PackageType::all();
        $transports = Transport::with('transportType')->get();
        $countries = Country::all();

        return view('userOrders', compact('orders', 'orderRequests', 'statuses', 'packageTypes', 'transports', 'countries'));
    }
  
}