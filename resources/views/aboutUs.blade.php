@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <!-- Encabezado de la página -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">@lang('translations.about.title')</h1>
                <div class="d-flex justify-content-center">
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                </div>
                <p class="lead text-muted">@lang('translations.about.subtitle')</p>
            </div>
        </div>

        <!-- Sección Quiénes Somos -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4 bg-white rounded-3 shadow-sm">
                    <h2 class="h3 fw-bold mb-4 text-primary"><i class="fas fa-building me-2"></i> @lang('translations.about.who_we_are.title')</h2>
                    <p class="mb-3">@lang('translations.about.who_we_are.content_1')</p>
                    <p class="mb-0">@lang('translations.about.who_we_are.content_2')</p>
                </div>
            </div>
            <div class="col-lg-6 position-relative">
                <div class="d-none d-lg-block">
                    <img src="{{ asset('images/Collaborate.png') }}" alt="Logistics collaboration" class="img-fluid position-absolute" style="max-height: 380px; right: 10%; top: 50%; transform: translateY(-50%); z-index: 1;">
                </div>
            </div>
        </div>

        <!-- Sección Valores -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="h3 fw-bold text-primary"><i class="fas fa-star me-2"></i> @lang('translations.about.values.title')</h2>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-shield-alt fa-4x text-primary"></i>
                        </div>
                        <h3 class="h5 fw-bold">@lang('translations.about.values.reliability.title')</h3>
                        <p class="card-text text-muted">@lang('translations.about.values.reliability.content')</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-tachometer-alt fa-4x text-primary"></i>
                        </div>
                        <h3 class="h5 fw-bold">@lang('translations.about.values.efficiency.title')</h3>
                        <p class="card-text text-muted">@lang('translations.about.values.efficiency.content')</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-users fa-4x text-primary"></i>
                        </div>
                        <h3 class="h5 fw-bold">@lang('translations.about.values.customer_focus.title')</h3>
                        <p class="card-text text-muted">@lang('translations.about.values.customer_focus.content')</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Servicios -->
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="h3 fw-bold text-primary"><i class="fas fa-truck me-2"></i> @lang('translations.about.services.title')</h2>
            </div>
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-plane text-primary fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h4 class="h6 fw-bold">@lang('translations.about.services.air.title')</h4>
                                        <p class="text-muted mb-0">@lang('translations.about.services.air.content')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-ship text-primary fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h4 class="h6 fw-bold">@lang('translations.about.services.sea.title')</h4>
                                        <p class="text-muted mb-0">@lang('translations.about.services.sea.content')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-truck text-primary fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h4 class="h6 fw-bold">@lang('translations.about.services.land.title')</h4>
                                        <p class="text-muted mb-0">@lang('translations.about.services.land.content')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-boxes text-primary fa-2x me-3"></i>
                                    </div>
                                    <div>
                                        <h4 class="h6 fw-bold">@lang('translations.about.services.warehousing.title')</h4>
                                        <p class="text-muted mb-0">@lang('translations.about.services.warehousing.content')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .divider-custom {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .divider-custom-line {
        width: 100%;
        max-width: 7rem;
        height: 0.25rem;
        background-color: #0d6efd;
        border-radius: 1rem;
        border-color: #0d6efd;
    }
    
    .divider-custom-icon {
        color: #0d6efd;
        font-size: 1.5rem;
        margin: 0 1rem;
    }
    
    .icon-box {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(13, 110, 253, 0.2) 0%, rgba(13, 110, 253, 0.1) 100%);
        border: 2px solid rgba(13, 110, 253, 0.3);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.15);
        transition: all 0.3s ease;
        position: relative;
        z-index: 10;
    }
    
    .icon-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.25);
    }
    
    .icon-box i {
        z-index: 20;
        position: relative;
    }
</style>
@endsection
