<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Transport;
use App\Models\PackageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ChecksUserRole;
use Illuminate\Support\Facades\DB;

class AdminOrderRequestController extends Controller
{
    use ChecksUserRole;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Verificar si el usuario es administrador
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        // Obtener todas las solicitudes de pedidos
        $orderRequests = OrderRequest::with([
            'customer',
            'packageType',
            'transport.transportType',
            'originCountry',
            'destinationCountry',
            'departureLocation',
            'arrivalLocation'
        ])
        ->orderBy('created_at', 'desc')
        ->paginate(15);

        // Obtener datos necesarios para el formulario de aprobación
        $statuses = Status::all();

        return view('orderRequests', compact('orderRequests', 'statuses'));
    }

    public function approve(Request $request, $id)
    {
        // Verificar si el usuario es administrador
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        // Validar los datos
        $request->validate([
            'status_id' => 'required|exists:statuses,id'
        ]);

        try {
            DB::beginTransaction();

            // Obtener la solicitud de pedido
            $orderRequest = OrderRequest::with([
                'customer',
                'packageType',
                'transport',
                'originCountry',
                'destinationCountry',
                'departureLocation',
                'arrivalLocation'
            ])->findOrFail($id);

            // Crear una nueva orden
            $order = Order::create([
                'customer_id' => $orderRequest->customer_id,
                'status_id' => $request->status_id
            ]);

            // Calcular distancia (esto es un placeholder, deberías implementar el cálculo real)
            $distance = 0;

            // Calcular costo total basado en la distancia y el costo por km del transporte
            $total_cost = $distance * $orderRequest->transport->cost_per_km;

            // Crear los detalles de la orden
            OrderDetail::create([
                'order_id' => $order->id,
                'origin' => $orderRequest->origin,
                'destination' => $orderRequest->destination,
                'departure_date' => $orderRequest->departure_date,
                'arrival_date' => $orderRequest->arrival_date,
                'departure_location' => $orderRequest->departure_location,
                'arrival_location' => $orderRequest->arrival_location,
                'distance_km' => $distance,
                'transport_id' => $orderRequest->transport_id,
                'total_cost' => $total_cost,
                'weight' => $orderRequest->weight,
                'package_type_id' => $orderRequest->package_type_id,
                'description' => $orderRequest->description,
                'observations' => $orderRequest->observations
            ]);

            // Actualizar el estado de la solicitud de pedido a 'approved'
            $orderRequest->status = 'approved';
            $orderRequest->save();

            DB::commit();
            return redirect()->route('admin.orderRequests')->with('success', 'Solicitud de pedido aprobada exitosamente');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al aprobar la solicitud de pedido: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        // Verificar si el usuario es administrador
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        try {
            // Obtener la solicitud de pedido
            $orderRequest = OrderRequest::findOrFail($id);

            // Actualizar el estado de la solicitud de pedido a 'rejected'
            $orderRequest->status = 'rejected';
            $orderRequest->save();

            return redirect()->route('admin.orderRequests')->with('success', 'Solicitud de pedido rechazada exitosamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al rechazar la solicitud de pedido: ' . $e->getMessage());
        }
    }
}
