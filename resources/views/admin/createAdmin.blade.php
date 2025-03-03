@extends('layouts.dashboard')
@section('content')
    @section('dashboard-content')
        {{-- Breadcrumb --}}
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-gray-700">Dashboard</a> / 
            <a href="{{ route('admin.createAdmin') }}" class="hover:text-gray-700">Create Admin</a>
        </p>
        {{-- Main content --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Form Card --}}
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create Admin</h2>

                @if(session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session("success") }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                });
            </script>
        @endif

                <form action="{{ route('admin.storeAdmin') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    {{-- Name Field --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Password Field --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter password"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Password Confirmation Field --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>  
                    {{-- User Profile Field --}}
                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100"
                            onchange="previewImage(event)">
                        @error('profile_picture')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Submit Button --}}
                    <div class="flex justify-center">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-slate-600 hover:bg-neutral-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">
                            Create Admin
                        </button>
                    </div>
                </form>
            </div>
            {{-- Image Preview Card --}}
            <div id="image-preview-card" class="hidden bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                <div id="image-preview" class="text-center">
                    <p class="text-sm font-medium text-gray-700">Image Preview:</p>
                    <img id="preview" class="mt-4 object-cover rounded-lg shadow-md border border-gray-300" height="350px" width="350px" />
                </div>
            </div>
        </div>


<br><br>
    @endsection
@endsection