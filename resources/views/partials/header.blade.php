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
                        <a class="nav-link" href="/">@lang('translations.header.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route ('about') }}">@lang('translations.header.about')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('contact') }}" >@lang('translations.header.contact')</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-center mx-auto">
                            <img src="{{ asset('icons/language.svg') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" alt="@lang('translations.header.language')">
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item mx-auto" href="{{ route('language.change', 'es') }}">
                                        <img src="{{ asset('icons/es.svg') }}" alt="@lang('translations.header.spanish')">
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item mx-auto" href="{{ route('language.change', 'en') }}">
                                        <img src="{{ asset('icons/en.svg') }}" alt="@lang('translations.header.english')">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        @auth
                        <a class="nav-link access btn" href="{{ route('orders.index') }}">@lang('translations.header.panel')</a>
                    @else
                        <a class="nav-link access btn" href="login">@lang('translations.header.access')</a>
                    @endauth                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>