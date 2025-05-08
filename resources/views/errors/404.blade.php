@extends('layouts.access')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center py-5">
    <img class="img-fluid errors-404-image p-3" src="{{ asset('images/404.svg') }}">
    <p class="errors-404-title">@lang('translations.errors.404.title')</p>
    <p class="errors-404-subtitle">@lang('translations.errors.404.subtitle')</p>
</div>
@endsection