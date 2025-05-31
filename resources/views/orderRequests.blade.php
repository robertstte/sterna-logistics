@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>Solicitudes de Pedidos Pendientes</h2>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tarjeta de resumen -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Resumen de Solicitudes</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary text-white p-3 rounded me-3">
                            <i class="bi bi-hourglass"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Pendientes</h6>
                            <h4 class="mb-0">{{ $orderRequests->where('status', 'pending')->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white p-3 rounded me-3">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Aprobadas</h6>
                            <h4 class="mb-0">{{ $orderRequests->where('status', 'approved')->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-danger text-white p-3 rounded me-3">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Rechazadas</h6>
                            <h4 class="mb-0">{{ $orderRequests->where('status', 'rejected')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de solicitudes -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table" >
                <tr>
                    
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Origen - Destino</th>
                    <th>Fecha Salida</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orderRequests as $request)
                <tr>
                    
                    <td>{{ $request->customer->name }}</td>
                    <td>{{ $request->packageType->type }}</td>
                    <td>{{ $request->originCountry->name }} - {{ $request->destinationCountry->name }}</td>
                    <td>{{ $request->departure_date->format('d/m/Y') }}</td>
                    <td>
                        @if($request->status == 'pending')
                            <span class="badge bg-warning">Pendiente</span>
                        @elseif($request->status == 'approved')
                            <span class="badge bg-success">Aprobada</span>
                        @elseif($request->status == 'rejected')
                            <span class="badge bg-danger">Rechazada</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $request->id }}">
                            Ver Detalles
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay solicitudes de pedidos pendientes</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $orderRequests->links('pagination::bootstrap-4') }}
    </div>

    <!-- Modales de detalles para cada solicitud -->
    @foreach($orderRequests as $request)
    <div class="modal fade" id="detailModal{{ $request->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $request->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white" style="background: #163a5c;">
                    <h5 class="modal-title fw-bold" id="detailModalLabel{{ $request->id }}">
                        <i class="fas fa-info-circle me-2"></i>Detalles de Solicitud
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light" style="background: #f4f8fc;">
                    <div class="row g-3 align-items-stretch">
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Información General</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Cliente:</span> {{ $request->customer->name }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Tipo de Paquete:</span> {{ $request->packageType->type }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Peso:</span> <span class="badge rounded-pill bg-primary bg-opacity-75">{{ $request->weight }} kg</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Transporte:</span> {{ $request->transport->transportType->type }} <span class="badge bg-light text-primary border ms-1">{{ $request->transport->license_plate }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Ubicaciones</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Origen:</span> {{ $request->originCountry->name }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Destino:</span> {{ $request->destinationCountry->name }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Salida:</span> {{ $request->departureLocation->name ?? 'N/A' }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Llegada:</span> {{ $request->arrivalLocation->name ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Fechas</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Salida:</span> <span class="badge bg-primary bg-opacity-75">{{ $request->departure_date->format('d/m/Y') }}</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Llegada:</span> <span class="badge bg-primary bg-opacity-75">{{ $request->arrival_date->format('d/m/Y') }}</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Solicitado el:</span> <span class="badge bg-light text-primary border">{{ $request->created_at->format('d/m/Y H:i') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Descripción</h6>
                                    <div class="mb-2">
                                        <span class="text-dark">{{ $request->description }}</span>
                                    </div>
                                    @if($request->observations)
                                    <h6 class="fw-bold text-primary mb-1 mt-3" style="color: #163a5c;">Observaciones</h6>
                                    <div>
                                        <span class="text-dark">{{ $request->observations }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if($request->status == 'pending')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $request->id }}">Rechazar</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal{{ $request->id }}">Aprobar</button>
                    @else
                    <span class="me-auto">
                        @if($request->status == 'approved')
                            <span class="badge bg-success">Aprobada</span>
                        @elseif($request->status == 'rejected')
                            <span class="badge bg-danger">Rechazada</span>
                        @endif
                    </span>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modales de aprobación para cada solicitud -->
    @foreach($orderRequests as $request)
    @if($request->status == 'pending')
    <div class="modal fade" id="approveModal{{ $request->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $request->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel{{ $request->id }}">Aprobar Solicitud #{{ $request->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.orderRequests.approve', $request->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas aprobar esta solicitud de pedido?</p>
                        <p>Al aprobar esta solicitud, se creará un nuevo pedido en el sistema.</p>
                        
                        <div class="mb-3">
                            <label for="status_id" class="form-label">Estado Inicial del Pedido</label>
                            <select class="form-select" id="status_id" name="status_id" required>
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" style="color: {{ $status->color }}">
                                    {{ $status->status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Aprobar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endforeach

    <!-- Modales de rechazo para cada solicitud -->
    @foreach($orderRequests as $request)
    @if($request->status == 'pending')
    <div class="modal fade" id="rejectModal{{ $request->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $request->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel{{ $request->id }}">Rechazar Solicitud #{{ $request->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas rechazar esta solicitud de pedido?</p>
                    <p>Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('admin.orderRequests.reject', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Rechazar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<style>
    .table > thead {
        --bs-table-color: white;
        --bs-table-bg: rgb(0, 31, 63);
        --bs-table-border-color: #dee2e6;
    }
</style>
@endsection

