@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-10">
                @if (isset($status) && $status == 'no')
                    <div class="alert alert-danger text-center shadow-sm">
                        <h5 class="mb-0">{{ $message }}</h5>
                    </div>
                @elseif (isset($status) && $status == 'ok')
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-box text-white"></i>
                        </div>
                        <h2 class="mb-0">@lang('translations.access.order.info.title') #{{ $order->id }}</h2>
                    </div>
                    
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden mb-5">
                
                        <div class="card-header bg-primary text-white p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0"><i class="fas fa-truck-moving me-2"></i> @lang('translations.access.order.info.status'): 
                                        <span class="badge bg-light text-primary">{{ $order->status->status }}</span>
                                    </h5>
                                </div>
                                <div>
                                    <span class="badge bg-light text-primary">
                                        <i class="far fa-calendar-alt me-1"></i> {{ $order->created_at->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body p-4">
                            <!-- Ruta y Transporte - Fila Superior -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-center px-3">
                                                    <div class="bg-light rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                        <i class="fas fa-map-marker-alt text-primary" style="font-size: 1.5rem;"></i>
                                                    </div>
                                                    <h6>@lang('translations.access.order.route.origin')</h6>
                                                    <p class="mb-0 text-muted">{{ $orderDetail[0]->originCountry->name }}</p>
                                                </div>
                                                
                                                <div class="align-self-center flex-grow-1 px-4">
                                                    <div class="progress" style="height: 4px;">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                                                    </div>
                                                    @switch($orderDetail[0]->transport->type_id)
                                                        @case ('1')
                                                            <div class="text-center mt-2">
                                                                <i class="fas fa-plane text-primary"></i>
                                                                <small class="d-block">{{ $orderDetail[0]->transport->license_plate }}</small>
                                                            </div>
                                                        @break
                                                        @case ('2')
                                                            <div class="text-center mt-2">
                                                                <i class="fas fa-ship text-primary"></i>
                                                                <small class="d-block">{{ $orderDetail[0]->transport->license_plate }}</small>
                                                            </div>
                                                        @break
                                                        @case ('3')
                                                            <div class="text-center mt-2">
                                                                <i class="fas fa-truck text-primary"></i>
                                                                <small class="d-block">{{ $orderDetail[0]->transport->license_plate }}</small>
                                                            </div>
                                                        @break
                                                    @endswitch
                                                </div>
                                                
                                                <div class="text-center px-3">
                                                    <div class="bg-light rounded-circle p-3 mx-auto mb-2" style="width: 60px; height: 60px;">
                                                        <i class="fas fa-flag-checkered text-primary" style="font-size: 1.5rem;"></i>
                                                    </div>
                                                    <h6>@lang('translations.access.order.route.destination')</h6>
                                                    <p class="mb-0 text-muted">{{ $orderDetail[0]->destinationCountry->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Información Principal - Fila Media -->
                            <div class="row mb-4">
                                <!-- Fechas -->
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="card-title border-bottom pb-2"><i class="far fa-calendar-alt text-primary me-2"></i> @lang('translations.access.order.dates_transport.title')</h5>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <small class="text-muted d-block">@lang('translations.access.order.dates_transport.departure')</small>
                                                    <strong>{{ $orderDetail[0]->departure_date }}</strong>
                                                </div>
                                                <div class="text-end">
                                                    <small class="text-muted d-block">@lang('translations.access.order.dates_transport.arrival')</small>
                                                    <strong>{{ $orderDetail[0]->arrival_date }}</strong>
                                                </div>
                                            </div>
                                            <div class="mt-2 pt-2 border-top">
                                                <small class="text-muted d-block">@lang('translations.access.order.dates_transport.transport')</small>
                                                @switch($orderDetail[0]->transport->type_id)
                                                    @case ('1')
                                                        <strong><i class="fas fa-plane text-primary me-1"></i> @lang('translations.access.order.dates_transport.air') - {{ $orderDetail[0]->transport->license_plate }}</strong>
                                                    @break
                                                    @case ('2')
                                                        <strong><i class="fas fa-ship text-primary me-1"></i> @lang('translations.access.order.dates_transport.maritime') - {{ $orderDetail[0]->transport->license_plate }}</strong>
                                                    @break
                                                    @case ('3')
                                                        <strong><i class="fas fa-truck text-primary me-1"></i> @lang('translations.access.order.dates_transport.land') - {{ $orderDetail[0]->transport->license_plate }}</strong>
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Paquete -->
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="card-title border-bottom pb-2"><i class="fas fa-box text-primary me-2"></i> @lang('translations.access.order.location_package.title')</h5>
                                            <div class="mb-2">
                                                <small class="text-muted d-block">@lang('translations.access.order.location_package.type')</small>
                                                <strong>{{ $orderDetail[0]->packageType->type }}</strong>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">@lang('translations.access.order.location_package.location')</small>
                                                <strong>{{ $orderDetail[0]->originCountry->name }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Costo -->
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm h-100 bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title border-bottom pb-2"><i class="fas fa-dollar-sign text-primary me-2"></i> @lang('translations.access.order.cost_weight.title')</h5>
                                            <div class="text-center py-2">
                                                <span class="h3 text-primary">${{ number_format($orderDetail[0]->total_cost, 2) }}</span>
                                                <div class="mt-2">
                                                    <small class="text-muted">@lang('translations.access.order.cost_weight.weight'): <strong>{{ $orderDetail[0]->weight }} kg</strong></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Descripción y Observaciones - Fila Inferior -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title border-bottom pb-2"><i class="fas fa-info-circle text-primary me-2"></i> @lang('translations.access.order.description_notes.title')</h5>
                                            <div class="row">
                                                <div class="col-md-6 mb-3 mb-md-0">
                                                    <small class="text-muted d-block">@lang('translations.access.order.description_notes.description')</small>
                                                    <p>{{ $orderDetail[0]->description ?: 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <small class="text-muted d-block">@lang('translations.access.order.description_notes.observations')</small>
                                                    <p class="mb-0">{{ $orderDetail[0]->observations ?: 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
        @endif
        </div>
    </div>
    
    <div class="container-fluid py-4 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-10">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-map-marked-alt text-white"></i>
                        </div>
                        <h2 class="mb-0">@lang('translations.access.order.tracking')</h2>
                    </div>
                    
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden mb-5">
                        <div class="card-body p-0">
                            <div id="map" style="height: 500px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
    <script>
    const origen = {
        lat: parseFloat("{{ $orderDetail[0]->departureLocation->latitude }}"),
        lng: parseFloat("{{ $orderDetail[0]->departureLocation->longitude }}")
    };

    const destino = {
        lat: parseFloat("{{ $orderDetail[0]->arrivalLocation->latitude }}"),
        lng: parseFloat("{{ $orderDetail[0]->arrivalLocation->longitude }}")
    };

    console.log(destino, origen);

    let marker;
    let step = 0;
    let routeCoords = [];

    function interpolateCoords(start, end, numSteps) {
        const coords = [];
        for (let i = 0; i <= numSteps; i++) {
            const lat = start.lat + (end.lat - start.lat) * (i / numSteps);
            const lng = start.lng + (end.lng - start.lng) * (i / numSteps);
            coords.push({ lat, lng });
        }
        return coords;
    }

    function moveMarker() {
        if (step >= routeCoords.length) return;

        marker.setPosition(routeCoords[step]);
        step++;
        setTimeout(moveMarker, 100); // más rápido y suave
    }

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: origen,
        });

        // Línea de vuelo
        const flightPath = new google.maps.Polyline({
            path: [origen, destino],
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        });

        flightPath.setMap(map);

        // Crear pasos para animar el marcador
        routeCoords = interpolateCoords(origen, destino, 100); // 100 pasos

        marker = new google.maps.Marker({
            position: origen,
            map: map,
            icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
        });

        moveMarker();
    }
</script>

<?php
$apiKey = env('APP_GOOGLE_KEY');
?>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap">
    </script>
    
