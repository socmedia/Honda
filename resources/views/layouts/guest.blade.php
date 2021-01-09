<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/honda.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <header class="header">
        <span class="heading_text honda__icon-jateng_gunungan text-white"></span>
        <span class="heading_text honda__icon-jateng text-white"></span>
    </header>

    <nav class="navigation">
        <ul class="menus">
            <li class="menu">
                <a href="">
                    <span class="honda__icon-home"></span>
                    <span class="text">Home</span>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-gunungan"></span>
                    <span class="text">Honda Jateng</span>
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-product"></span>
                    <span class="text">Produk</span>
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-service"></span>
                    <span class="text">Layanan & Suku Cadang</span>
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-news"></span>
                    <span class="text">Berita</span>
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-community"></span>
                    <span class="text">Komunitas</span>
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <i class="bx-bxs-search"></i>
            </li>
        </ul>
    </nav>

    <div class="text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <footer class="footer">
        <div class="flex flex-wrap">
            <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                <span class="honda__icon-jateng_gunungan text-white"></span>
            </div>
            <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                <span class="honda__icon-jateng_gunungan text-white"></span>
            </div>
            <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                <span class="honda__icon-jateng_gunungan text-white"></span>
            </div>
            <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                <span class="honda__icon-jateng_gunungan text-white"></span>
            </div>
        </div>
    </footer>
</body>

</html>