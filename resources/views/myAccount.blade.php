@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('translations.myAccount.title')</h5>
                    <div class="list-group">
                        <a href="#profile" class="list-group-item list-group-item-action active" data-bs-toggle="list">@lang('translations.myAccount.profile')</a>
                        <a href="#password" class="list-group-item list-group-item-action" data-bs-toggle="list">@lang('translations.myAccount.password')</a>
                        <a href="#preferences" class="list-group-item list-group-item-action" data-bs-toggle="list">@lang('translations.myAccount.preferences')</a>
                        <a href="#plans" class="list-group-item list-group-item-action" data-bs-toggle="list">@lang('translations.myAccount.plans')</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <!-- Perfil -->
                <div class="tab-pane fade show active" id="profile">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">@lang('translations.myAccount.personal_info')</h5>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('my-account.profile') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('translations.myAccount.name')</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->customer->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">@lang('translations.myAccount.email')</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">@lang('translations.myAccount.phone')</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->customer->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">@lang('translations.myAccount.address')</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->customer->address }}">
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('translations.myAccount.update_profile')</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="tab-pane fade" id="password">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">@lang('translations.myAccount.change_password')</h5>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('my-account.password') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="mb-3 position-relative">
                                        <label for="current_password" class="form-label">@lang('translations.myAccount.current_password')</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        <img onclick="togglePasswordVisibility('current_password', this)" class="position-absolute access-form-eye eye-lowered" data-eye="{{ asset('icons/eye.svg') }}" data-eye-off="{{ asset('icons/eye-off.svg') }}" src="{{ asset('icons/eye.svg') }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="new_password" class="form-label">@lang('translations.myAccount.new_password')</label>
                                        <input type="password" class="form-control" id="new_password" name="password" required>
                                        <img onclick="togglePasswordVisibility('new_password', this)" class="position-absolute access-form-eye eye-lowered" data-eye="{{ asset('icons/eye.svg') }}" data-eye-off="{{ asset('icons/eye-off.svg') }}" src="{{ asset('icons/eye.svg') }}">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="password_confirmation" class="form-label">@lang('translations.myAccount.confirm_password')</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <img onclick="togglePasswordVisibility('password_confirmation', this)" class="position-absolute access-form-eye eye-lowered" data-eye="{{ asset('icons/eye.svg') }}" data-eye-off="{{ asset('icons/eye-off.svg') }}" src="{{ asset('icons/eye.svg') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('translations.myAccount.change_password_button')</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preferencias -->
                <div class="tab-pane fade" id="preferences">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">@lang('translations.myAccount.preferences')</h5>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('my-account.preferences') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="email_notifications" name="email_notifications" {{ Auth::user()->preferences['email_notifications'] ?? false ? 'checked' : '' }} checked>
                                        <label class="form-check-label" for="email_notifications">@lang('translations.myAccount.email_notifications')</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="order_updates" name="order_updates" {{ Auth::user()->preferences['order_updates'] ?? false ? 'checked' : '' }} checked>
                                        <label class="form-check-label" for="order_updates">@lang('translations.myAccount.order_updates')</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="language" class="form-label">@lang('translations.myAccount.language')</label>
                                    <select class="form-select" id="language" name="language">
                                        <option value="es" {{ (Auth::user()->preferences['language'] ?? 'es') === 'es' ? 'selected' : '' }}>@lang('translations.myAccount.spanish')</option>
                                        <option value="en" {{ (Auth::user()->preferences['language'] ?? 'es') === 'en' ? 'selected' : '' }}>@lang('translations.myAccount.english')</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('translations.myAccount.save_preferences')</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Planes -->
                <div class="tab-pane fade" id="plans">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('translations.myAccount.subscription_plans')</h5>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @php $lang = App::getLocale(); @endphp
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
    {{-- Icono representativo del plan en caja especial si es Free --}}
    @if($currentPlan->id == 1)
        <div class="card border-primary shadow-sm mb-2" style="background: #f8fafc; border-radius: 1rem;">
            <div class="card-body p-3">
                <div class="plan-icon mb-2" style="font-size:3rem;"><i class="fas fa-star"></i></div>
                <h5 class="mt-2 mb-0 text-primary">@if($lang == 'es') Gratuito @else Free @endif</h5>
            </div>
        </div>
    @elseif($currentPlan->id == 2)
        <div class="plan-icon"><i class="fas fa-briefcase"></i></div>
        <h5 class="mt-2">@if($lang == 'es') Pymes @else Pymes @endif</h5>
    @elseif($currentPlan->id == 3)
        <div class="plan-icon"><i class="fas fa-gem"></i></div>
        <h5 class="mt-2">@if($lang == 'es') Grandes Empresas @else Big Business @endif</h5>
    @endif
                </div>
                <div class="col-md-6">
                    <p class="mb-2">
                        @if($lang == 'es')
                            @if($currentPlan->id == 1)
                                Ideal para comenzar y probar la plataforma.
                            @elseif($currentPlan->id == 2)
                                Para profesionales que requieren más descargas y reportes.
                            @elseif($currentPlan->id == 3)
                                Solución completa para empresas con necesidades avanzadas.
                            @endif
                        @else
                            @if($currentPlan->id == 1)
                                Ideal to start and test the platform.
                            @elseif($currentPlan->id == 2)
                                For professionals who need more downloads and reports.
                            @elseif($currentPlan->id == 3)
                                Complete solution for companies with advanced needs.
                            @endif
                        @endif
                    </p>
                    <p class="mb-2"><strong>@lang('translations.plans.price'): {{ $currentPlan->price }}€</strong></p>
                    {{-- Información extra de cada plan --}}
                    @if($currentPlan->id == 1)
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>5/@lang('translations.plans.per_month')</strong></li>
                            <li class="list-group-item">@lang('translations.plans.discount'): <strong>0%</strong></li>
                            <li class="list-group-item"><i class="fas fa-envelope"></i> @lang('translations.plans.basic_support')</li>
                        </ul>
                    @elseif($currentPlan->id == 2)
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>100/@lang('translations.plans.per_month')</strong></li>
                            <li class="list-group-item">@lang('translations.plans.discount'): <strong>3%</strong></li>
                            <li class="list-group-item"><i class="fas fa-chart-line"></i> @lang('translations.plans.reports_priority')</li>
                        </ul>
                    @elseif($currentPlan->id == 3)
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">@lang('translations.plans.download_limit'): <strong>@lang('translations.plans.unlimited')</strong></li>
                            <li class="list-group-item">@lang('translations.plans.discount'): <span style="color: #dc3545;"><s>7%</s></span> <strong>10%</strong> <span class="badge bg-success">@lang('translations.plans.exclusive_promo')</span></li>
                            <li class="list-group-item"><i class="fas fa-headset"></i> @lang('translations.plans.enterprise_services')</li>
                        </ul>
                    @endif
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('plans.show') }}" class="btn btn-outline-primary btn-custom mt-3">
                        @lang('translations.plans.switch_plan')
                    </a>
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
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, eyeIcon) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.src = eyeIcon.dataset.eyeOff;
    } else {
        input.type = 'password';
        eyeIcon.src = eyeIcon.dataset.eye;
    }
}
</script>

<style>
.eye-lowered {
    top: 41px;
    right: 16px;
    width: 22px;
    height: 22px;
    cursor: pointer;
}

.card {
    transition: all 0.3s ease;
    border: 1px solid #ddd;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card.border-primary {
    border-width: 2px solid rgb(0, 31, 63);
}

.card-title {
    color: rgb(0, 31, 63);
    font-weight: bold;
}

.btn {
    width: 100%;
    color: rgb(255, 255, 255);
    background-color: rgb(0, 31, 63);
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
}

.list-group-item.active {
    background-color: rgb(0, 31, 63);
    border-color: #007bff;
}
</style>
@endsection
