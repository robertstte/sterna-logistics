@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sección de selección de pedido individual -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header dheader d-flex justify-content-between align-items-center">
                    <h5 class="card-title text-white mb-0">Generar Factura Individual</h5>
                    <button class="btn btn-light btn-sm" id="generateSelectedInvoices" disabled>
                        Generar Facturas Seleccionadas
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="text-center order-row" data-order-id="{{ $order->id }}">
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->orderDetail->originCountry->name }}</td>
                                    <td>{{ $order->orderDetail->destinationCountry->name }}</td>
                                    <td>{{ $order->orderDetail->departure_date }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm add-invoice">
                                            Añadir
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de generación masiva -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header dheader">
                    <h5 class="card-title text-white">Generar Facturas en Lote</h5>
                </div>
                <div class="card-body">
                    <form id="bulkInvoiceForm">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Cliente (Opcional)</label>
                            <select class="form-select" id="customer_id" name="customer_id">
                                <option value="">Todos los clientes</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generar Facturas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .table tbody tr.order-row:hover {
        background-color: rgb(184, 184, 184) !important;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    let selectedOrders = new Set();

    // Función para actualizar el estado del botón de generar facturas
    function updateGenerateButton() {
        $('#generateSelectedInvoices').prop('disabled', selectedOrders.size === 0);
    }

    // Añadir/Quitar pedido de la selección
    $('.add-invoice').on('click', function() {
        const row = $(this).closest('tr');
        const orderId = row.data('order-id');
        const button = $(this);

        if (selectedOrders.has(orderId)) {
            // Deseleccionar
            selectedOrders.delete(orderId);
            row.removeClass('table-primary');
            button.text('Añadir').removeClass('btn-primary').addClass('btn-outline-primary');
        } else {
            // Seleccionar
            selectedOrders.add(orderId);
            row.addClass('table-primary');
            button.text('Quitar').removeClass('btn-outline-primary').addClass('btn-primary');
        }

        updateGenerateButton();
    });

    // Generar facturas seleccionadas
    $('#generateSelectedInvoices').on('click', function() {
        if (selectedOrders.size === 0) return;

        console.log('Selected Orders:', Array.from(selectedOrders)); // Depuración: Verificar los order_ids seleccionados

        $.ajax({
            url: '{{ route("invoices.generate") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                order_id: selectedOrders.values().next().value // Envía solo un ID
            },
            success: function(response) {
                alert('Factura generada exitosamente');
            },
            error: function(xhr) {
                alert('Error al generar la factura');
            }
        });
    });

    // Generar facturas en lote
    $('#bulkInvoiceForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route("invoices.generate-bulk") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                customer_id: $('#customer_id').val()
            },
            success: function(response) {
                if (response.success) {
                    alert('Facturas generadas exitosamente');
                }
            },
            error: function(xhr) {
                alert('Error al generar las facturas');
            }
        });
    });
});
</script>
@endpush
@endsection
