@extends('layouts.dashboard')

@section('content')
    @section('dashboard-content')
        {{-- Breadcrumb --}}
        <nav class="text-gray-500 mb-6 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-gray-700 transition duration-200">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.managePost') }}" class="hover:text-gray-700 transition duration-200">Manage Post</a>
            <span>/</span>
            <span>Edit Post</span>
        </nav>

        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row gap-6">
                <!-- Post Image Section -->
                <div class="w-full md:w-1/3 flex flex-col items-center">
                    <div class="w-48 h-48 rounded overflow-hidden mt-20 bg-gray-200 mb-4 relative group">
                        <img id="editPostImagePreview" 
                             src="{{ $event->image ? asset('storage/' . $event->image) : asset('storage/posts/default-post.png') }}" 
                             alt="Post Image" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <button onclick="document.getElementById('editPostImage').click()"
                            class="bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                        Change Image
                    </button>
                </div>

                <!-- Post Form -->
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold mb-4">Edit Post</h2>

                    <form action="{{ route('admin.managePost.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <!-- Hidden File Input -->
                        <input type="file" id="editPostImage" name="image" class="hidden" accept="image/*" onchange="previewEditPostImage(event)">

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" 
                                       class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200" required>
                                @error('title')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="5" 
                                          class="mt-1 w-full px-3 py-2 border rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 transition-all duration-200" required>{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-slate-500">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function previewEditPostImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('editPostImagePreview');
                    output.src = reader.result;
                    output.classList.remove('hidden');
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

    @endsection
@endsection
