@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>@lang('translations.dashboard.table.orders.my_requests')</h2>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                @lang('translations.dashboard.table.orders.request_new')
            </button>
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

    <!-- Tarjeta de resumen de solicitudes -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">@lang('translations.dashboard.table.orders.request_summary')</h5>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="p-3">
                        <h3 class="text-warning mb-0">{{ $orders->where('status', 'pending')->count() }}</h3>
                        <p class="mb-0">@lang('translations.dashboard.table.orders.pending')</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <h3 class="text-success mb-0">{{ $orders->where('status', 'approved')->count() }}</h3>
                        <p class="mb-0">@lang('translations.dashboard.table.orders.approved')</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <h3 class="text-danger mb-0">{{ $orders->where('status', 'rejected')->count() }}</h3>
                        <p class="mb-0">@lang('translations.dashboard.table.orders.rejected')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de solicitudes -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table">
                <tr>
                    
                    <th>@lang('translations.dashboard.table.orders.details.package_type')</th>
                    <th>@lang('translations.dashboard.table.orders.origin') - @lang('translations.dashboard.table.orders.destination')</th>
                    <th>@lang('translations.dashboard.table.orders.details.departure_date')</th>
                    <th>@lang('translations.dashboard.table.orders.status')</th>
                    <th>@lang('translations.dashboard.table.orders.view_details')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    
                    <td>{{ $order->packageType->type }}</td>
                    <td>{{ $order->originCountry->name }} - {{ $order->destinationCountry->name }}</td>
                    <td>{{ $order->departure_date->format('d/m/Y') }}</td>
                    <td>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning">@lang('translations.dashboard.table.orders.pending')</span>
                        @elseif($order->status == 'approved')
                            <span class="badge bg-success">@lang('translations.dashboard.table.orders.approved')</span>
                        @elseif($order->status == 'rejected')
                            <span class="badge bg-danger">@lang('translations.dashboard.table.orders.rejected')</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $order->id }}">
                            @lang('translations.dashboard.table.orders.view_details')
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">@lang('translations.dashboard.table.orders.no_requests')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modales de detalles para cada solicitud -->
    @foreach($orders as $order)
    <div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $order->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white" style="background: #163a5c;">
                    <h5 class="modal-title fw-bold" id="detailModalLabel{{ $order->id }}">
                        <i class="fas fa-info-circle me-2"></i>@lang('translations.dashboard.table.orders.request_details')
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light" style="background: #f4f8fc;">
                    <div class="row g-3 align-items-stretch">
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">@lang('translations.dashboard.table.orders.general_info')</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">@lang('translations.dashboard.table.orders.details.package_type'):</span> {{ $order->packageType->type }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">@lang('translations.dashboard.table.orders.details.weight'):</span> <span class="badge rounded-pill bg-primary bg-opacity-75">{{ $order->weight }} kg</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Transporte:</span> {{ $order->transport->transportType->type }} <span class="badge bg-light text-primary border ms-1">{{ $order->transport->license_plate }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Ubicaciones</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Origen:</span> {{ $order->originCountry->name }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Destino:</span> {{ $order->destinationCountry->name }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Salida:</span> {{ $order->departureLocation->name ?? 'N/A' }}</li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Llegada:</span> {{ $order->arrivalLocation->name ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Fechas</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Salida:</span> <span class="badge bg-primary bg-opacity-75">{{ $order->departure_date->format('d/m/Y') }}</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Llegada:</span> <span class="badge bg-primary bg-opacity-75">{{ $order->arrival_date->format('d/m/Y') }}</span></li>
                                        <li class="list-group-item px-0 py-1"><span class="fw-semibold">Solicitado el:</span> <span class="badge bg-light text-primary border">{{ $order->created_at->format('d/m/Y H:i') }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 mb-3 h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-2" style="color: #163a5c;">Descripción</h6>
                                    <div class="mb-2">
                                        <span class="text-dark">{{ $order->description }}</span>
                                    </div>
                                    @if($order->observations)
                                    <h6 class="fw-bold text-primary mb-1 mt-3" style="color: #163a5c;">Observaciones</h6>
                                    <div>
                                        <span class="text-dark">{{ $order->observations }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert 
                                @if($order->status == 'pending') alert-warning
                                @elseif($order->status == 'approved') alert-success
                                @elseif($order->status == 'rejected') alert-danger
                                @endif shadow-sm">
                                <strong>Estado:</strong> 
                                @if($order->status == 'pending')
                                    Pendiente de aprobación
                                @elseif($order->status == 'approved')
                                    Aprobada - Se ha creado un pedido con esta solicitud
                                @elseif($order->status == 'rejected')
                                    Rechazada
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
                <style>
                    .modal-content {
                        border-radius: 1.1rem;
                        box-shadow: 0 8px 32px rgba(22,58,92,0.15), 0 4px 12px rgba(22,58,92,0.10);
                    }
                    .modal-header {
                        border-radius: 1.1rem 1.1rem 0 0;
                        border-bottom: 1px solid #e3eaf2;
                    }
                    .modal-body {
                        border-radius: 0 0 1.1rem 1.1rem;
                    }
                    .card {
                        background: #fff;
                        border-radius: 1rem;
                        border: none;
                        box-shadow: 0 2px 8px rgba(22,58,92,0.07);
                    }
                    .list-group-item {
                        background: transparent;
                        border: none;
                        padding-left: 0;
                        padding-right: 0;
                    }
                    .fw-semibold { font-weight: 500; }
                    .text-primary { color: #163a5c !important; }
                    .badge.bg-primary {
                        background: #1c5ca8 !important;
                        color: #fff !important;
                    }
                    .badge.bg-light {
                        background: #eaf1fa !important;
                        color: #163a5c !important;
                        border: 1px solid #bcd0e8;
                    }
                </style>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal para solicitar nuevo pedido -->
    <div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newOrderModalLabel">Solicitar Nuevo Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newOrderForm" action="{{ route('order.request.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ Auth::user()->customer->id }}">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tipo de Paquete</label>
                                <select class="form-select" name="package_type_id" required>
                                    <option value="">Seleccionar tipo</option>
                                    @foreach($packageTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Peso (KG)</label>
                                <input type="number" class="form-control" name="weight" step="0.01" min="0" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Transporte</label>
                                <select class="form-select" name="transport_id" id="transport_id" required>
                                    <option value="">Seleccionar transporte</option>
                                    @foreach($transports as $transport)
                                        <option value="{{ $transport->id }}">
                                            {{ $transport->transportType->type }} - {{ $transport->license_plate }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">País de Origen</label>
                                <select class="form-select" name="origin" id="origin" required>
                                    <option value="">Seleccionar país</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">País de Destino</label>
                                <select class="form-select" name="destination" id="destination" required>
                                    <option value="">Seleccionar país</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Ubicación de Salida</label>
                                <select class="form-select" name="departure_location" id="departure_location" required>
                                    <option value="">Seleccionar ubicación</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ubicación de Llegada</label>
                                <select class="form-select" name="arrival_location" id="arrival_location" required>
                                    <option value="">Seleccionar ubicación</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Fecha de Salida</label>
                                <input type="date" class="form-control" name="departure_date" id="departure_date" required min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fecha de Llegada</label>
                                <input type="date" class="form-control" name="arrival_date" id="arrival_date" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Descripción (mínimo 10 caracteres)</label>
                            <textarea class="form-control" name="description" id="description" rows="3" minlength="10" required></textarea>
                            <div class="invalid-feedback">La descripción debe tener al menos 10 caracteres.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Observaciones (opcional)</label>
                            <textarea class="form-control" name="observations" rows="2"></textarea>
                        </div>
                        
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="submitBtn">Enviar Solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const originSelect = document.getElementById('origin');
    const destinationSelect = document.getElementById('destination');
    const departureLocationSelect = document.getElementById('departure_location');
    const arrivalLocationSelect = document.getElementById('arrival_location');
    const departureDateInput = document.getElementById('departure_date');
    const arrivalDateInput = document.getElementById('arrival_date');
    
    // Cargar ubicaciones cuando se selecciona un país de origen
    originSelect.addEventListener('change', function() {
        if (this.value) {
            const transportId = document.getElementById('transport_id').value || '';
            loadLocations(this.value, departureLocationSelect, transportId);
        } else {
            departureLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
        }
    });
    
    // Cargar ubicaciones cuando se selecciona un país de destino
    destinationSelect.addEventListener('change', function() {
        if (this.value) {
            const transportId = document.getElementById('transport_id').value || '';
            loadLocations(this.value, arrivalLocationSelect, transportId);
        } else {
            arrivalLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
        }
    });
    
    // Validar fechas
    departureDateInput.addEventListener('change', function() {
        if (this.value) {
            // Establecer la fecha mínima de llegada como el día siguiente
            const nextDay = new Date(this.value);
            nextDay.setDate(nextDay.getDate() + 1);
            arrivalDateInput.min = nextDay.toISOString().split('T')[0];
            // Si la fecha de llegada es anterior a la nueva fecha mínima, la limpiamos
            if (arrivalDateInput.value && arrivalDateInput.value < arrivalDateInput.min) {
                arrivalDateInput.value = '';
            }
        }
    });
    
    // Validar formulario antes de enviar
    document.getElementById('newOrderForm').addEventListener('submit', function(event) {
        let isValid = true;
        
        // Verificar que todos los campos requeridos estén completos
        this.querySelectorAll('[required]').forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            event.preventDefault();
            alert('Por favor, complete todos los campos requeridos.');
            return false;
        }
        
        // Verificar que la fecha de llegada sea posterior a la de salida
        if (new Date(departureDateInput.value) >= new Date(arrivalDateInput.value)) {
            event.preventDefault();
            alert('La fecha de llegada debe ser posterior a la fecha de salida.');
            return false;
        }
        
        // Verificar que la descripción tenga al menos 10 caracteres
        const descriptionField = document.getElementById('description');
        if (descriptionField.value.trim().length < 10) {
            event.preventDefault();
            descriptionField.classList.add('is-invalid');
            alert('La descripción debe tener al menos 10 caracteres.');
            return false;
        }
        
        // Todo está bien, permitir el envío del formulario
        document.getElementById('submitBtn').disabled = true;
        document.getElementById('submitBtn').textContent = 'Enviando...';
        return true;
    });
    
    // Función para cargar ubicaciones
    function loadLocations(countryId, targetSelect, transportId) {
        if (!countryId) {
            return;
        }
        
        targetSelect.innerHTML = '<option value="">Cargando...</option>';
        
        fetch(`/api/countries/${countryId}/locations${transportId ? '?transport_id=' + transportId : ''}`)
            .then(response => response.json())
            .then(data => {
                targetSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
                data.forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.id;
                    option.textContent = location.name;
                    targetSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar ubicaciones:', error);
                targetSelect.innerHTML = '<option value="">Error al cargar ubicaciones</option>';
            });
    }
    
    // Recargar ubicaciones cuando cambia el transporte
    document.getElementById('transport_id').addEventListener('change', function() {
        const transportId = this.value;
        if (originSelect.value) {
            loadLocations(originSelect.value, departureLocationSelect, transportId);
        }
        if (destinationSelect.value) {
            loadLocations(destinationSelect.value, arrivalLocationSelect, transportId);
        }
    });
});
</script>
<style>
    .table > thead {
        --bs-table-color: white;
        --bs-table-bg: rgb(0, 31, 63);
        --bs-table-border-color: #dee2e6;
    }
</style>
@endsection


