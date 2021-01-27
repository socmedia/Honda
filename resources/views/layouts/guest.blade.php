<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/honda.css') }}">
</head>

<body>
    <header class="header">
        <div class="container centered h-100">
            <span class="heading_text honda__icon-jateng_gunungan text-white"></span>
            <span class="heading_text honda__icon-jateng text-white"></span>
        </div>
    </header>

    <x-navbar />

    <main class="p-0">
        {{ $slot }}
    </main>

    <a class="float__wa" href="http://" target="_blank" rel="noopener noreferrer">
        <i class='bx bxl-whatsapp'></i>
    </a>

    <x-search-modal />

    <x-footer />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>