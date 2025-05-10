@extends('layouts.errors')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center text-center py-5">
    <img class="img-fluid errors-503-image p-3" src="{{ asset('images/503.svg') }}">
    <p class="errors-503-title">@lang('translations.errors.503.title')</p>
    <p class="errors-503-subtitle">@lang('translations.errors.503.subtitle')</p>
</div>
@endsection