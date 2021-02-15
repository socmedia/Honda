<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{asset('css/adm.css')}}" rel="stylesheet" />
    @livewireStyles
    @stack('styles')

    <script src="{{asset('js/adm.js')}}"></script>
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <x-admin.navbar :name="auth()->user()->name" />

        <x-admin.sidebar />

        <div class="page-wrapper">

            @yield('content')

            <x-admin.footer />
        </div>
    </div>

    @livewireScripts
    @stack('scripts')

</body>

</html>
