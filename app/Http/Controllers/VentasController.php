<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PackageType;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index()
    {
        $year = date('Y');

        // 1. Ingresos mensuales (enero a diciembre)
        $ingresosPorMesRaw = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('orders.created_at', $year)
            ->where('orders.status_id', 3)
            ->select(
                DB::raw('SUM(order_details.total_cost) as total_ingresos'),
                DB::raw('MONTH(orders.created_at) as mes')
            )
            ->groupBy('mes')
            ->pluck('total_ingresos', 'mes');
        // Rellenar meses vacíos con 0
        $ingresosPorMes = [];
        for ($i = 1; $i <= 12; $i++) {
            $ingresosPorMes[] = isset($ingresosPorMesRaw[$i]) ? (float)$ingresosPorMesRaw[$i] : 0;
        }

        // 2. Total ingresos del año
        $totalIngresos = array_sum($ingresosPorMes);

        // 3. Total pedidos entregados
        $totalPedidos = Order::where('status_id', 3)
            ->whereYear('created_at', $year)
            ->count();

        // 4. Ticket promedio
        $ticketPromedio = $totalPedidos > 0 ? round($totalIngresos / $totalPedidos, 2) : 0;

        // 5. Pedido más caro y más barato
        $pedidoMasCaro = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->orderByDesc('order_details.total_cost')
            ->with('order.customer')
            ->first();
        $pedidoMasBarato = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->orderBy('order_details.total_cost', 'asc')
            ->with('order.customer')
            ->first();

        // 6. Top 3 tipos de paquete más vendidos
        $topTiposPaquete = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('package_types', 'order_details.package_type_id', '=', 'package_types.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->select('package_types.type as tipo_nombre', DB::raw('COUNT(order_details.id) as cantidad'))
            ->groupBy('package_types.type')
            ->orderByDesc('cantidad')
            ->limit(3)
            ->get();

        // 7. Top 3 clientes con más pedidos entregados
        $topClientes = Order::where('status_id', 3)
            ->whereYear('created_at', $year)
            ->select('customer_id', DB::raw('COUNT(id) as cantidad'))
            ->groupBy('customer_id')
            ->orderByDesc('cantidad')
            ->with('customer')
            ->limit(3)
            ->get();

        // 8. Ingresos por tipo de paquete (gráfico de pastel)
        $ingresosPorTipo = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('package_types', 'order_details.package_type_id', '=', 'package_types.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->select('package_types.type as tipo_nombre', DB::raw('SUM(order_details.total_cost) as total_ingresos'))
            ->groupBy('package_types.type')
            ->orderByDesc('total_ingresos')
            ->get();

        // 9. Pedidos por país de destino
        $pedidosPorPais = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('countries', 'order_details.destination', '=', 'countries.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->select('countries.name as pais', DB::raw('COUNT(order_details.id) as cantidad'))
            ->groupBy('countries.name')
            ->orderByDesc('cantidad')
            ->limit(5)
            ->get();

        // 10. Pedidos por tipo de transporte
        $pedidosPorTransporte = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('transports', 'order_details.transport_id', '=', 'transports.id')
            ->join('transport_types', 'transports.type_id', '=', 'transport_types.id')
            ->where('orders.status_id', 3)
            ->whereYear('orders.created_at', $year)
            ->select('transport_types.type as transporte', DB::raw('COUNT(order_details.id) as cantidad'))
            ->groupBy('transport_types.type')
            ->orderByDesc('cantidad')
            ->get();

        // 11. Evolución de pedidos por mes (línea secundaria)
        $pedidosPorMesRaw = Order::where('status_id', 3)
            ->whereYear('created_at', $year)
            ->select(DB::raw('COUNT(id) as cantidad'), DB::raw('MONTH(created_at) as mes'))
            ->groupBy('mes')
            ->pluck('cantidad', 'mes');
        $pedidosPorMes = [];
        for ($i = 1; $i <= 12; $i++) {
            $pedidosPorMes[] = isset($pedidosPorMesRaw[$i]) ? (int)$pedidosPorMesRaw[$i] : 0;
        }

        return view('ventas', [
            'ingresosPorMes' => $ingresosPorMes,
            'totalIngresos' => $totalIngresos,
            'totalPedidos' => $totalPedidos,
            'ticketPromedio' => $ticketPromedio,
            'pedidoMasCaro' => $pedidoMasCaro,
            'pedidoMasBarato' => $pedidoMasBarato,
            'topTiposPaquete' => $topTiposPaquete,
            'topClientes' => $topClientes,
            'ingresosPorTipo' => $ingresosPorTipo,
            'pedidosPorPais' => $pedidosPorPais,
            'pedidosPorTransporte' => $pedidosPorTransporte,
            'pedidosPorMes' => $pedidosPorMes,
            'year' => $year,
        ]);

        // --- INGRESOS POR MES ---
        // Los ingresos se toman de order_details.total_cost para pedidos con orders.status_id = 3 (Delivered)
        $ingresosPorMes = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->select(
                DB::raw('SUM(order_details.total_cost) as total_ingresos'),
                DB::raw('MONTH(orders.created_at) as mes'),
                DB::raw('YEAR(orders.created_at) as anio')
            )
            ->where('orders.status_id', 3) // Estado 'Delivered'
            ->groupBy('anio', 'mes')
            ->orderBy('anio', 'asc')
            ->orderBy('mes', 'asc')
            ->get()
            ->map(function ($item) {
                $item->mes_anio = date('M', mktime(0, 0, 0, $item->mes, 1)) . ' ' . $item->anio;
                return $item;
            });

        // --- CANTIDAD TOTAL DE PEDIDOS REALIZADOS ---
        // Pedidos con orders.status_id = 3 (Delivered)
        $totalPedidos = Order::where('status_id', 3)->count();

        // --- LISTA DE ORDER_TYPE Y CANTIDAD DE CADA UNO ---
        // Tipos de paquete de detalles de pedidos con orders.status_id = 3 (Delivered)
        $pedidosPorTipo = OrderDetail::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('package_types', 'order_details.package_type_id', '=', 'package_types.id')
            ->where('orders.status_id', 3) // Estado 'Delivered'
            ->select('package_types.type as tipo_nombre', DB::raw('COUNT(order_details.id) as cantidad'))
            ->groupBy('package_types.type')
            ->orderBy('cantidad', 'desc')
            ->get();

        // Datos de ejemplo si las queries no devuelven nada o para probar:
        if ($ingresosPorMes->isEmpty()) {
            $ingresosPorMes = collect([
                (object)['mes_anio' => 'Ene 2025', 'total_ingresos' => 1200],
                (object)['mes_anio' => 'Feb 2025', 'total_ingresos' => 1800],
                (object)['mes_anio' => 'Mar 2025', 'total_ingresos' => 1500],
            ]);
        }
        if ($totalPedidos == 0) {
            $totalPedidos = 250; // Ejemplo
        }
        if ($pedidosPorTipo->isEmpty()) {
            $pedidosPorTipo = collect([
                (object)['tipo_nombre' => 'Paquete Pequeño', 'cantidad' => 100],
                (object)['tipo_nombre' => 'Paquete Mediano', 'cantidad' => 80],
                (object)['tipo_nombre' => 'Paquete Grande', 'cantidad' => 70],
            ]);
        }

        return view('ventas', [
            'ingresosPorMes' => $ingresosPorMes,
            'totalPedidos' => $totalPedidos,
            'pedidosPorTipo' => $pedidosPorTipo,
        ]);
    }
}
