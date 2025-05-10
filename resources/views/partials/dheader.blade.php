<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid dheader">
            <a class="navbar-brand navbar-brand-dheader" id="logo">Sterna.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-dheader">@lang('translations.dashboard.dheader.orders')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-dheader">@lang('translations.dashboard.dheader.clients')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-dheader">@lang('translations.dashboard.dheader.invoicing')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link account btn">@lang('translations.dashboard.dheader.account')</a>
                    </li>
                    <li class="nav-item">
                        <img src="{{ asset('icons/logout.svg') }}" class="nav-link" alt="@lang('translations.dashboard.dheader.exit')">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>