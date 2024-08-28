<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-gray-100">
   
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:static md:w-64 bg-blue-900 text-white transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-between p-4">
            <h1 class="text-lg font-bold">{{ Auth::user()->name }}</h1>
            <!-- Close Button for Mobile -->
            <button id="close-sidebar" class="text-white md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="p-4">

           <a href="/profile/edit" class="block py-2 px-4 hover:bg-blue-800 rounded">{{ __('Profile') }}</a>

            <a href="/landing" class="block py-2 px-4 hover:bg-blue-800 rounded">Landing</a>
            <a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-blue-800 rounded">Categories</a>
            <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-blue-800 rounded">Products</a>
            <form method="POST" action="{{ route('logout') }}" class="block py-2 px-4">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block hover:bg-blue-800 rounded">
                    {{ __('Log Out') }}
                </a>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Toggle Sidebar Button for Mobile -->
        <button id="open-sidebar" class="text-blue-900 md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        @yield('content')
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('open-sidebar');
        const closeSidebarBtn = document.getElementById('close-sidebar');

        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
</body>
</html>
