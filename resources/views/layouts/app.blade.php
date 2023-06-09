
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Time Sea') }}</title>
        <link rel="icon" type="image/png"  href="/images/watch-logo.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Css -->
        <link rel="stylesheet" href="{{ asset('css/detailview.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
        <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
        <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    
    @include('layouts.footer')
    </body>
</html>
