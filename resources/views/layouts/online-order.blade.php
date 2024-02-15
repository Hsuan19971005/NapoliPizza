
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Napoli披薩.炸雞 線上預訂餐點</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-pizza-white">
            <!-- Page Heading -->
            <header class="shadow bg-pizza-green">
                {{ $header }}
            </header>

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            @include('layouts.footer')

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            @yield('inline_js')
        </div>
    </body>
</html>
