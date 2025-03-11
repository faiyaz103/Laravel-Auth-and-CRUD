
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <button id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-none focus:ring-inset">
            <span class="sr-only">Open main menu</span>
            <svg id="menu-open" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="menu-close" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/items" :active="request()->is('items')">Items</x-nav-link>
            </div>
            </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
    
            {{-- If user is authenticated then only the profile menu will be shown --}}
            @auth
            <div class="relative ml-3">
            <button id="profile-button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none">
                <span class="sr-only">Open user menu</span>
                <img class="size-8 rounded-full" src="https://via.placeholder.com/150" alt="">
            </button>
            <div id="profile-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none">
                <a href='/profile' class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
    
                {{-- Show settings only if user role is admin --}}
                @if(auth()->user()->role == 'admin')
                    <a href='/admin/dashboard' class="block px-4 py-2 text-sm text-gray-700">Admin Dashboard</a>
                @elseif(auth()->user()->role == 'editor')
                <a href='/editor/dashboard' class="block px-4 py-2 text-sm text-gray-700">Editor Dashboard</a>
                @endif
    
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700">Sign out</button>
                </form>
            </div>
            </div>
            {{-- If user is not authenticated then login, register button will be shown --}}
            @else
            <a href="{{ route('login') }}" class="text-white px-4 py-2">Login</a>
            <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Register</a>
            @endauth
    
            
        </div>
        </div>
    </div>
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/items" :active="request()->is('items')">Items</x-nav-link>
        </div>
    </div>
    </nav>
    