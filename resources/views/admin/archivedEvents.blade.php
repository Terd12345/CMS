@extends('layouts.dashboard')

@section('content')
    
    @section('dashboard-content')
        {{-- Breadcrumb --}}
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}">Dashboard</a> / Archived Events
        </p>

        {{-- Main content --}}
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Archived Events</h2>

            <table id="archivedEventsTable" class="display w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Title</th>
                        <th class="border border-gray-300 p-2">Description</th>
                        <th class="border border-gray-300 p-2">Start Date</th>
                        <th class="border border-gray-300 p-2">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivedEvents as $event)
                        <tr class="text-center">
                            <td class="border border-gray-300 p-2">{{ $event->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $event->title }}</td>
                            <td class="border border-gray-300 p-2">{{ Str::limit($event->description, 50) }}</td>
                            <td class="border border-gray-300 p-2">{{ $event->start_date }}</td>
                            <td class="border border-gray-300 p-2">{{ $event->end_date }}</td>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table> 
        </div>

    @endsection

@endsection
