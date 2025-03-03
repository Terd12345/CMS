<!-- Footer -->
<footer class="bg-gradient-to-r from-green-600 to-green-800 text-white py-6">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
            <!-- Logo and Name -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/kld_logo.png') }}" alt="KLD Logo" class="h-12 w-12">
                <span class="text-lg font-semibold">Kolehiyo ng Lungsod ng Dasmariñas</span>
            </div>

            <!-- Navigation Links -->
            <nav class="flex space-x-6 text-sm">
                <a href="{{ route('landing') }}" class="hover:text-gray-300 transition">Home</a>
                <a href="{{ route('about') }}" class="hover:text-gray-300 transition">About</a>
                <a href="{{ route('news') }}" class="hover:text-gray-300 transition">News</a>
                <a href="{{ route('contact') }}" class="hover:text-gray-300 transition">Contact</a>
            </nav>

            <!-- Social Media Links -->
            <div class="flex space-x-4">
                <a href="#" class="hover:text-gray-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12.07c0-5.522-4.478-10-10-10S2 6.548 2 12.07c0 4.915 3.51 8.974 8.1 9.845v-6.98h-2.43V12.07h2.43v-1.8c0-2.407 1.43-3.73 3.63-3.73 1.05 0 2.14.187 2.14.187v2.38h-1.21c-1.19 0-1.56.743-1.56 1.508v1.74h2.66l-.43 2.865h-2.23v6.98c4.59-.87 8.1-4.93 8.1-9.845z"/></svg>
                </a>
                <a href="#" class="hover:text-gray-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0017.93 3c-2.5 0-4.5 2-4.5 4.5v.5A10.66 10.66 0 013 4.24a4.48 4.48 0 001.38 6A4.47 4.47 0 012 9.67v.05a4.5 4.5 0 003.6 4.4A4.5 4.5 0 012 14v.05a4.5 4.5 0 003.6 4.4 4.5 4.5 0 01-2 .08A4.51 4.51 0 006 20a9 9 0 005 1.45A9 9 0 0023 12v-.5a6.72 6.72 0 001.73-1.88 6.7 6.7 0 01-1.92.53 3.32 3.32 0 001.45-1.82z"/></svg>
                </a>
                <a href="#" class="hover:text-gray-300 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.478 2 12s4.477 10 10 10 10-4.478 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.584-8-8s3.582-8 8-8 8 3.584 8 8-3.582 8-8 8zm2.9-11.1h-1.8v-1.3c0-.5.3-.6.6-.6h1.2V6H13c-1.6 0-2.2 1.2-2.2 2.2v1.7H9v1.8h1.8V18h2.1v-6.3h1.7l.2-1.8z"/></svg>
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-6 text-center text-sm text-gray-300">
            © 2025 Kolehiyo ng Lungsod ng Dasmariñas. All rights reserved.
        </div>
    </div>
</footer>
