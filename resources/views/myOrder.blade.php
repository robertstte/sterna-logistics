@extends('layouts.app')



@section('content')


    <div class="container mt-5">
        @if (isset($status) && $status == 'no')
            <div class="alert alert-danger text-center">
                <h5>{{ $message }}</h5>
            </div>

        @elseif (isset($status) && $status == 'ok')
        <h2 class="text-center mb-4">@lang('translations.access.order.info.title')</h2>

            <div class="card shadow-lg p-4 mb-5">
                
                <div class="row">
                    <!-- Columna izquierda -->
                    <div class="col-md-6">
                        <!-- Sección: Pedido -->
                        <div class="mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.info.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.info.id')</strong>
                                <p class="text-muted">{{ $order->id }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.info.status')</strong>
                                <p class="text-muted">{{ $order->status->status }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.info.created_at')</strong>
                                <p class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Sección: Detalles de Origen/Destino -->
                        <div class="mb-3 p-3 mt-4" style="background-color: #e9ecef; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.route.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.route.origin')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->origin }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.route.destination')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->destination }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="col-md-6">
                        <!-- Sección: Fechas y Transporte -->
                        <div class="mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.dates_transport.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.dates_transport.departure')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->departure_date }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.dates_transport.arrival')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->arrival_date }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.dates_transport.transport')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->transport_id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 p-3 mt-4" style="background-color: #e9ecef; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.cost_weight.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.cost_weight.cost')</strong>
                                <p class="text-muted">${{ number_format($orderDetail[0]->total_cost, 2) }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.cost_weight.weight')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->weight }} kg</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 p-3 mt-4" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.location_package.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.location_package.location')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->location }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.location_package.type')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->package_type_id }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3 p-3 mt-4" style="background-color: #f8f9fa; border-radius: 8px;">
                            <h5 class="text-primary">@lang('translations.access.order.description_notes.title')</h5>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.description_notes.description')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->description }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.description_notes.observations')</strong>
                                <p class="text-muted">{{ $orderDetail[0]->observations }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif
    </div>
   
@endsection
