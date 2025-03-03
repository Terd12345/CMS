@extends('layouts.dashboard')
@section('content')

    @section('dashboard-content')
    {{-- Breadcrumb --}}
    <p class="text-gray-500 mb-6">
        <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('admin.users') }}">Users</a>
    </p>
    


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

    {{-- Main content --}}
    <div class="bg-white p-4 rounded-lg shadow">
        
        <div class="flex items-center">
            <h2 class="text-xl font-bold">Users List</h2>
            <a href="{{ route('admin.archivedUsers') }}" class="ml-5 px-2 py-1 bg-blue-400 text-white font-semibold rounded-md shadow-md hover:bg-blue-500 transition duration-300">
                Archive
            </a>
            

            <a href="{{ route('admin.pdfUsers') }}" 
                class="ml-5 px-2 py-1 bg-red-500 text-white font-semibold rounded-md shadow-md hover:bg-red-700 transition duration-300 flex items-center">
                Print as PDF
            </a>

        </div>
        <br>

        <hr>
        <table id="usersTable" class="display w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Created At</th>
                    <th class="border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $user->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->created_at ? $user->created_at->format('M-d-Y') : 'N/A' }}</td>
                        <td class="border border-gray-300 p-2 flex justify-center gap-2">
                            {{-- Edit Button --}}
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                Edit
                            </a>

                            {{-- Delete Button --}}
                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition delete-button" data-id="{{ $user->id }}">
                                Delete
                            </button>
                            {{-- Delete Form (hidden) --}}
                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @endsection

@endsection
