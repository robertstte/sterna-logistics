@extends('layouts.access')

@section('content')
<div class="row p-5">
    <div class="row">
        <div class="col-12 col-xl-6 d-none d-xl-flex justify-content-center">
            <img loading="lazy" class="w-100 h-100" src="{{ asset('images/access.svg') }}" alt="@lang('translations.access.register.illustration')">
        </div>
        <div class="col-12 col-xl-6 d-flex flex-column justify-content-center align-itmes-center access-form">
            <div class="row">
                <div class="col-6">
                    <p class="access-form-title">@lang('translations.access.register.title')</p>
                </div>
                <div class="col-6">
                    <a href="login"><img loading="lazy" class="access-form-back" src="{{ asset('icons/back.svg') }}" alt="@lang('translations.access.register.back')"></a>
                </div>
            </div>
            <form>
                <div class="step" id="step-content1">
                    <input class="access-form-name" type="text" placeholder="@lang('translations.access.register.name')" name="name" required>
                    <input class="access-form-register-email" type="email" placeholder="@lang('translations.access.register.email')" name="email" required>
                    <div class="row w-100">
                        <div class="col-6 d-flex justify-content-start access-form-customer-type">
                            <input class="access-form-customer-type-radio" type="radio" name="customerType">
                            <span>@lang('translations.access.register.individual')</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end access-form-customer-type">
                            <input class="access-form-customer-type-radio" type="radio" name="customerType">
                            <span>@lang('translations.access.register.company')</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(1)" class="access-form-submit">@lang('translations.access.register.next')</button>
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="step step-hidden" id="step-content2">
                    <input class="access-form-address" type="text" placeholder="@lang('translations.access.register.address')" name="address" required>
                    <input class="access-form-phone" type="tel" placeholder="@lang('translations.access.register.phone')" name="phone" required>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(2)" class="access-form-submit">@lang('translations.access.register.next')</button>
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="step step-hidden" id="step-content3">
                    <input class="access-form-username" type="text" placeholder="@lang('translations.access.register.username')" name="username" required>
                    <input class="access-form-password" type="password" placeholder="@lang('translations.access.register.password')" name="password" required>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(3)" class="access-form-submit">@lang('translations.access.register.next')</button>                        
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="step step-hidden" id="step-content4">
                    <select class="access-form-select">
                        <option>España</option>
                        <option>Portugal</option>
                    </select>
                    <div class="row">
                        <div class="col-10">
                            <input class="access-form-submit" type="submit" value="@lang('translations.access.register.title')">
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="row d-flex form-step-container">
                    <div class="col-3"><hr class="form-step-active" id="step1"></div>
                    <div class="col-3"><hr class="form-step" id="step2"></div>
                    <div class="col-3"><hr class="form-step" id="step3"></div>
                    <div class="col-3"><hr class="form-step" id="step4"></div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection