<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ChecksUserRole;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
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
            ->paginate(15);

        $customers = Customer::orderBy('name')->get();

        return view('invoices', compact('orders', 'customers'));
    }

    public function generateInvoice(Request $request)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::with(['customer', 'orderDetail'])
            ->findOrFail($request->order_id);

        // Aquí iría la lógica para generar la factura
        // Por ahora solo retornamos los datos del pedido
        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    public function generateBulkInvoices(Request $request)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'customer_id' => 'nullable|exists:customers,id'
        ]);

        $query = Order::whereBetween('created_at', [
            $request->start_date,
            $request->end_date
        ]);

        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        $orders = $query->with(['customer', 'orderDetail'])
            ->get();

        // Aquí iría la lógica para generar las facturas en lote
        return response()->json([
            'success' => true,
            'orders' => $orders
        ]);
    }
}
