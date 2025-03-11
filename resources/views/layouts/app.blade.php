<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/js/app.js']) --}}
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased">
        @include('components.navbar')
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
                document.getElementById('menu-open').classList.toggle('hidden');
                document.getElementById('menu-close').classList.toggle('hidden');
            });
    
            document.getElementById('profile-button')?.addEventListener('click', function() {
                document.getElementById('profile-menu').classList.toggle('hidden');
            });
    
            window.addEventListener('click', function(e) {
                if (!document.getElementById('profile-button')?.contains(e.target) && !document.getElementById('profile-menu')?.contains(e.target)) {
                    document.getElementById('profile-menu')?.classList.add('hidden');
                }
            });
        </script>
    </body>
</html>
