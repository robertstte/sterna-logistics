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
        $orderId = $request->input('order_id');
        
        $order = Order::with(['customer', 'status'])->find($orderId);

        $orderDetail = OrderDetail::with(['packageType', 'transport', 'country'])
        ->where('order_id', $orderId)
        ->get();
    
        if (!isset($orderDetail) || $orderDetail->isEmpty()) {
            return view('myOrder', ['status' => 'no', 'message' => 'Detalles del pedido no encontrados.']);
        }
        
        return view('myOrder', ['status' => 'ok', 'order' => $order , 'orderDetail' => $orderDetail]);
    }
}
