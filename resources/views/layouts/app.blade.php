<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sterna</title>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if(request()->is('/'))
        <div class="hero-background">
    @endif
            <div class="d-flex flex-column min-vh-100">
                @include('partials.header')
                <main class="flex-grow-1">@yield('content')</main>
                @include('partials.footer')
            </div>
    @if(request()->is('/'))
        </div>
    @endif
</body>
</html>
