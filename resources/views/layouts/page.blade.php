<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Napoli') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-gray-100">
            {{-- @include('layouts.page-navigation') --}}

            <!-- Page Heading -->
            <header class="relative bg-pizza-white">

                @include('layouts.green-line')
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
                @include('layouts.green-line')
            </header>

            <!-- Page Content -->
            <main class="flex-1 bg-food">
                {{ $slot }}
            </main>
            @include('layouts.footer')

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            @yield('inline_js')
        </div>
    </body>
</html>
