<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
    
    <div class="sidebar">

        <h1 style="color:rgb(238, 223, 7)" >{{ Auth::user()->name }}</h1>

     
        <a href="/landing">Landing</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('products.index') }}">Products</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            
        </form>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
