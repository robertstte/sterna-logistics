<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sterna</title>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script async defer src="{{ config('app.google_url') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        @include('partials.dheader')
        <main class="flex-grow-1">@yield('content')</main>
    </div>
</body>
</html>