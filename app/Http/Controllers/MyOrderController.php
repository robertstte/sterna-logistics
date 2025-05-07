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
        
        $order = Order::find($orderId);
        $orderDetail = OrderDetail::where('order_id',$orderId)->get();

        if (!$order || !$orderDetail) {
            return view('myOrder', ['status' => 'no', 'message' => 'Pedido no encontrado.']);
        }
        return view('myOrder', ['status' => 'ok', 'order' => $order , 'orderDetail' => $orderDetail]);
    }
}
