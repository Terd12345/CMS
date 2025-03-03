<body class="bg-gray-100" data-active="<?php echo basename($_SERVER['PHP_SELF']); ?>">

    <!-- Screen Loader -->
    <div id="loader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
        <div class="loader"></div>
    </div>

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gray-900 text-white p-5 space-y-6 hidden md:flex flex-col justify-between transition-transform duration-300 ease-in-out">
            <div>
                <h2 class="text-2xl font-semibold mt-5">KLD ADMIN</h2><br>
                <nav>
                    <a href="{{ route('home') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home mr-3"></i>Dashboard
                    </a>
                    <a href="{{ route('admin.users') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-users mr-3"></i>Users
                    </a>
                    <a href="{{ route('admin.adminList') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ request()->routeIs('admin.adminList') ? 'active' : '' }}">
                        <i class="fas fa-cog mr-3"></i>Admins
                    </a>
                    <a href="{{ route('admin.createAdmin') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ request()->routeIs('admin.createAdmin') ? 'active' : '' }}">
                        <i class="fa-solid fa-unlock mr-3"></i>Create Admin
                    </a>
                    
                    <!-- Media Dropdown -->
                    <div class="relative">
                        <button id="media-toggle" class="nav-link w-full flex justify-between items-center px-2 py-2 rounded hover:bg-gray-700 transition duration-300">
                            <span><i class="fas fa-photo-video mr-3"></i>Media</span>
                            <i id="chevron-icon" class="fas fa-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="media-menu" class="hidden overflow-hidden max-h-0 transition-all duration-300 ease-in-out space-y-2 pl-6">
                            <a href="{{ route('admin.Postnews') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ Request::is('admin/Postnews') ? 'active' : '' }}">
                                📰 Post News
                            </a>
                            <a href="{{ route('admin.managePost') }}" class="nav-link block py-2 px-2 rounded transition-all duration-300 hover:bg-gray-700 {{ request()->routeIs('admin.managePost') ? 'active' : '' }}">
                                🗃️ Manage News 
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div>
                <p class="text-sm text-gray-400">© 2025 KLD Admin</p>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-700">☰</button>
                <h1 class="text-xl font-semibold">Dashboard</h1>
                
                <div class="relative">
                    <button id="profile-toggle" class="focus:outline-none z-50 flex items-center space-x-2">
                        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('storage/profiles/default-profile.png') }}" 
                             alt="Profile Picture" 
                             class="w-8 h-8 rounded-full object-cover">
                        <span>{{ Auth::user()->name }}</span>
                    </button>
                    <div id="profile-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden z-50">
                        {{-- <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200"><i class="fas fa-user-circle mr-2"></i>My Profile</a> --}}
                        <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 w-full text-left"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 overflow-y-auto">
                @yield('dashboard-content')
            </main>
            
        </div>
    </div>

</body>
