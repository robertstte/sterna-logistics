<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Transport;
use App\Models\PackageType;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OrderUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Traits\ChecksUserRole;
use Illuminate\Support\Facades\DB;
use App\Models\CountryLocation;
use App\Services\DistanceService;


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

        $customers = Customer::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $transports = Transport::with('transportType')->get();
        $packageTypes = PackageType::all();
        $statuses = Status::all();

        return view('orders', compact('orders', 'customers', 'countries', 'transports', 'packageTypes', 'statuses'));
    }

    public function store(Request $request)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'origin' => 'required|exists:countries,id',
            'destination' => 'required|exists:countries,id',
            'departure_date' => 'required|date|after_or_equal:today',
            'arrival_date' => 'required|date|after_or_equal:departure_date',
            'departure_location' => 'nullable|exists:country_locations,id',
            'arrival_location' => 'nullable|exists:country_locations,id',
            'transport_id' => 'required|exists:transports,id',
            'weight' => 'required|numeric|min:0',
            'package_type_id' => 'required|exists:package_types,id',
            'description' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            // Crear la orden
            $order = Order::create([
                'customer_id' => $request->customer_id,
                'status_id' => 5 // Estado "pendiente"
            ]);

            // Obtener direcciones de origen y destino
            $departureLocation = $request->departure_location ? CountryLocation::find($request->departure_location) : null;
            $arrivalLocation = $request->arrival_location ? CountryLocation::find($request->arrival_location) : null;

            // Usar nombre o coordenadas según disponibilidad
            $originAddress = $departureLocation ? ($departureLocation->latitude && $departureLocation->longitude ? $departureLocation->latitude . ',' . $departureLocation->longitude : $departureLocation->name) : '';
            $destinationAddress = $arrivalLocation ? ($arrivalLocation->latitude && $arrivalLocation->longitude ? $arrivalLocation->latitude . ',' . $arrivalLocation->longitude : $arrivalLocation->name) : '';

            // Calcular distancia con DistanceService
            $distanceService = new DistanceService();
            $distance = $distanceService->getDistanceKm($originAddress, $destinationAddress);
            if ($distance === null) {
                $distance = 0;
            }

            // Calcular costo total basado en la distancia y el costo por km del transporte
            $transport = Transport::find($request->transport_id);
            $total_cost = $distance * $transport->cost_per_km;
            // Ajuste por peso
            $peso = $request->weight;
            if ($peso <= 100) {
                $total_cost *= 0.8;
            } elseif ($peso > 1000) {
                $total_cost *= 1.2;
            }

            // Descuento por plan
            $customer = \App\Models\Customer::find($request->customer_id);
            $plan = $customer && $customer->plan ? strtolower($customer->plan->name) : null;

            if ($plan === 'pymes') {
                $total_cost *= 0.9; // 10% descuento
            } elseif ($plan === 'empresa') {
                $total_cost *= 0.8; // 20% descuento
            }
            // Crear los detalles de la orden
            OrderDetail::create([
                'order_id' => $order->id,
                'origin' => $request->origin,
                'destination' => $request->destination,
                'departure_date' => $request->departure_date,
                'arrival_date' => $request->arrival_date,
                'departure_location' => $request->departure_location,
                'arrival_location' => $request->arrival_location,
                'distance_km' => $distance,
                'transport_id' => $request->transport_id,
                'total_cost' => $total_cost,
                'weight' => $request->weight,
                'package_type_id' => $request->package_type_id,
                'description' => $request->description
            ]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }

    public function show(Order $order)
    {
        if (!$this->checkRole(1)) {
            return $this->redirectBasedOnRole();
        }

        return redirect()->route('orders.index');
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

        $name = $order->customer->name;
        $mail = $order->customer->email;

        $user = User::where('email', $order->customer->email)->firstOrFail();
        $language = $user->lang;

        $status = Status::findOrFail($request->status);

        $order->update([
            'status_id' => $request->status
        ]);

        $order->orderDetail->update([
            'arrival_date' => $request->arrival_date,
            'description' => $request->description,
            'observations' => $request->observations
        ]);

        $user = Auth::user();

        if ($user->notifications) {
            Mail::to($mail)->send(new OrderUpdate(now()->format('d/m/Y H:i'), $name, $status->status, $status->color, $request->description, $request->arrival_date, $request->observations, $order->id, $language));
        }

        return redirect()->route('orders.index');
    }
}