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
                                        <input type="checkbox" class="form-check-input" id="email_notifications" name="email_notifications" {{ Auth::user()->preferences['email_notifications'] ?? false ? 'checked' : '' }}>
                                        <label class="form-check-label" for="email_notifications">@lang('translations.myAccount.email_notifications')</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="order_updates" name="order_updates" {{ Auth::user()->preferences['order_updates'] ?? false ? 'checked' : '' }}>
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
                            <div class="row">
                                @foreach($plans as $plan)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 {{ $currentPlan->id === $plan->id ? 'border-primary' : '' }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $plan->name }}</h5>
                                            <p class="card-text">{{ $plan->description }}</p>
                                            <p class="card-text"><strong>@lang('translations.myAccount.price'): {{ $plan->price }}€</strong></p>
                                            
                                            @if($currentPlan->id === $plan->id)
                                                <button class="btn btn-primary" disabled>@lang('translations.myAccount.current_plan')</button>
                                            @else
                                                <form action="{{ route('my-account.plan') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                                    <button type="submit" class="btn btn-outline-primary">@lang('translations.myAccount.change_to_plan')</button>
                                                </form>
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
    border-width: 2px;
}

.card-title {
    color: #007bff;
    font-weight: bold;
}

.btn {
    width: 100%;
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
    background-color: #007bff;
    border-color: #007bff;
}
</style>
@endsection
