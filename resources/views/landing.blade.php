@extends('layouts.app')

@section('content')
@if(session('error'))
<script>
    // Ejecutar inmediatamente para asegurar que se muestre
    window.onload = function() {
        Swal.fire({
            icon: 'error',
            title: 'Pedido no encontrado',
            text: "{{ session('error') }}",
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'Entendido'
        });
    };
</script>
@endif
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
        <form id="search-order-form" class="localization-form" autocomplete="off">
            @csrf  
            <input class="localization-form-text" type="text" name="order_id" id="order_id" placeholder="Nº 202503290000000001" maxlength="18" required autocomplete="off">
            <button type="submit" class="localization-form-submit btn">@lang('translations.landing.localization.search')</button>
            <hr>
            <p class="localization-help">@lang('translations.landing.localization.help')</p>
        </form>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Evitar el autofill del navegador
                const input = document.getElementById('order_id');
                
                // Guardar el valor actual
                const currentValue = input.value;
                
                // Cambiar a password y luego de vuelta a texto
                input.setAttribute('type', 'password');
                setTimeout(function() {
                    input.setAttribute('type', 'text');
                    input.value = currentValue;
                }, 1);
                
                // Limpiar el fondo del input cuando recibe el foco
                input.addEventListener('focus', function() {
                    this.style.backgroundColor = 'rgb(0, 31, 63)';
                    this.style.color = 'rgb(255, 255, 255)';
                });
                
                // También limpiar el fondo cuando se escribe
                input.addEventListener('input', function() {
                    this.style.backgroundColor = 'rgb(0, 31, 63)';
                    this.style.color = 'rgb(255, 255, 255)';
                });
                
                // Manejar el envío del formulario
                const form = document.getElementById('search-order-form');
                
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const orderId = document.getElementById('order_id').value;
                    
                    // Validar que el ID del pedido tenga 18 caracteres
                    if (orderId.length !== 18) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'El número de pedido debe tener 18 caracteres.',
                            confirmButtonColor: '#0d6efd'
                        });
                        return;
                    }
                    
                    // Realizar la petición AJAX
                    fetch(`{{ route('my-order') }}?order_id=${orderId}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Redirigir a la página de detalles del pedido
                            window.location.href = data.redirect;
                        } else {
                            // Mostrar mensaje de error con SweetAlert2
                            Swal.fire({
                                icon: 'error',
                                title: 'Pedido no encontrado',
                                text: data.message,
                                confirmButtonColor: '#0d6efd',
                                confirmButtonText: 'Entendido'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ha ocurrido un error al buscar el pedido. Por favor, inténtelo de nuevo más tarde.',
                            confirmButtonColor: '#0d6efd'
                        });
                    });
                });
            });
        </script>

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