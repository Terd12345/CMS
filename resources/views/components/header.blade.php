<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100">

    <!-- Screen Loader -->
    <div id="screen-loader" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-white z-50">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <header id="navbar" class="sticky top-0 bg-gradient-to-r from-emerald-950 to-green-600 text-white p-4 w-full z-50 transition-all duration-500 ease-in-out">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-2xl font-semibold">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('landing') }}" class="hover:text-gray-200 transition">
                        <img src="{{ asset('images/kld_logo.png') }}" height="130px" width="130px" alt="KLD Logo">
                    </a>
                    <a href="{{ route('landing') }}" class="hover:text-gray-200 transition text-xxl font-semibold relative group">Kolehiyo ng Lungsod ng Dasmarinas
                        <span class="absolute left-0 bottom-0 w-0 h-1 bg-white group-hover:w-full transition-all duration-300"></span>
                    
                </div>
                
            </div>
            
            <!-- Navigation -->
            <nav class="space-x-6 text-lg desktop-menu" id='navbar-links'>
                <a href="{{ route('landing') }}" id="home" class="hover:text-gray-200 transition relative group {{ request()->routeIs('landing') ? 'text-gray-200' : '' }}">
                    Home
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-white group-hover:w-full transition-all duration-300 {{ request()->routeIs('landing') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('about') }}" id="about" class="hover:text-gray-200 transition relative group {{ request()->routeIs('about') ? 'text-gray-200' : '' }}">
                    About
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-white group-hover:w-full transition-all duration-300 {{ request()->routeIs('about') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('news') }}" id="news" class="hover:text-gray-200 transition relative group {{ request()->routeIs('news') ? 'text-gray-200' : '' }}">
                    News
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-white group-hover:w-full transition-all duration-300 {{ request()->routeIs('news') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('contact') }}" id="contact" class="hover:text-gray-200 transition relative group {{ request()->routeIs('contact') ? 'text-gray-200' : '' }}">
                    Contact
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-white group-hover:w-full transition-all duration-300 {{ request()->routeIs('contact') ? 'w-full' : '' }}"></span>
                </a>
            </nav>
    

            <!-- Mobile Menu Button -->
            <div class="mobile-menu">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
    
            <!-- Button -->
            <div class="desktop-menu">
                <a href="{{ route('login') }}" class="bg-white text-green-600 py-2 px-2 rounded-lg hover:bg-gray-200 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-white text-green-600 py-2 px-2 rounded-lg hover:bg-gray-200 transition">Register</a>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="hidden flex-col space-y-4 mt-4 text-lg text-center">
            <a href="{{ route('landing') }}" id="home" class="hover:text-gray-200 transition {{ request()->routeIs('landing') ? 'text-gray-200' : '' }}">Home</a>
            <a href="{{ route('about') }}" id="about" class="hover:text-gray-200 transition {{ request()->routeIs('about') ? 'text-gray-200' : '' }}">About</a>
            <a href="{{ route('news') }}" id="services" class="hover:text-gray-200 transition {{ request()->routeIs('news') ? 'text-gray-200' : '' }}">News</a>
            <a href="{{ route('contact') }}" id="contact" class="hover:text-gray-200 transition {{ request()->routeIs('contact') ? 'text-gray-200' : '' }}">Contact</a>
            <a href="{{ route('login') }}" class="bg-white text-green-600 py-2 px-2 rounded-lg hover:bg-gray-200 transition">Login</a>
            <a href="{{ route('register') }}" class="bg-white text-green-600 py-2 px-2 rounded-lg hover:bg-gray-200 transition">Register</a>
        </nav>
        
    </header>

    <script>
        // Hide loader when the page is fully loaded
        window.addEventListener('load', () => {
            const loader = document.getElementById('screen-loader');
            loader.classList.add('hidden');
        });
    </script>

</body>
</html>