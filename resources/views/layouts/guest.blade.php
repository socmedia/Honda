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
        <img src="{{asset('images/honda_jateng_gunungan.svg')}}" alt="Honda Jateng Logo">
        <img src="{{asset('images/honda_jateng.svg')}}" alt="Honda Jateng">
    </header>

    <nav class="navigation">
        <ul class="menus">
            <li class="menu">
                <a href="">
                    <span class="honda__icon-home"></span>
                    Home
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-gunungan"></span>
                    Honda Jateng
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-product"></span>
                    Produk
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-service"></span>
                    Layanan & Suku Cadang
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-news"></span>
                    Berita
                    <i data-feather="chevron-down"></i>
                </a>
            </li>
            <li class="menu">
                <a href="">
                    <span class="honda__icon-community"></span>
                    Komunitas
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
        <img src="{{asset('images/honda_jateng_gunungan.svg')}}" alt="Honda Jateng Logo">
    </footer>
</body>

</html>
