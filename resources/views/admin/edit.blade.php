@extends('layouts.dashboard')

@section('content')
    @section('dashboard-content')
        <!-- Breadcrumb -->
        <nav class="text-gray-500 mb-6 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-gray-700 transition duration-200">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.adminList') }}" class="hover:text-gray-700 transition duration-200">Profile</a>
            <span>/</span>
            <span>Edit</span>
        </nav>

        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row gap-6">
                <!-- Profile Picture Section -->
                <div class="w-full md:w-1/3 flex flex-col items-center">
                    <div class="w-48 h-48 rounded-full overflow-hidden mt-20 bg-gray-200 mb-4 relative group">
                        <img id="editProfilePreview" 
                             src="{{ $admin->profile_picture ? asset('storage/' . $admin->profile_picture) : asset('storage/profiles/default-profile.png') }}" 
                             alt="Profile Picture" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <button onclick="document.getElementById('editProfilePicture').click()"
                            class="bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                        Change Photo
                    </button>
                </div>

                <!-- Profile Form -->
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold mb-4">Edit Admin</h2>

                    <!-- Tabs Navigation -->
                    <div class="mb-4 border-b border-gray-200">
                        <ul class="flex text-sm font-medium text-center" id="myTab" role="tablist">
                            <li class="mr-2">
                                <button class="p-4 border-b-2 rounded-t-lg transition-all duration-300 hover:text-slate-700 hover:border-slate-500" id="personal-tab" data-tab-target="#personal" type="button" role="tab" aria-selected="true">Personal Information</button>
                            </li>
                            <li>
                                <button class="p-4 border-b-2 rounded-t-lg transition-all duration-300 hover:text-slate-700 hover:border-slate-500" id="documents-tab" data-tab-target="#documents" type="button" role="tab" aria-selected="false">Documents</button>
                            </li>
                        </ul>
                    </div>

                    <div id="myTabContent">
                        <!-- Personal Information Tab -->
                        <div class="p-4 tab-content" id="personal" role="tabpanel">
                            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <!-- Hidden File Input -->
                                <input type="file" id="editProfilePicture" name="profile_picture" class="hidden" accept="image/*" onchange="previewEditImage(event)">

                                <!-- Form Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}" 
                                               class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200" required>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" 
                                               class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200" required>
                                    </div>
                                </div>

                                <!-- Password Fields -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input type="password" id="password" name="password" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                                </div>

                                <!-- Submit Button -->
                                <div>
                                    <button type="submit" class="w-full bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Documents Tab -->
                        <div class="hidden p-4 tab-content" id="documents" role="tabpanel">
                            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="documents" class="block text-sm font-medium text-gray-700">Upload Documents</label>
                                    <input type="file" id="documents" name="documents[]" multiple class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200">
                                </div>
                                <div>
                                    <button type="submit" class="w-full bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                        Upload Documents
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
@endsection
