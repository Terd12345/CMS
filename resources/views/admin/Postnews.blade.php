@extends('layouts.dashboard')

@section('content')
    @section('dashboard-content')

        {{-- Breadcrumb Navigation --}}
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('home') }}">Home</a>
        </p>

        {{-- Success Message --}}
        @if(session()->has('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif 

        {{-- Main Content --}}
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Calendar</h2>
            <hr><br>
            {{-- FullCalendar Container --}}
            <div id="calendar"></div>
        </div>

        {{-- Event Modal --}}
        <div id="eventModal" class="fixed inset-0 hidden flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                <h2 class="text-lg font-semibold mb-4 text-center">Add Event</h2>
                <form id="eventForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Event Title</label>
                        <input type="text" name="title" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" required 
                        class="block w-full p-1 border border-gray-300 rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 sm:text-sm"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" name="start_date" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" name="end_date" 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Upload Event Image</label>
                        <input type="file" name="image" accept="image/*"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModal" 
                            class="bg-gray-400 text-white py-2 px-4 rounded-md hover:bg-gray-500">
                            Cancel
                        </button>
                        <button type="submit" 
                            class="bg-slate-500 text-white py-2 px-4 rounded-md hover:bg-slate-600">
                            Save Event
                        </button>
                    </div>
                </form> 
            </div>
        </div>

    @endsection
@endsection
