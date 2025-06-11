<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="row" style="margin-top: 20px;">

            </div>
            <div class="col-12 col-md-4 text-center text-md-start">
                <p class="mb-0">@lang('translations.footer.copyright')</p>
            </div>
            <div class="col-12 col-md-4">
                <ul class="nav justify-content-center list-unstyled d-flex">
                    <li class="ms-3">
                        <a href="mailto:info@sterna.com" class="text-decoration-none">
                            <img src="{{ asset('images/mail.svg') }}" alt="@Lang('translations.footer.mail')" width="24" height="24">
                        </a>
                    </li>
                    <br>  
                    <li class="ms-3">
                        <a href="{{ route('contact') }}" class="text-decoration-none">
                            <span style="color: white;">@lang('translations.contact.title')</span>
                        </a>
                    </li>
                    <li class="ms-3">
                        
                    
                        <div class="dropdown-center">
                            <img src="{{ asset('images/language.svg') }}" class="dropdown-toggle" data-bs-toggle="dropdown" 
                            alt="@lang('translations.header.language')" width="24" height="24" style="filter: brightness(100);">
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item mx-auto" href="{{ route('language.change', 'es') }}">
                                        <img src="{{ asset('images/es.svg') }}" alt="@lang('translations.header.spanish')">
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item mx-auto" href="{{ route('language.change', 'en') }}">
                                        <img src="{{ asset('images/en.svg') }}" alt="@lang('translations.header.english')">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-4 text-center text-md-end">
                <p class="mb-0">@lang('translations.footer.privacy')</p>
            </div>
        </div>
    </div>
</footer>