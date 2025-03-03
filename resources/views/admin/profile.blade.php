{{-- this is the settings --}}

{{-- useless code, you can delete it --}}

@extends('layouts.dashboard')
@section('content')

    <!-- Content Area -->
    @section('dashboard-content')
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}">Dashboard</a> / 
            <a href="{{ route('admin.adminList') }}">Profile</a>
        </p>

        <div class="container mx-auto p-6">
            <!-- Outer Card Container -->
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row gap-6">
                <!-- Image Profile Card (Left Side) -->
                <div class="w-full md:w-1/3 flex flex-col items-center justify-center">
                    <div class="w-48 h-48 rounded-full overflow-hidden bg-gray-200 mb-4 relative">
                        <img id="editProfilePreview" 
     src="{{ Auth::user()->profile_picture && file_exists(storage_path('app/public/' . Auth::user()->profile_picture)) 
     ? asset('storage/' . Auth::user()->profile_picture) 
     : asset('storage/profiles/default-profile.png') }}" 
     alt="Profile Picture" 
     class="w-full h-full object-cover">
                    </div>
                    <button type="button" onclick="document.getElementById('editProfilePicture').click()"
                            class="bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                        Change Photo
                    </button>
                    <input type="file" id="editProfilePicture" name="profile_picture" accept="image/*" class="hidden" onchange="showImagePreview(event)">
                </div>


                <!-- Profile Form Card (Right Side) -->
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold mb-4">Profile Information</h2>
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" 
                                   value="{{ Auth::user()->name }}" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                          focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" 
                                   value="{{ Auth::user()->email }}" 
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                          focus:outline-none focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                        </div>

                        <!-- Profile Picture Field (Hidden) -->
                        <input type="hidden" id="profile_picture_hidden" name="profile_picture_hidden">

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-slate-500 text-white px-4 py-2 rounded 
                                     hover:bg-slate-600 transition duration-300">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    @endsection

    <script>
        window.onload = function () {
            document.getElementById('editProfilePicture').addEventListener('change', function (event) {
                const fileInput = event.target;
                const imageElement = document.getElementById('editProfilePreview');
    
                if (fileInput.files && fileInput.files[0]) {
                    const fileReader = new FileReader();
                    fileReader.onload = function (e) {
                        imageElement.src = e.target.result;
                    };
                    fileReader.readAsDataURL(fileInput.files[0]);
                }
            });
        };
    </script>
    
    
    
@endsection
