@extends('layouts.app')
@section('title', 'login')
@section('content')


<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto overflow-hidden rounded-2xl shadow-lg" style="background: rgb(87, 155, 87);">
        <!-- Left Side: Background Image -->
        <div class="w-full md:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/kld_logo.png') }}'); background-size: 480px auto; margin-top: 2vh; background-repeat: no-repeat;"></div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 bg-white p-6 sm:p-8 bg-opacity-90 backdrop-blur-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800">Welcome Back</h2>
            <p class="text-gray-500 text-center mb-6">Sign in to continue</p>
            
            @if(session()->has('success'))
                <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                    {{ session()->get('error') }}
                </div>
            @endif

            
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
        
                <div class="mb-4 relative">
                    <label class="block text-gray-700">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                    </div>
                    @if($errors->has('email'))
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                
                <div class="mb-4 relative">
                    <label class="block text-gray-700">Password</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password" required>
                    </div>
                    @if($errors->has('password'))
                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                
                
                <div class="flex items-center justify-between mb-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-700">Forgot password?</a>
                </div>
                
                <button type="submit" class="w-full bg-gray-800 text-white p-3 rounded-lg hover:bg-gray-900 transition">Sign In</button>
            </form>
            
            <p class="text-sm text-center text-gray-500 mt-4">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-gray-800 font-semibold hover:underline">Sign up</a>
            </p>
        </div>
    </div>
</body>
@endsection