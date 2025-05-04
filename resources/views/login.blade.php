@extends('layouts.access')

@section('content')
<div class="row">
    <div class="row p-5">
        <div class="col-12 col-xl-6 d-none d-xl-flex justify-content-center">
            <img loading="lazy" class="w-100 h-100" src="{{ asset('images/access.svg') }}" alt="@lang('translations.access.login.illustration')">
        </div>
        <div class="col-12 col-xl-6 d-flex flex-column justify-content-center align-itmes-center access-form">
            <div class="row">
                <div class="col-6">
                    <p class="access-form-title">@lang('translations.access.login.title')</p>
                </div>
                <div class="col-6">
                    <a href="/"><img loading="lazy" class="access-form-back" src="{{ asset('icons/back.svg') }}" alt="@lang('translations.access.login.back')"></a>
                </div>
            </div>
            <form>
                <input class="access-form-email" type="email" placeholder="@lang('translations.access.login.email')" name="email" required>
                <div class="position-relative">
                    <input id="login-password" class="access-form-password" type="password" placeholder="@lang('translations.access.login.password')" name="password" required>
                    <img id="login-toggle-password" onclick="showFormPassword()" class="position-absolute access-form-eye" data-eye="{{ asset('icons/eye.svg') }}" data-eye-off="{{ asset('icons/eye-off.svg') }}" src="{{ asset('icons/eye.svg') }}">
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
                <div class="row">
                    <div class="col-10">
                        <input class="access-form-submit" type="submit" value="@lang('translations.access.login.signin')">
                    </div>
                    <div class="col-2">
                        <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                    </div>
                </div>
                <div class="row">
                    <a href="register" class="access-form-signup">@lang('translations.access.login.signup')</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection