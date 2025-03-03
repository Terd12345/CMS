@extends('layouts.dashboard')
@section('content')

    @section('dashboard-content')
    {{-- Breadcrumb --}}
    <p class="text-gray-500 mb-6">
        <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('admin.archivedUsers') }}">Archived Users</a>
    </p>

    {{-- Main content --}}
    <div class="bg-white p-4 rounded-lg shadow">
        
        <div class="flex items-center">
            <h2 class="text-xl font-bold">Archived Users List</h2>
        </div>
        <br>

        <hr>
        <table id="archivedUsersTable" class="display w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    {{-- <th class="border border-gray-300 p-2">Role</th> --}}
                    <th class="border border-gray-300 p-2">Created At</th>
                    <th class="border border-gray-300 p-2">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivedUsers as $user)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $user->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                        {{-- <td class="border border-gray-300 p-2">{{ $user->role }}</td> --}}
                        <td class="border border-gray-300 p-2">{{ $user->created_at ? $user->created_at->format('M-d-Y') : 'N/A' }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->updated_at ? $user->updated_at->format('M-d-Y') : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @endsection

@endsection
