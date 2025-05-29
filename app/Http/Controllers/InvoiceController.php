<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ChecksUserRole;
use Barryvdh\DomPDF\PDF;
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
            ->where('status_id', 3)
            ->paginate(15);

        $customers = Customer::orderBy('name')->get();

        return view('invoices', compact('orders', 'customers'));
    }

    public function generateInvoice(Request $request)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        if (!$request->has('order_id')) {
            return response()->json([
                'success' => false,
                'message' => 'El campo order_id es obligatorio.'
            ], 422);
        }

        $request->validate([
            'order_id' => 'required|exists:orders,id',
        ]);

        $order = Order::with(['customer', 'orderDetail'])->findOrFail($request->order_id);

        $dompdf = app('dompdf.wrapper');
        $pdf = $dompdf->loadView('pdf.single', compact('order'));

        return $pdf->download('single_invoice.pdf');
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
        ])->where('status_id', 3);

        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        $orders = $query->with(['customer', 'orderDetail'])
            ->get();

        $dompdf = app('dompdf.wrapper');
        $pdf = $dompdf->loadView('pdf.bulk', compact('orders'));

        return $pdf->download('bulk_invoices.pdf');
    }
}