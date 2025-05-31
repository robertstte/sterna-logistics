@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>Mis Pedidos</h2>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                Solicitar Nuevo Pedido
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
    <table class="table table-bordered">
        <tr class="text-center">
            <th class="header">@lang('translations.dashboard.table.orders.id')</th>
            <th class="header">@lang('translations.dashboard.table.orders.order')</th>
            <th class="header">@lang('translations.dashboard.table.orders.client')</th>
            <th class="header">@lang('translations.dashboard.table.orders.status')</th>
            <th class="header">@lang('translations.dashboard.table.orders.origin')</th>
            <th class="header">@lang('translations.dashboard.table.orders.destination')</th>
            <th class="header">@lang('translations.dashboard.table.orders.date')</th>
        </tr>
        @if($orders->isEmpty())
            <tr>
                <td colspan="7" class="text-center p-5">
                    <div class="mb-3">
                        <i class="fas fa-box-open fa-3x text-muted mb-2"></i>
                        <div class="h5 mb-3">No tienes pedidos confirmados todavía</div>
                        <a href="{{ route('user.orders') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Solicitar un nuevo pedido
                        </a>
                    </div>
                </td>
            </tr>
        @endif
        @foreach ($orders as $order)
            <tr class="text-center" data-bs-toggle="collapse" data-bs-target="#orderDetail{{ $order->id }}">
                <td class="body">{{ $loop->iteration }}</td>
                <td class="body">{{ $order->id }}</td>
                <td class="body">{{ $order->customer->name }}</td>
                <td class="body">
                    @if(is_object($order->status))
                        <span style="color: {{ $order->status->color }}">{{ __('translations.status')[strtolower($order->status->status)] }}</span>
                    @else
                        <span class="badge bg-warning">{{ $order->status }}</span>
                    @endif
                </td>
                <td class="body">{{ $order->originCountry->name ?? $order->orderDetail->originCountry->name ?? 'N/A' }}</td>
                <td class="body">{{ $order->destinationCountry->name ?? $order->orderDetail->destinationCountry->name ?? 'N/A' }}</td>
                <td class="body">{{ $order->departure_date ?? $order->orderDetail->departure_date ?? 'N/A' }}</td>
            </tr>
            <tr class="collapse" id="orderDetail{{ $order->id }}">
                <td colspan="7">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.description')</p>
                                    <div class="form-group">
                                        <textarea class="orderDetail-input" name="description" required>{{ $order->orderDetail->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.package_type')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ __('translations.package_type')[strtolower($order->orderDetail->packageType->type)] }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.arrival_date')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="date" name="arrival_date" min="{{ date('Y-m-d') }}" value="{{ $order->orderDetail->arrival_date }}" required>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.departure_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.transport_type')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->transport->type_id }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.weight')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->weight }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.status')</p>
                                    <div class="form-group">
                                        <select class="orderDetail-input" name="status" required>
                                            @foreach($statuses as $status)
                                                @if($order->status->status == $status->status)
                                                    <option style="color: {{ $status->color }}" value="{{ $status->id }}" selected>{{ __('translations.status')[strtolower($status->status)] }}</option>
                                                @else
                                                    <option style="color: {{ $status->color }}" value="{{ $status->id }}">{{ __('translations.status')[strtolower($status->status)] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.ubication')</p>
                                    <div class="form-group">
                                        <div style="height: 320px; border: 2px solid black; border-radius: 8px;">
                                            <!-- Agregar mapa -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.arrival_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->transport->license_plate }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.license_plate')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.total_cost')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->total_cost }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.observations')</p>
                                    <div class="form-group">
                                        <textarea class="orderDetail-input" rows="1" name="observations">{{ $order->orderDetail->observations }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

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
                                @foreach($packageTypes ?? [] as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Peso (kg)</label>
                            <input type="number" class="form-control" name="weight" step="0.01" min="0" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Transporte</label>
                            <select class="form-select" name="transport_id" id="transport_id" required>
                                <option value="">Seleccionar transporte</option>
                                @foreach($transports ?? [] as $transport)
                                    <option value="{{ $transport->id }}" data-capacity="{{ $transport->capacity }}">
                                        {{ $transport->transportType->type }} - {{ $transport->license_plate }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">País de Origen</label>
                            <select class="form-select" name="origin" id="origin" required>
                                <option value="">Seleccionar país</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">País de Destino</label>
                            <select class="form-select" name="destination" id="destination" required>
                                <option value="">Seleccionar país</option>
                                @foreach($countries ?? [] as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ubicación de Salida</label>
                            <select class="form-select" name="departure_location" id="departure_location" required>
                                <option value="">Seleccionar ubicación</option>
                                <!-- Se llenará dinámicamente -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Ubicación de Llegada</label>
                            <select class="form-select" name="arrival_location" id="arrival_location" required>
                                <option value="">Seleccionar ubicación</option>
                                <!-- Se llenará dinámicamente -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" name="departure_date" id="departure_date" min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Fecha de Llegada</label>
                            <input type="date" class="form-control" name="arrival_date" id="arrival_date" min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Descripción (mínimo 10 caracteres)</label>
                        <textarea class="form-control" name="description" id="description" rows="3" minlength="10" required></textarea>
                        <div class="invalid-feedback">La descripción debe tener al menos 10 caracteres.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea class="form-control" name="observations" rows="2"></textarea>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Solicitar Pedido</button>
                    </div>
                    
                    <!-- Mostrar errores de validación si existen -->
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
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
    const orderForm = document.getElementById('newOrderForm');
    
    // Manejar el envío del formulario
    if (orderForm) {
        orderForm.addEventListener('submit', function(event) {
            console.log('Formulario enviado');
            
            // Verificar que todos los campos requeridos estén completos
            const requiredFields = orderForm.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
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
            
            // Ya no validamos que el país de origen y destino sean diferentes
            // Esto permite envíos dentro del mismo país
            
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
    }
    
    // Función para cargar ubicaciones
    function loadLocations(countryId, targetSelect, transportId) {
        if (!countryId) {
            targetSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            return;
        }
        
        // Construir la URL con el transport_id si está disponible
        let url = `/api/countries/${countryId}/locations`;
        if (transportId) {
            url += `?transport_id=${transportId}`;
        }
        
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            targetSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            if (data && data.length > 0) {
                data.forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.id;
                    option.textContent = location.name;
                    targetSelect.appendChild(option);
                });
                targetSelect.disabled = false;
            } else {
                targetSelect.innerHTML = '<option value="">No hay ubicaciones disponibles</option>';
            }
        })
        .catch(error => {
            console.error('Error cargando ubicaciones:', error);
            targetSelect.innerHTML = '<option value="">Error al cargar ubicaciones</option>';
        });
    }
    
    // Cargar ubicaciones cuando cambia el país de origen
    originSelect.addEventListener('change', function() {
        const transportId = document.getElementById('transport_id').value;
        loadLocations(this.value, departureLocationSelect, transportId);
    });
    
    // Cargar ubicaciones cuando cambia el país de destino
    destinationSelect.addEventListener('change', function() {
        const transportId = document.getElementById('transport_id').value;
        loadLocations(this.value, arrivalLocationSelect, transportId);
    });
    
    // Actualizar ubicaciones cuando cambia el transporte
    document.getElementById('transport_id').addEventListener('change', function() {
        const transportId = this.value;
        if (originSelect.value) {
            loadLocations(originSelect.value, departureLocationSelect, transportId);
        }
        if (destinationSelect.value) {
            loadLocations(destinationSelect.value, arrivalLocationSelect, transportId);
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
});
</script>
@endsection
   