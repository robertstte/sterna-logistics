@extends('layouts.dashboard')

@section('content')
<div class="ps-5 pe-5">
    <table class="table table-bordered">
        <tr class="text-center">
            <th class="header">@lang('translations.dashboard.table.customers.name')</th>
            <th class="header">@lang('translations.dashboard.table.customers.email')</th>
            <th class="header">@lang('translations.dashboard.table.customers.address')</th>
            <th class="header">@lang('translations.dashboard.table.customers.phone')</th>
            <th class="header">@lang('translations.dashboard.table.customers.country')</th>
            <th class="header">@lang('translations.dashboard.table.customers.customer_type')</th>
        </tr>
        @foreach ($customers as $customer)
            <tr class="text-center">
                <td class="body">{{ $customer->name }}</td>
                <td class="body">{{ $customer->email }}</td>
                <td class="body">{{ $customer->address }}</td>
                <td class="body">{{ $customer->phone }}</td>
                <td class="body">{{ $customer->country->name }}</td>
                <td class="body">{{ $customer->customerType->type }}</td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $customers->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection