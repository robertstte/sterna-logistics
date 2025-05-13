<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Routing\Controller;

class MyOrderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'order_id' => 'required|min:18|max:18',
        ]);
        
        $order = Order::with(['customer', 'status'])->find($request->order_id);

        $orderDetail = OrderDetail::with(['packageType', 'transport', 'originCountry' , 'destinationCountry' ,'departureLocation', 'arrivalLocation' ])
        ->where('order_id', $request->order_id)
        ->get();
    
        if (!isset($orderDetail) || $orderDetail->isEmpty()) {
            return view('myOrder', ['status' => 'no', 'message' => 'Detalles del pedido no encontrados.']);
        }
        
        return view('myOrder', ['status' => 'ok', 'order' => $order , 'orderDetail' => $orderDetail]);
    }


}
