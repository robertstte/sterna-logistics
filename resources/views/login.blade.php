@extends('layouts.access')

@section('content')
<div class="row p-5">
    <div class="row ">
        <div class="col-12 col-xl-6 d-none d-xl-flex justify-content-center" style="margin-right: 100px;">
            <img loading="lazy" class="w-100 h-100" src="{{ asset('images/access.svg') }}" alt="@lang('translations.access.login.illustration')">
        </div>
        <div class="col-12 col-xl-4  slide-in d-flex flex-column justify-content-center align-itmes-center access-form" style="height: 555px;" id="page">
            <div class="row">
                <div class="col-9 ">
                    <p class="access-form-title">@lang('translations.access.login.title')</p>
                </div>
                <div class="col-3">
                    <a href="/"><img loading="lazy" class="access-form-back" src="{{ asset('icons/back.svg') }}" alt="@lang('translations.access.login.back')"></a>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <input class="access-form-email @error('email') is-invalid @enderror" 
                       type="email" 
                       placeholder="@lang('translations.access.login.email')" 
                       name="email" 
                       value="{{ old('email') }}"
                       required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="position-relative">
                    <input id="login-password" 
                           class="access-form-password @error('password') is-invalid @enderror" 
                           type="password" 
                           placeholder="@lang('translations.access.login.password')" 
                           name="password" 
                           required>
                    <img id="login-toggle-password" onclick="showFormPassword()" class="position-absolute access-form-eye" data-eye="{{ asset('icons/eye.svg') }}" data-eye-off="{{ asset('icons/eye-off.svg') }}" src="{{ asset('icons/eye.svg') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6 access-form-remember d-flex">
                        <input class="access-form-remember-checkbox" type="checkbox" name="remember">
                        <span>@lang('translations.access.login.remember')</span>
                    </div>
                    <div class="col-6">
                        <span class="access-form-recovery">@lang('translations.access.login.recovery')</span>
                    </div>
                </div>
                <p class="form-error">Faltan campos por completar</p>
                <div class="row mb-3">
                    <div class="col-10">
                        <input class="access-form-submit" type="submit" value="@lang('translations.access.login.signin')">
                    </div>
                    <div class="col-2">
                        <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                    </div>
                </div>
                <div class="row">
                    <a href="{{ route('register') }}" class="access-form-signup">@lang('translations.access.login.signup')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        document.querySelector('.form-error').style.visibility = 'hidden';

        var email = document.querySelector('input[name="email"]').value;
        var password = document.querySelector('input[name="password"]').value;

        if (!email || !password) {
            event.preventDefault();
            document.querySelector('.form-error').style.visibility = 'visible';
        }
    });


    document.addEventListener('DOMContentLoaded', () => {
    const loginLink = document.querySelector('a[href="login"]');

    if (loginLink) {
        loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            const page = document.getElementById('page');
            page.classList.remove('slide-in');
            page.classList.add('slide-out-right');

            setTimeout(() => {
                window.location.href = this.getAttribute('href');
            }, 400); 
        });
    }

    showStep(currentStep);
});

</script>
<style>
.form-error {
    color: red;
    visibility: hidden;
    margin-top: 4px;
    margin-bottom: 0px;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    color: #dc3545;
    font-weight: 400;
}

.is-invalid {
    border-color: #dc3545 !important;
    background-image: none !important;
}

.is-invalid:focus {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
}

.slide-in {
    animation: slideIn 0.4s ease-in;
}

.slide-out-right {
    animation: slideOutLeft 0.4s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideOutLeft {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(-100px);
    }
}

</style>