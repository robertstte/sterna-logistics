@extends('layouts.app')

@section('content')
<div class="row p-5">
    <div class="row ">
        <div class="col-12 col-xl-6 d-none d-xl-flex justify-content-center" style="margin-right: 100px; margin-left: 80px;">
            <img loading="lazy" class="w-90 h-90" src="{{ asset('images/recovery.svg') }}" alt="@lang('translations.access.login.illustration')">
        </div>
        <div class="col-12 col-xl-4 mb-0 pb-0 slide-in d-flex flex-column justify-content-center align-itmes-center access-form" style="height: 400px;" id="page">
            <div class="row">
                <div class="col-9">
                    <p class="access-form-title">@lang('translations.access.recovery.title')</p>
                </div>
                <div class="col-3">
                    <a href="login"><img loading="lazy" class="access-form-back" src="{{ asset('icons/back.svg') }}" alt="@lang('translations.access.login.back')"></a>
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <input class="access-form-email mb-5 @error('email') is-invalid @enderror" 
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
                <div class="row mb-3 mt-5">
                    <div class="col-12">
                        <input class="access-form-submit" type="submit" value="@lang('translations.access.recovery.submit')">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection