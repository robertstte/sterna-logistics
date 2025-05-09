@extends('layouts.app')



@section('content')


    <div class="container mt-5 ">
        
        <div class="col-10 mx-auto">
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
                                <p class="text-muted">{{ $orderDetail[0]->country->name }}</p>
                            </div>
                            <div class="mb-2">
                                <strong>@lang('translations.access.order.route.destination')</strong>
                                
                                <p class="text-muted">{{ $orderDetail[0]->country->name }}</p>
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
                            @switch($orderDetail[0]->transport->type)
                                @case ('Air') 
                                    <div class="mb-2">
                                        <strong>@lang('translations.access.order.dates_transport.transport')</strong>
                                        <p class="text-muted">
                                            @php echo __('translations.access.order.dates_transport.air') . ' - ' . $orderDetail[0]->transport->license_plate; @endphp
                                        </p>
                                    </div>
                                @break


                                @case ('Maritime') 
                                    <div class="mb-2">
                                        <strong>@lang('translations.access.order.dates_transport.transport')</strong>
                                        <p class="text-muted">
                                            @php echo __('translations.access.order.dates_transport.maritime') . ' - ' . $orderDetail[0]->transport->license_plate; @endphp
                                        </p>
                                    </div>
                                @break
                                @case ('Land') 
                                    <div class="mb-2">
                                        <strong>@lang('translations.access.order.dates_transport.transport')</strong>
                                        <p class="text-muted">
                                            @php echo __('translations.access.order.dates_transport.land') . ' - ' . $orderDetail[0]->transport->license_plate; @endphp
                                        </p>
                                    </div>
                                @break
                            @endswitch
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
                                <p class="text-muted">{{ $orderDetail[0]->packageType->type }}</p>
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
    </div>
    
    <div class="container mt-4">
        <h2 class="text-center mb-4">Seguimiento de Pedido</h2>
        
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>
@endsection
    
    <script>
        const origen = { lat: 40.416775, lng: -3.703790 };   // Madrid
    const destino = { lat: 41.387019, lng: 2.167858 };   // Barcelona

    let marker;
let step = 0;
let routeCoords = [];

function moveMarker() {
    if (step >= routeCoords.length) return;

    marker.setPosition(routeCoords[step]);
    step++;
    setTimeout(moveMarker, 1000); // Cambia la velocidad aquí
}

function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: origen,
    });

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    directionsService.route(
        {
            origin: origen,
            destination: destino,
            travelMode: google.maps.TravelMode.DRIVING,
        },
        (response, status) => {
            if (status === "OK") {
                directionsRenderer.setDirections(response);

                const path = response.routes[0].overview_path;
                routeCoords = path;
                marker = new google.maps.Marker({
                    position: path[0],
                    map: map,
                    icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
                });

                moveMarker();
            }
        }
    );
}

{{$apiKey = env('APP_GOOGLE_KEY');}}
@dd($apiKey)


    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap">
    </script>
    
