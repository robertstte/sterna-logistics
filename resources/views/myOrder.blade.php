@extends('layouts.access')

<?php 
    $orderDetail = $orderDetail[0]; // Acceso a la primera entrada si es un array
?>

@section('content')
    <div class="container mt-5">
        @if (isset($status) && $status == 'no')
            <div class="alert alert-danger text-center">
                <h5>{{ $message }}</h5>
            </div>

        @elseif (isset($status) && $status == 'ok')
        <h2 class="text-center mb-4">Detalles del Pedido</h2>

            <div class="card shadow-lg p-4 mb-5">
                
                <div class="row">
                    <!-- Columna izquierda -->
                    <div class="col-md-6">
                        <!-- Sección: Pedido -->
                        <div class="mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">Información del Pedido</h5>
                            <div class="mb-2">
                                <strong>ID del Pedido:</strong>
                                <p class="text-muted">{{ $order->id }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Estado:</strong>
                                <p class="text-muted">{{ $order->status }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Fecha de Creación:</strong>
                                <p class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Sección: Detalles de Origen/Destino -->
                        <div class="mb-3 p-3 mt-4" style="background-color: #e9ecef; border-radius: 8px;">
                            <h5 class="text-primary">Origen y Destino</h5>
                            <div class="mb-2">
                                <strong>Origen:</strong>
                                <p class="text-muted">{{ $orderDetail->origin }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Destino:</strong>
                                <p class="text-muted">{{ $orderDetail->destination }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="col-md-6">
                        <!-- Sección: Fechas y Transporte -->
                        <div class="mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">Fechas y Transporte</h5>
                            <div class="mb-2">
                                <strong>Fecha de Salida:</strong>
                                <p class="text-muted">{{ $orderDetail->departure_date }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Fecha de Llegada:</strong>
                                <p class="text-muted">{{ $orderDetail->arrival_date }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>ID de Transporte:</strong>
                                <p class="text-muted">{{ $orderDetail->transport_id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 p-3 mt-4" style="background-color: #e9ecef; border-radius: 8px;">
                            <h5 class="text-primary">Costos y Peso</h5>
                            <div class="mb-2">
                                <strong>Costo Total:</strong>
                                <p class="text-muted">${{ number_format($orderDetail->total_cost, 2) }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Peso:</strong>
                                <p class="text-muted">{{ $orderDetail->weight }} kg</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 p-3 mt-4" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">Ubicación y Tipo de Paquete</h5>
                            <div class="mb-2">
                                <strong>Ubicación:</strong>
                                <p class="text-muted">{{ $orderDetail->location }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Tipo de Paquete:</strong>
                                <p class="text-muted">{{ $orderDetail->package_type_id }}</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="mb-3 p-3 mt-4" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">Descripción y Observaciones</h5>
                            <div class="mb-2">
                                <strong>Descripción:</strong>
                                <p class="text-muted">{{ $orderDetail->description }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>Observaciones:</strong>
                                <p class="text-muted">{{ $orderDetail->observations }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
@endsection
