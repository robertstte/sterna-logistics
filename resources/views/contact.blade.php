@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <!-- Encabezado de la página -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">@lang('translations.contact.title')</h1>
                <div class="d-flex justify-content-center">
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-envelope"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                </div>
                <p class="lead text-muted">@lang('translations.contact.subtitle')</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Información de contacto -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-4 text-primary"><i class="fas fa-info-circle me-2"></i> @lang('translations.contact.info.title')</h2>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h3 class="h6 fw-bold">@lang('translations.contact.info.address.title')</h3>
                                <p class="text-muted mb-0">@lang('translations.contact.info.address.content')</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h3 class="h6 fw-bold">@lang('translations.contact.info.phone.title')</h3>
                                <p class="text-muted mb-0">@lang('translations.contact.info.phone.content')</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h3 class="h6 fw-bold">@lang('translations.contact.info.email.title')</h3>
                                <p class="text-muted mb-0">@lang('translations.contact.info.email.content')</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                            </div>
                            <div class="ms-3">
                                <h3 class="h6 fw-bold">@lang('translations.contact.info.hours.title')</h3>
                                <p class="text-muted mb-0">@lang('translations.contact.info.hours.content')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de contacto -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-paper-plane text-white"></i>
                            </div>
                            <h2 class="h4 fw-bold text-primary mb-0">@lang('translations.contact.form.title')</h2>
                        </div>
                        
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang('translations.contact.name')" required>
                                        <label for="name">@lang('translations.contact.name')</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="@lang('translations.contact.email')" required>
                                        <label for="email">@lang('translations.contact.email')</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="@lang('translations.contact.form.subject')">
                                        <label for="subject">@lang('translations.contact.form.subject')</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" name="message" placeholder="@lang('translations.contact.message')" style="height: 150px" required></textarea>
                                        <label for="message">@lang('translations.contact.message')</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                                        <i class="fas fa-paper-plane me-2"></i> @lang('translations.contact.send')
                                    </button>
                                </div>
                            </div>
                        </form>
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
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>
@endsection
