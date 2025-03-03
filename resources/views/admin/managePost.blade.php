@extends('layouts.dashboard')

@section('content')
    
    @section('dashboard-content')
        {{-- Breadcrumb --}}
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('home') }}">Manage Post</a>
        </p>


        @if(session()->has('error'))
        <div class="p-4 mb-4 text-red-800 bg-red-100 border border-red-300 rounded-lg">
            {{ session()->get('error') }}
        </div>
    @endif

        {{-- Main content --}}
        <div class="bg-white p-4 rounded-lg shadow">
            
            <div class="flex items-center">
                <h2 class="text-xl font-bold">Manage Posts</h2>
                <a href="{{ route('admin.archivedEvents') }}" class="ml-5 px-2 py-1 bg-blue-400 text-white font-semibold rounded-md shadow-md hover:bg-blue-500 transition duration-300">
                    Archive
                </a>

                <a href="{{ route('admin.pdfPost') }}" 
                class="ml-5 px-2 py-1 bg-red-500 text-white font-semibold rounded-md shadow-md hover:bg-red-700 transition duration-300 flex items-center">
                Print as PDF
                </a>
            </div>
            <br>

            <hr>

            <table id="postsTable" class="display w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Title</th>
                        <th class="border border-gray-300 p-2">Description</th>
                        <th class="border border-gray-300 p-2">Created At</th>
                        <th class="border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr class="text-center">
                            <td class="border border-gray-300 p-2">{{ $event->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $event->title }}</td>
                            <td class="border border-gray-300 p-2">{{ Str::limit($event->description, 50) }}</td>
                            <td class="border border-gray-300 p-2">{{ $event->end_date ? $event->created_at->format('M-d-Y') : 'N/A' }}</td>
                            <td class="border border-gray-300 p-2">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- view button --}}

                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.managePost.edit', $event->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                        Edit 
                                    </a> 
                                    
                                    {{-- Delete Form --}}
                                    <form action="{{ route('admin.managePost.delete', $event->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition delete-button">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table> 
        </div>

    @endsection

@endsection
