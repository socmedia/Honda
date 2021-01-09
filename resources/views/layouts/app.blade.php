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

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">

        @livewire('navigation-menu')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="flex flex-wrap overflow-hidden">

                <div class="py-12 w-1/4 overflow-hidden sm:w-full md:w-1/4 lg:w-1/6 xl:w-1/6 ">

                    <ul>
                        <li>
                            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-jet-nav-link>
                        </li>
                        <li>
                            <x-anchor>
                                @slot('icon')
                                <i class="w-4" data-feather="file"></i>
                                @endslot
                                Produk
                            </x-anchor>
                        </li>
                        <li>
                            <x-anchor>Atur Banner</x-anchor>
                        </li>
                        <li>
                            <x-anchor>Berita</x-anchor>
                        </li>
                    </ul>

                </div>

                <div class="w-3/4 overflow-hidden sm:w-full md:w-3/4 lg:w-5/6 xl:w-5/6">
                    {{ $slot }}
                </div>

            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
