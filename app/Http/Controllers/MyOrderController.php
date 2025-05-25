<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Routing\Controller;

class MyOrderController extends Controller
{
    public function view(Request $request)
    {
        $request->validate([
            'order_id' => 'required|min:18|max:18',
        ]);
        
        $order = Order::with(['customer', 'status'])->find($request->order_id);

        $orderDetail = OrderDetail::with(['packageType', 'transport', 'originCountry' , 'destinationCountry' ,'departureLocation', 'arrivalLocation' ])
        ->where('order_id', $request->order_id)
        ->get();
    
        if (!isset($orderDetail) || $orderDetail->isEmpty()) {
            return redirect()->route('landing')->with('error', 'Pedido no encontrado. Por favor, verifique el número e intente nuevamente.');
        }
        
        return view('myOrder', ['status' => 'ok', 'order' => $order , 'orderDetail' => $orderDetail]);
    }
    
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
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Pedido no encontrado. Por favor, verifique el número e intente nuevamente.']);
            } else {
                return redirect()->route('landing')->with('error', 'Pedido no encontrado. Por favor, verifique el número e intente nuevamente.');
            }
        }
        
        if ($request->ajax()) {
            return response()->json(['success' => true, 'redirect' => route('my-order-view', ['order_id' => $request->order_id])]);
        } else {
            return view('myOrder', ['status' => 'ok', 'order' => $order , 'orderDetail' => $orderDetail]);
        }
    }


}
