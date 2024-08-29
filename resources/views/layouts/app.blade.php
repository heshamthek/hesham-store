<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body   >
<nav class="flex items-center justify-between flex-wrap bg-gray-500 p-1.5">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <span class="font-semibold text-xl tracking-tight">Hesham store </span>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      <a href="/landing" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
      Landing
      </a>
    </div>
    <div>
    <form method="POST" action="{{ route('logout') }}" class="block py-2 px-4">
    @csrf
      <a href="{{ route('logout') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">{{ __('Log Out') }}</a>
      </form>
    </div>
  </div>
</nav>

<div class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:static md:w-64 bg-gray-500 text-white transition-transform duration-300 ease-in-out">
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
            <a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-blue-800 rounded">Categories</a>
            <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-blue-800 rounded">Products</a>
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
