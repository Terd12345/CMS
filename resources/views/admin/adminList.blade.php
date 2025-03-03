@extends('layouts.dashboard')
@section('content')
    @section('dashboard-content')
    {{-- Breadcrumb --}}
    <p class="text-gray-500 mb-6">
        <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('admin.adminList') }}">Admin List</a>
    </p>
    

    @if(session()->has('success'))
                <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                    {{ session()->get('success') }}
                </div>
        @endif

    @if(session()->has('error'))
                <div class="p-4 mb-4 text-green-800 bg-red-100 border border-red-300 rounded-lg">
                    {{ session()->get('error') }}
                </div>
    @endif

    {{-- Main content --}}
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Admin List</h2>

        <hr>

        <table id="adminTable" class="display w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Profile</th>
                    <th class="border border-gray-300 p-2">Created At</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $admin->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $admin->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $admin->email }}</td>
                        <td class="border border-gray-300 p-2 text-center">
                            @if($admin->profile_picture)
                                <div class="flex justify-center items-center h-full">
                                    <img src="{{ asset('storage/' . $admin->profile_picture) }}" 
                                         alt="Profile Picture" 
                                         class="w-12 h-12 rounded-full border cursor-pointer hover:scale-110 transition-transform" 
                                         onclick="openModal('{{ asset('storage/' . $admin->profile_picture) }}')">
                                </div>
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 p-2">{{ $admin->created_at ? $admin->created_at->format('M-d-Y') : 'N/A' }}</td>

                        <td class="border border-gray-300 p-2">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Edit Button --}}
                                @if($admin->id != 44 || Auth::id() == 44)
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                        Edit 
                                    </a>
                                @endif
                                
                                {{-- Delete Form --}}
                                @if($admin->id != 44 || Auth::id() == 44)
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition delete-button">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                        
                    
                    </tr>                        
                @endforeach
            </tbody>
        </table> 
    </div>
    {{-- Modal --}}
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
            <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-800" onclick="closeModal()">
                ✕
            </button>
            <h3 class="text-center m-3">Profile Picture</h3>
            <div class="flex justify-center">
                <img id="modalImage" src="" alt="Full Image" class="max-w-full h-auto rounded-lg shadow">
            </div>
        </div>
    </div>
    
    @endsection
@endsection

