@extends('layouts.dashboard')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr class="text-center">
            <th class="header">@lang('translations.dashboard.table.id')</th>
            <th class="header">@lang('translations.dashboard.table.order')</th>
            <th class="header">@lang('translations.dashboard.table.client')</th>
            <th class="header">@lang('translations.dashboard.table.status')</th>
            <th class="header">@lang('translations.dashboard.table.origin')</th>
            <th class="header">@lang('translations.dashboard.table.destination')</th>
            <th class="header">@lang('translations.dashboard.table.date')</th>
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
                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.description')</p>
                                    <div class="form-group">
                                        <textarea class="orderDetail-input" name="description" required>{{ $order->orderDetail->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.package_type')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ __('translations.package_type')[strtolower($order->orderDetail->packageType->type)] }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.arrival_date')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="date" name="arrival_date" min={{ date('Y-m-d') }} value="{{ $order->orderDetail->arrival_date }}" required>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.departure_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.transport_type')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->transport->type_id }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.weight')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->weight }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.status')</p>
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
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.ubication')</p>
                                    <div class="form-group">
                                        <div style="height: 320px; border: 2px solid black; border-radius: 8px;">
                                            <!-- Agregar mapa -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.license_plate')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->transport->license_plate }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.arrival_location')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.total_cost')</p>
                                    <div class="form-group">
                                        <input class="orderDetail-input" type="text" value="{{ $order->orderDetail->total_cost }}" disabled>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <p class="orderDetail-title">@lang('translations.dashboard.table.details.observations')</p>
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
@endsection