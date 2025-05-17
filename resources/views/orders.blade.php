@extends('layouts.dashboard')

@section('content')
<div class="ps-5 pe-5">
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
        @foreach ($orders as $order)
            <tr class="text-center" data-bs-toggle="collapse" data-bs-target="#orderDetail{{ $order->id }}">
                <td class="body">{{ $loop->iteration }}</td>
                <td class="body">{{ $order->id }}</td>
                <td class="body">{{ $order->customer->name }}</td>
                <td class="body" style="color: {{ $order->status->color }}">{{ __('translations.status')[strtolower($order->status->status)] }}</td>
                <td class="body">{{ $order->orderDetail->originCountry->name }}</td>
                <td class="body">{{ $order->orderDetail->destinationCountry->name }}</td>
                <td class="body">{{ $order->orderDetail->departure_date }}</td>
            </tr>
            <tr class="collapse" id="orderDetail{{ $order->id }}">
                <td colspan="7">
                    <form action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
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
                                        <input class="orderDetail-input form-control" type="text" value="{{ __('translations.package_type')[strtolower($order->orderDetail->packageType->type)] }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.arrival_date')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="date" name="arrival_date" min={{ date('Y-m-d') }} value="{{ $order->orderDetail->arrival_date }}" required>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.departure_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input form-control" value="{{ $order->orderDetail->departureLocation->name ?? 'N/A'}}" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.transport_type')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input form-control" type="text" value="{{ $order->orderDetail->transport->transportType->type }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.weight')</p>
                                    <div class="input-group">
                                        <input class="orderDetail-input form-control" type="text" value="{{ $order->orderDetail->weight }}" disabled>
                                        <span class="input-group-text">KG</span>
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
                                        <div style="height: 320px; border: 2px solid black; border-radius: 8px;" class="map-ubication" id="ubication{{ $order->orderDetail->id }}"
                                        data-departure-lat="{{ optional($order->orderDetail->departureLocation)->latitude }}"
                                        data-departure-lng="{{ optional($order->orderDetail->departureLocation)->longitude }}"
                                        data-arrival-lat="{{ optional($order->orderDetail->arrivalLocation)->latitude }}"
                                        data-arrival-lng="{{ optional($order->orderDetail->arrivalLocation)->longitude }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.arrival_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input form-control" value="{{ $order->orderDetail->arrivalLocation->name ?? 'N/A' }}" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.license_plate')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input form-control" type="text" value="{{ $order->orderDetail->transport->license_plate }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.orders.details.total_cost')</p>
                                    <div class="input-group">
                                        <input class="orderDetail-input form-control" type="text" value="{{ $order->orderDetail->total_cost }}" disabled>
                                        <span class="input-group-text">Euro</span>
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
                        <div class="row pt-4 pb-4 pe-2 float-end">
                            <div class="col">
                                <button class="btn btn-danger orderDetail-btn">@lang('translations.dashboard.table.orders.details.cancel')</button>
                                <input class="btn btn-success orderDetail-btn" type="submit" value="@lang('translations.dashboard.table.orders.details.save')">
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Botón flotante para añadir pedido -->
<button class="btn-floating" data-bs-toggle="modal" data-bs-target="#newOrderModal">
    <img src="{{ asset('icons/plus.svg') }}" alt="Añadir pedido" width="24" height="24">
</button>

<!-- Modal para nuevo pedido -->
<div class="modal fade" id="newOrderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="newOrderForm" action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Cliente</label>
                            <select class="form-select" name="customer_id" required>
                                <option value="">Seleccionar cliente</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tipo de Paquete</label>
                            <select class="form-select" name="package_type_id" required>
                                <option value="">Seleccionar tipo</option>
                                @foreach($packageTypes as $type)
                                    <option value="{{ $type->id }}">{{ __('translations.package_type')[strtolower($type->type)] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Peso (KG)</label>
                            <input type="number" class="form-control" name="weight" required step="0.01" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Transporte</label>
                            <select class="form-select" name="transport_id" required>
                                <option value="">Seleccionar transporte</option>
                                @foreach($transports as $transport)
                                    <option value="{{ $transport->id }}" data-type="{{ $transport->transportType->type }}" data-capacity="{{ $transport->capacity }}">
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
                            <select class="form-select" name="departure_location" id="departure_location" disabled>
                                <option value="">Seleccionar ubicación</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ubicación de Llegada</label>
                            <select class="form-select" name="arrival_location" id="arrival_location" disabled>
                                <option value="">Seleccionar ubicación</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" name="departure_date" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Fecha de Llegada</label>
                            <input type="date" class="form-control" name="arrival_date" required min="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" required rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="newOrderForm" class="btn btn-primary">Crear Pedido</button>
            </div>
        </div>
    </div>
</div>

<style>
.btn-floating {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #ff6b00;
    border: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: transform 0.2s;
}

.btn-floating:hover {
    transform: scale(1.1);
}

.btn-floating img {
    filter: brightness(0) invert(1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const originSelect = document.getElementById('origin');
    const destinationSelect = document.getElementById('destination');
    const departureLocationSelect = document.getElementById('departure_location');
    const arrivalLocationSelect = document.getElementById('arrival_location');
    const weightInput = document.querySelector('input[name="weight"]');
    const transportSelect = document.querySelector('select[name="transport_id"]');
    const departureDateInput = document.querySelector('input[name="departure_date"]');
    const arrivalDateInput = document.querySelector('input[name="arrival_date"]');

    // Función para cargar ubicaciones
    function loadLocations(countryId, targetSelect, transportId) {
        if (!transportId) {
            targetSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            targetSelect.disabled = true;
            return;
        }

        fetch(`/api/countries/${countryId}/locations?transport_id=${transportId}`)
            .then(response => response.json())
            .then(locations => {
                targetSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
                locations.forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.id;
                    option.textContent = location.name;
                    targetSelect.appendChild(option);
                });
                targetSelect.disabled = false;
            });
    }

    // Manejar cambio de transporte
    transportSelect.addEventListener('change', () => {
        const transportId = transportSelect.value;
        
        // Resetear y deshabilitar selectores de ubicación si no hay transporte seleccionado
        if (!transportId) {
            departureLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            arrivalLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            departureLocationSelect.disabled = true;
            arrivalLocationSelect.disabled = true;
            return;
        }

        // Cargar ubicaciones si hay países seleccionados
        if (originSelect.value) {
            loadLocations(originSelect.value, departureLocationSelect, transportId);
        }
        if (destinationSelect.value) {
            loadLocations(destinationSelect.value, arrivalLocationSelect, transportId);
        }
    });

    // Cargar ubicaciones cuando cambia el país de origen
    originSelect.addEventListener('change', () => {
        if (originSelect.value && transportSelect.value) {
            loadLocations(originSelect.value, departureLocationSelect, transportSelect.value);
        } else {
            departureLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            departureLocationSelect.disabled = true;
        }
    });

    // Cargar ubicaciones cuando cambia el país de destino
    destinationSelect.addEventListener('change', () => {
        if (destinationSelect.value && transportSelect.value) {
            loadLocations(destinationSelect.value, arrivalLocationSelect, transportSelect.value);
        } else {
            arrivalLocationSelect.innerHTML = '<option value="">Seleccionar ubicación</option>';
            arrivalLocationSelect.disabled = true;
        }
    });

    // Validar peso contra capacidad del transporte
    transportSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value && weightInput.value) {
            const capacity = parseFloat(selectedOption.dataset.capacity);
            const weight = parseFloat(weightInput.value);
            if (weight > capacity) {
                alert('El peso excede la capacidad del transporte seleccionado');
                this.value = '';
            }
        }
    });

    weightInput.addEventListener('change', function() {
        const selectedOption = transportSelect.options[transportSelect.selectedIndex];
        if (selectedOption.value && this.value) {
            const capacity = parseFloat(selectedOption.dataset.capacity);
            const weight = parseFloat(this.value);
            if (weight > capacity) {
                alert('El peso excede la capacidad del transporte seleccionado');
                transportSelect.value = '';
            }
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