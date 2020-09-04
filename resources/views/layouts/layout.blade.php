<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <script src="{{ mix('js/bootstrap.js') }}" type="text/javascript"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="{{'//fonts.gstatic.com'}}">
        <link href="{{'https://fonts.googleapis.com/css?family=Nunito'}}" rel="stylesheet">

        {{-- font-awesome --}}
        <link rel="stylesheet" href="{{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'}}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <header class="sticky-top">
                @include('layouts.nav')
                {{-- @include('partial.sessionStatus') --}}
            </header>

            <main class="py-4">
                @yield('content')
            </main>

            <footer class="bg-white text-center text-black-50 py-3 shadow">
                @include('partial.web.footer')
                {{config('app.name')}} | Copyright @ {{date('Y') }} | By: Andrés David SV
            </footer>
        </div>
    </body>
</html>
