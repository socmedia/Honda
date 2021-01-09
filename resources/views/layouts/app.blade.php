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
            <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <ul class="flex flex-wrap">
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                    <li class="md:w-1/4 lg:w-1/6 xl:w-1/6 px-3 mb-3">
                        <x-anchor>
                            @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                            Dashboard
                        </x-anchor>
                    </li>
                </ul>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="flex flex-wrap overflow-hidden">

                <div class="w-1/4 overflow-hidden sm:w-full md:w-1/4 lg:w-1/6 xl:w-1/6 hidden md:block">

                    <ul class="py-12 mx-auto sm:px-6 lg:px-6">
                        <li class="mb-3">
                            <x-anchor>
                                @slot('icon')<i class='bx bxs-dashboard mx-2'></i>@endslot
                                Dashboard
                            </x-anchor>
                        </li>
                        <li class="mb-3">
                            <x-anchor>
                                @slot('icon')<i class='bx mx-2 bxs-donate-heart'></i>@endslot
                                Produk
                            </x-anchor>
                        </li>
                        <li class="mb-3">
                            <x-anchor>
                                @slot('icon')<i class='bx bx-images mx-2'></i>@endslot
                                Atur Banner
                            </x-anchor>
                        </li>
                        <li class="mb-3">
                            <x-anchor>
                                @slot('icon')<i class='bx bxs-news mx-2'></i>@endslot
                                Berita
                            </x-anchor>
                        </li>
                    </ul>

                </div>

                <div class="w-full overflow-hidden sm:w-full md:w-full lg:w-5/6 xl:w-5/6">
                    {{ $slot }}
                </div>

            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
