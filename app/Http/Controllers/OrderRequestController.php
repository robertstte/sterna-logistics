<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\PackageType;
use App\Models\Transport;
use App\Models\Country;
use App\Models\CountryLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        // Obtener datos necesarios para el formulario
        $packageTypes = PackageType::all();
        $transports = Transport::with('transportType')->get();
        $countries = Country::all();
        
        // Obtener las órdenes existentes del usuario para mostrarlas en la misma vista
        $orders = OrderRequest::where('customer_id', Auth::user()->customer->id)
            ->with(['packageType', 'transport', 'originCountry', 'destinationCountry'])
            ->latest()
            ->get();
        
        return view('userOrders', compact('orders', 'packageTypes', 'transports', 'countries'));
    }
    
    public function store(Request $request)
    {
        // Depurar los datos recibidos
        // \Log::info('Datos recibidos:', $request->all());
        try {

            // Validar los datos del formulario
            $validated = $request->validate([
                'package_type_id' => 'required|exists:package_types,id',
                'weight' => 'required|numeric|min:0',
                'transport_id' => 'required|exists:transports,id',
                'origin' => 'required|exists:countries,id',
                'destination' => 'required|exists:countries,id',
                'departure_location' => 'required|exists:country_locations,id',
                'arrival_location' => 'required|exists:country_locations,id',
                'departure_date' => 'required|date',
                'arrival_date' => 'required|date|after:departure_date',
                'description' => 'required|string|min:10',
                'observations' => 'nullable|string|max:500',
            ]);
            
            // Agregar el customer_id del usuario autenticado
            $validated['customer_id'] = Auth::user()->customer->id;
            
            // Establecer el estado como pendiente
            $validated['status'] = 'pending';
            
            // Crear la solicitud de pedido usando create para mayor simplicidad
            $orderRequest = OrderRequest::create([
                'customer_id' => $validated['customer_id'],
                'package_type_id' => $validated['package_type_id'],
                'weight' => $validated['weight'],
                'transport_id' => $validated['transport_id'],
                'origin' => $validated['origin'],
                'destination' => $validated['destination'],
                'departure_location' => $validated['departure_location'],
                'arrival_location' => $validated['arrival_location'],
                'departure_date' => $validated['departure_date'],
                'arrival_date' => $validated['arrival_date'],
                'description' => $validated['description'],
                'observations' => $validated['observations'] ?? null,
                'status' => 'pending'
            ]);
            
            // \Log::info('OrderRequest creado:', $orderRequest->toArray());
            
            // Redireccionar con mensaje de éxito
            return redirect()->route('ordersUser.index')->with('success', 'Solicitud de pedido creada correctamente.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function index()
    {
        $orders = OrderRequest::where('customer_id', Auth::user()->customer->id)
            ->with(['packageType', 'transport', 'originCountry', 'destinationCountry'])
            ->latest()
            ->get();
        
        $packageTypes = PackageType::all();
        $transports = Transport::with('transportType')->get();
        $countries = Country::all();
            
        return view('userOrders', compact('orders', 'packageTypes', 'transports', 'countries'));
    }
}
