<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$title}}</title>
</head>
<body>
    <x-navbar/>

    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>
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