<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sterna</title>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" id="logo">Sterna.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link">@lang('translations.header.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">@lang('translations.header.about')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">@lang('translations.header.contact')</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center mx-auto">
                                <img src="{{ asset('icons/language.svg') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" alt="@lang('translations.header.language')">
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item mx-auto" href="language/es">
                                            <img src="{{ asset('icons/es.svg') }}" alt="@lang('translations.header.spanish')">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item mx-auto" href="language/en">
                                            <img src="{{ asset('icons/en.svg') }}" alt="@lang('translations.header.english')">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link access btn">@lang('translations.header.access')</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>