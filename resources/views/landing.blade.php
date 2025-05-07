@extends('layouts.app')

@section('content')
<div class="row hero">
    <p class="hero-title">@lang('translations.landing.hero.title')</p>
    <div class="hero-cta-container">
        <button class="nav-link cta btn">@lang('translations.landing.hero.cta')</button>
    </div>
</div>
<div class="row localization">
    <div class="col-12 col-xl-6">
        <p class="localization-title">@lang('translations.landing.localization.title')</p>
        <p class="localization-subtitle">@lang('translations.landing.localization.subtitle')</p>
        <form action="{{ route('myOrder.index') }}" method="POST" class="localization-form">
        @csrf  
        <input class="localization-form-text" type="text" name="order_id" placeholder="Nº 202503290000000001" maxlength="18" required>
        <input class="localization-form-submit btn" type="submit" value="@lang('translations.landing.localization.search')">
        <hr>
        <p class="localization-help">@lang('translations.landing.localization.help')</p>
    </form>
    </div>
    <div class="col-xl-6 d-none d-xl-block">
        <img loading="lazy" src="{{ asset('images/localization.svg') }}" alt="@lang('translations.landing.localization.illustration')">
    </div>
</div>
<div class="row">
    <p class="features-title mx-auto">@lang('translations.landing.features.title')</p>
    <div class="row features-circles-container mx-auto d-none d-lg-flex">
        <div class="features-circle">
            <img loading="lazy" src="{{ asset('icons/lock.svg') }}" alt="@lang('translations.landing.features.security')">
            <span class="features-circle-text">@lang('translations.landing.features.security')</span>
        </div>
        <div class="features-circle">
            <img loading="lazy" src="{{ asset('icons/anchor.svg') }}" alt="@lang('translations.landing.features.robustness')">
            <span class="features-circle-text">@lang('translations.landing.features.robustness')</span>
        </div>
        <div class="features-circle">
            <img loading="lazy" src="{{ asset('icons/clock.svg') }}" alt="@lang('translations.landing.features.speed')">
            <span class="features-circle-text">@lang('translations.landing.features.speed')</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="features-card">
                <p class="features-card-title">@lang('translations.landing.features.control.title')</p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="features-card-message">@lang('translations.landing.features.control.message')</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img loading="lazy" src="{{ asset('icons/control.svg') }}" alt="@lang('translations.landing.features.control.icon')">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="features-card">
                <p class="features-card-title">@lang('translations.landing.features.transport.title')</p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="features-card-message">@lang('translations.landing.features.transport.message')</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img loading="lazy" src="{{ asset('icons/transport.svg') }}" alt="@lang('translations.landing.features.transport.icon')">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="features-card-dark">
                <p class="features-card-title-dark">@lang('translations.landing.features.notified.title')</p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="features-card-message">@lang('translations.landing.features.notified.message')</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img loading="lazy" src="{{ asset('icons/notified.svg') }}" alt="@lang('translations.landing.features.notified.icon')">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="features-card">
                <p class="features-card-title">@lang('translations.landing.features.invoicing.title')</p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="features-card-message">@lang('translations.landing.features.invoicing.message')</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img loading="lazy" src="{{ asset('icons/invoice.svg') }}" alt="@lang('translations.landing.features.invoicing.icon')">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="auto-scroll">
            <a href="#"><img loading="lazy" src="{{ asset('icons/arrow.svg') }}" alt="Arrow"></a>
        </div>
    </div>
</div>
@endsection