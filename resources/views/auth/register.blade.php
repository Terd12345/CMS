@extends('layouts.app')
@section('title', 'register')
@section('content')

<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto overflow-hidden rounded-2xl shadow-lg" style="background: rgb(87, 155, 87);">
        <!-- Left Side: Background Image -->
        <div class="w-full md:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/kld_logo.png') }}'); background-size: 480px auto; background-repeat: no-repeat; background-position: center;"></div>

        <!-- Right Side: Registration Form -->
        <div class="w-full md:w-1/2 bg-white p-6 sm:p-8 bg-opacity-90 backdrop-blur-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800">Register</h2>
            <p class="text-gray-500 text-center mb-6">Create your account</p>
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

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <!-- Full Name -->
<div class="mb-4 relative">
    <label class="block text-gray-700">Full Name</label>
    <div class="relative">
        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="text" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="fullName" name="fullName" value="{{ old('fullName') }}" placeholder="Enter your full name">
    </div>
    @if($errors->has('fullName'))
        <span class="text-red-500">{{ $errors->first('fullName') }}</span>
    @endif
</div>

<!-- Email -->
<div class="mb-4 relative">
    <label class="block text-gray-700">Email</label>
    <div class="relative">
        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="email" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
    </div>
    @if($errors->has('email'))
        <span class="text-red-500">{{ $errors->first('email') }}</span>
    @endif
</div>

<!-- Password -->
<div class="mb-4 relative">
    <label class="block text-gray-700">Password</label>
    <div class="relative">
        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="password" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="password" name="password" placeholder="Enter your password">
    </div>
    @if($errors->has('password'))
        <span class="text-red-500">{{ $errors->first('password') }}</span>
    @endif
</div>

<!-- Confirm Password -->
<div class="mb-4 relative">
    <label class="block text-gray-700">Confirm Password</label>
    <div class="relative">
        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="password" class="w-full p-3 pl-10 border rounded-lg focus:ring-2 focus:ring-gray-400 focus:outline-none" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
    </div>
    @if($errors->has('password'))
        <span class="text-red-500">{{ $errors->first('password') }}</span>
    @endif
</div>

                <button type="submit" class="w-full bg-gray-800 text-white p-3 rounded-lg hover:bg-gray-900 transition">Sign Up</button>
            </form>

            <p class="text-sm text-center text-gray-500 mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-gray-800 font-semibold hover:underline">Login</a>
            </p>
        </div>
    </div>
</body>

@endsection