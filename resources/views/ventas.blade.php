@extends('layouts.dashboard')

@section('content')
<div class="container-fluid p-4">
    
    <!-- SECCIÓN 1: KPIs PRINCIPALES -->
    <div class="row g-4 mb-4">
        <div class="col-md-2">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="plan-icon mb-2"><i class="fas fa-euro-sign"></i></div>
                    <h5 class="card-title">Ingresos Totales</h5>
                    <h4 class="fw-bold fs-5">€{{ number_format($totalIngresos, 2, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="plan-icon mb-2"><i class="fas fa-truck"></i></div>
                    <h5 class="card-title">Pedidos Entregados</h5>
                    <h4 class="fw-bold fs-5">{{ $totalPedidos }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="plan-icon mb-2"><i class="fas fa-ticket-alt"></i></div>
                    <h5 class="card-title">Ticket Promedio</h5>
                    <h4 class="fw-bold fs-5">€{{ number_format($ticketPromedio, 2, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="plan-icon mb-2"><i class="fas fa-arrow-up"></i></div>
                    <h5 class="card-title">Pedido Más Caro</h5>
                    <h3 class="fw-bold fs-4">€ {{ $pedidoMasCaro->total_cost ?? '-' }}</h3>
                    <small class="text-muted">{{ $pedidoMasCaro?->order?->customer?->name ?? '' }}</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="plan-icon mb-2"><i class="fas fa-arrow-down"></i></div>
                    <h5 class="card-title">Pedido Más Barato</h5>
                    <h3 class="fw-bold fs-4">€ {{ $pedidoMasBarato->total_cost ?? '-' }}</h3>
                    <small class="text-muted">{{ $pedidoMasBarato?->order?->customer?->name ?? '' }}</small>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN 2: GRÁFICOS -->
    <div class="row g-5 mb-5 align-items-stretch">
        <div class="col-lg-8 d-flex flex-column h-100">
            <div class="card shadow-sm border-0 flex-fill d-flex flex-column h-100">
                <div class="card-header bg-white fw-bold">
                    Ingresos Mensuales & Evolución de Pedidos
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-grow-1">
                    <canvas id="ingresosChart" style="min-height:350px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column h-100">
            <div class="card shadow-sm border-0 flex-fill">
                <div class="card-header bg-white fw-bold">
                    Ingresos por Tipo de Paquete
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-grow-1">
                    <canvas id="tipoPieChart" style="min-height:160px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN 3: TOPS Y LISTAS -->
    <div class="row g-5 mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold text-center">
                    <i class="fas fa-users me-2"></i>Top Clientes
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered list-group-flush">
                        @foreach($topClientes as $cli)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                {{ $cli->customer?->name ?? 'N/A' }}
                                <span class="badge bg-primary rounded-pill">{{ $cli->cantidad }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold text-center">
                    <i class="fas fa-box-open me-2"></i>Top Tipos de Paquete
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered list-group-flush">
                        @foreach($topTiposPaquete as $tipo)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                {{ $tipo->tipo_nombre }}
                                <span class="badge bg-success rounded-pill">{{ $tipo->cantidad }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold text-center">
                    <i class="bi bi-globe2 me-2"></i>Pedidos por País
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered list-group-flush">
                        @foreach($pedidosPorPais as $pais)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                {{ $pais->pais }}
                                <span class="badge bg-info rounded-pill">{{ $pais->cantidad }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white fw-bold text-center">
                    <i class="fas fa-shipping-fast me-2"></i>Pedidos por Transporte
                </div>
                <div class="card-body">
                    <ol class="list-group list-group-numbered list-group-flush">
                        @foreach($pedidosPorTransporte as $trans)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                {{ $trans->transporte }}
                                <span class="badge bg-secondary rounded-pill">{{ $trans->cantidad }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de barras de ingresos mensuales y línea de pedidos
    const meses = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
    const ingresos = @json($ingresosPorMes);
    const pedidos = @json($pedidosPorMes);
    const ctx = document.getElementById('ingresosChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: meses,
            datasets: [
                {
                    label: 'Ingresos (€)',
                    data: ingresos,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Pedidos',
                    data: pedidos,
                    type: 'line',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.1)',
                    fill: false,
                    yAxisID: 'y1',
                    tension: 0.3,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgba(255,99,132,1)'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: { mode: 'index', intersect: false },
            stacked: false,
            plugins: { legend: { position: 'top' } },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: { display: true, text: 'Ingresos (€)' }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    grid: { drawOnChartArea: false },
                    title: { display: true, text: 'Pedidos' }
                }
            }
        }
    });
    // Gráfico de pastel de ingresos por tipo de paquete
    const tipos = @json($ingresosPorTipo->pluck('tipo_nombre'));
    const ingresosTipo = @json($ingresosPorTipo->pluck('total_ingresos'));
    const ctxPie = document.getElementById('tipoPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: tipos,
            datasets: [{
                data: ingresosTipo,
                backgroundColor: [
                    '#36A2EB','#FF6384','#FFCE56','#4BC0C0','#9966FF','#FF9F40'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endpush

<style>
.main-bg {
    background: #f4f6fb;
    width: 100%;
    padding-bottom: 40px;
}
.card-plan {
    background: #f4f6fb;
    border-radius: 18px;
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.card {
    transition: all 0.3s ease;
    border: 1px solid #ddd;
    box-shadow: 0 8px 32px rgba(0,0,0,0.22), 0 4px 24px rgba(0,0,0,0.18);
    border-radius: 18px;
    margin-bottom: 2rem;
    background: #fff;
    position: relative;
}
.plan-icon {
    font-size: 2rem;
    color: #007bff;
    margin-bottom: 12px;
    text-align: center;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.card.border-primary {
    border-width: 2px;
}
.card-title {
    color: #007bff;
    font-weight: bold;
}
.btn-custom {
    width: 100%;
    margin-top: 15px;
}
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
}
</style>


             
