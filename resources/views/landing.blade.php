<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Include AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <style>
        /* Ensure Swiper pagination is correctly positioned */
        .swiper-container {
            position: relative;
        }
        .swiper-pagination {
            bottom: 10px; /* Adjust as needed */
            left: 0;
            width: 100%;
            text-align: center;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-blue-600">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-white">Hesham Store</div>
    
            @if (Route::has('login'))
                <nav>
                    @auth
                    <a style="color:rgb(238, 223, 7);font-size:1.2em" >{{ Auth::user()->name }}</a>
                        @if (Auth::user()->isAdmin()) 
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-200 mx-4">Dashboard</a>
                        @endif
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        this.closest('form').submit();"
                               class="text-white hover:text-gray-200 mx-4">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200 mx-4">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 mx-4">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20" data-aos="fade-up">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4" data-aos="fade-up" data-aos-delay="200">Welcome to Hesham Store</h1>
            <p class="text-xl mb-8" data-aos="fade-up" data-aos-delay="400">Discover amazing Products and a seamless experience.</p>
            {{-- <a href="#cta" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100" data-aos="fade-up" data-aos-delay="600">Get Started</a> --}}
        </div>
    </section>

    <!-- Features Section -->
   <!-- Features Section -->
<section id="features" class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" data-aos="fade-up">Categories</h2>
        <div class="flex flex-wrap -mx-4">
            @foreach($categories as $category)
                <div class="w-full md:w-1/3 px-4 mb-8" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 200 }}">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <div class="text-blue-600 mb-4">
                            <!-- Feature Icon -->
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.656 0 3-1.344 3-3S13.656 2 12 2 9 3.344 9 5s1.344 3 3 3zM12 22c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">{{ $category->name }}</h3>
                        <p class="text-gray-600">{{ $category->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Products Section -->
    <!-- Products Section -->
<section id="products" class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" data-aos="fade-up">Our Products</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($products as $product)
                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 200 }}">
                        <div class="bg-white p-4 rounded-lg shadow-lg transform hover:scale-105 transition-transform max-w-xs mx-auto">
                            <img src="{{ asset('storage/' . $product->photo) }}
                            
                            
                            " alt="{{ $product->name }}" class="w-full h-32 object-cover mb-4 rounded-lg">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4 text-sm">{{ $product->description }}</p>
                            <a href="#" class="text-blue-600 hover:underline text-sm">Learn more</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" data-aos="fade-up">Contact Us</h2>
            <div class="max-w-xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="Your name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Your email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Message</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" placeholder="Your message">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="bg-blue-600 text-white px-8 py-2 rounded hover:bg-blue-700" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    {{-- <section id="cta" class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">Ready to Get Started?</h2>
            <p class="text-xl mb-8" data-aos="fade-up" data-aos-delay="200">Join us today and experience the best features ever.</p>
            <a href="#" class="bg-white text-blue-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100" data-aos="fade-up" data-aos-delay="400">Sign Up Now</a>
        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Heshamstore. All rights reserved.</p>
        </div>
    </footer>

    <!-- Include Swiper's JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Include AOS JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialize Swiper
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 600,
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
            },
        });

        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
        });
    </script>

</body>
</html>
