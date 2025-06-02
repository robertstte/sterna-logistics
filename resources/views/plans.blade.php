@extends('layouts.app')

@section('content')
<div class="main-bg">
    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('welcome'))
                <div class="alert alert-success mb-4">
                    <h4>¡Bienvenido {{ Auth::user()->username }}!</h4>
                    <p>Por favor, selecciona el plan que mejor se adapte a tus necesidades.</p>
                </div>
            @endif

            <h2 class="text-center mb-5">@lang('translations.plans.title')</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach($plans as $plan)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 {{ $currentPlan->id === $plan->id ? 'border-primary' : '' }}">
                        <div class="card-body d-flex flex-column">
                            {{-- Icono representativo del plan --}}
@if($plan->id == 1)
    <div class="plan-icon"><i class="fas fa-star"></i></div>
@elseif($plan->id == 2)
    <div class="plan-icon"><i class="fas fa-briefcase"></i></div>
@elseif($plan->id == 3)
    <div class="plan-icon"><i class="fas fa-gem"></i></div>
@endif
@php
    $lang = App::getLocale();
@endphp
@php
    $lang = App::getLocale();
@endphp
<h5 class="card-title">
    @if($lang == 'es')
        @if($plan->id == 1)
            Gratuito
        @elseif($plan->id == 2)
            Pymes 
        @elseif($plan->id == 3)
            Grandes Empresas
        @endif
    @else
        @if($plan->id == 1)
            Free
        @elseif($plan->id == 2)
            Pymes
        @elseif($plan->id == 3)
           Big Business
        @endif
    @endif
</h5>
<p class="card-text">
    @if($lang == 'es')
        @if($plan->id == 1)
            Ideal para comenzar y probar la plataforma.
        @elseif($plan->id == 2)
            Para profesionales que requieren más descargas y reportes.
        @elseif($plan->id == 3)
            Solución completa para empresas con necesidades avanzadas.
        @endif
    @else
        @if($plan->id == 1)
            Ideal to start and test the platform.
        @elseif($plan->id == 2)
            For professionals who need more downloads and reports.
        @elseif($plan->id == 3)
            Complete solution for companies with advanced needs.
        @endif
    @endif
</p>
<p class="card-text"><strong>@lang('translations.plans.price'): {{ $plan->price }}€</strong></p>

                                {{-- Información extra de cada plan --}}
@if($plan->id == 1)
    <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>5/@lang('translations.plans.per_month')</strong></li>
<li class="list-group-item">@lang('translations.plans.discount'): <strong>0%</strong></li>
<li class="list-group-item"><i class="fas fa-envelope"></i> @lang('translations.plans.basic_support')</li>
    </ul>
@elseif($plan->id == 2)
    <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>100/@lang('translations.plans.per_month')</strong></li>
<li class="list-group-item">@lang('translations.plans.discount'): <strong>3%</strong></li>
<li class="list-group-item"><i class="fas fa-chart-line"></i> @lang('translations.plans.reports_priority')</li>
    </ul>
@elseif($plan->id == 3)
    <ul class="list-group list-group-flush mb-3">
        <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>@lang('translations.plans.unlimited')</strong></li>
<li class="list-group-item">@lang('translations.plans.discount'): <span style="color: #dc3545;"><s>7%</s></span> <strong>10%</strong> <span class="badge bg-success">@lang('translations.plans.exclusive_promo')</span></li>
<li class="list-group-item"><i class="fas fa-headset"></i> @lang('translations.plans.enterprise_services')</li>
    </ul>
@endif
                            
                      @php
    // This flag should ideally be passed from your controller (e.g., PlanController@showPlans).
    // It indicates if the user has just registered and is on the default plan.
    // If not passed, it defaults to false, and the 'Default Plan' specific text might not appear as intended.
    $isNewlyRegistered = $isNewlyRegistered ?? false;
@endphp

@if($isNewlyRegistered && isset($currentPlan) && $currentPlan->id == 1 && $plan->id == 1)
    {{-- User is newly registered AND their current plan is the default free plan (ID 1) AND this card is for the free plan --}}
    <button class="btn btn-primary btn-custom mt-auto w-100 mb-2" disabled>@lang('translations.plans.default_plan', [], $lang)</button>
@elseif(isset($currentPlan) && $currentPlan->id === $plan->id)
    {{-- This is the user's current plan (and not the "newly registered default" case) --}}
    {{-- IMPORTANT: Ensure you add 'translations.plans.selected_plan' to your language files (e.g., resources/lang/en/translations.php and resources/lang/es/translations.php) --}}
    <button class="btn btn-success btn-custom mt-auto w-100 mb-2" disabled>@lang('translations.plans.selected_plan', [], $lang)</button>
@else
    {{-- This is not the user's current plan, so they can choose it --}}
    @if($plan->id == 1)
        {{-- This is the Free Plan (ID 1) and it's not their current plan --}}
        <form action="{{ route('plans.update') }}" method="POST" class="mt-auto w-100">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            {{-- This route should handle direct plan update to free without payment (uses PlanController@updatePlan) --}}
            <button type="submit" class="btn btn-outline-primary btn-custom mb-2">@lang('translations.plans.choose_plan', [], $lang)</button>
        </form>
    @else
        {{-- This is a Paid Plan and it's not their current plan --}}
        <form action="{{ route('stripe.checkout') }}" method="POST" class="mt-auto w-100">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            <input type="hidden" name="amount" value="{{ $plan->price }}">
            <input type="hidden" name="plan_name" value="{{ $lang == 'es' ? ($plan->id == 2 ? 'Pymes' : 'Grandes Empresas') : ($plan->id == 2 ? 'Pymes' : 'Big Business') }}">
            <button type="submit" class="btn btn-outline-primary btn-custom mb-2">@lang('translations.plans.choose_plan', [], $lang)</button>
        </form>
    @endif
@endif 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>

<style>
.main-bg {
    background: #f4f6fb;
    width: 100%;
    padding-bottom: 40px;
}

.card-plan {
    background: #f4f6fb;
    border-radius: 18px;
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}

.card {
    transition: all 0.3s ease;
    border: 1px solid #ddd;
    box-shadow: 0 8px 32px rgba(0,0,0,0.22), 0 4px 24px rgba(0,0,0,0.18);
    border-radius: 18px;
    margin-bottom: 25px;
    background: #fff;
    position: relative;
}

.plan-icon {
    font-size: 2.5rem;
    color: #007bff;
    margin-bottom: 12px;
    text-align: center;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card.border-primary {
    border-width: 2px;
}

.card-title {
    color: #007bff;
    font-weight: bold;
}

.btn-custom {
    width: 100%;
    margin-top: 15px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
}
</style>
@endsection 