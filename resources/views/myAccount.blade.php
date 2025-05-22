@extends('layouts.dashboard')

@section('content')
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            timer: 3000
        });
    </script>
@endif
<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <div class="col-md-3 sidebar bg-light p-4 min-vh-30">
            <div class="sidebar-sticky">
                <h4 class="mb-4">Mi Cuenta</h4>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <button class="nav-link active mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab">
                        <i class="fas fa-user me-2"></i> Mi Perfil
                    </button>
                    <button class="nav-link mb-2" id="v-pills-security-tab" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab">
                        <i class="fas fa-shield-alt me-2"></i> Seguridad
                    </button>
                    <button class="nav-link mb-2" id="v-pills-preferences-tab" data-bs-toggle="pill" data-bs-target="#v-pills-preferences" type="button" role="tab">
                        <i class="fas fa-cog me-2"></i> Preferencias
                    </button>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9 ms-sm-auto px-4 py-3">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Sección Mi Perfil -->
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                    <h2 class="mb-4">Mi Perfil</h2>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('my-account.profile') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', Auth::user()->username) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', Auth::user()->customer->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone', Auth::user()->customer->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Dirección</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                           id="address" name="address" value="{{ old('address', Auth::user()->customer->address) }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-account-settings">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sección Seguridad -->
                <div class="tab-pane fade" id="v-pills-security" role="tabpanel">
                    <h2 class="mb-4">Seguridad</h2>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('my-account.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Contraseña actual</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                           id="current_password" name="current_password" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nueva contraseña</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-account-settings">Actualizar contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sección Preferencias -->
                <div class="tab-pane fade" id="v-pills-preferences" role="tabpanel">
                    <h2 class="mb-4">Preferencias</h2>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('my-account.preferences') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <h5>Notificaciones</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="email_notifications" 
                                               name="email_notifications" value="1" 
                                               {{ old('email_notifications', Auth::user()->preferences['email_notifications'] ?? '') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="email_notifications">
                                            Recibir notificaciones por correo electrónico
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="order_updates" 
                                               name="order_updates" value="1"
                                               {{ old('order_updates', Auth::user()->preferences['order_updates'] ?? '') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="order_updates">
                                            Actualizaciones de pedidos
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h5>Idioma</h5>
                                    <div class="mb-3">
                                        <select class="form-select @error('language') is-invalid @enderror" 
                                                id="language" name="language">
                                            <option value="es" {{ (old('language', Auth::user()->preferences['language'] ?? '') == 'es') ? 'selected' : '' }}>Español</option>
                                            <option value="en" {{ (old('language', Auth::user()->preferences['language'] ?? '') == 'en') ? 'selected' : '' }}>English</option>
                                        </select>
                                        @error('language')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-account-settings">Guardar preferencias</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar los tabs de Bootstrap
    var triggerTabList = [].slice.call(document.querySelectorAll('[data-bs-toggle="pill"]'));
    triggerTabList.forEach(function(triggerEl) {
        new bootstrap.Tab(triggerEl);
    });
});
</script>
@endpush
@endsection
