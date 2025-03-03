@extends('layouts.default')

@section('content')

<section class="min-h-screen py-12 bg-gray-100">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-3xl font-bold text-slate-600 mb-10"><a href="{{ route('landing') }}">Home</a> / <a href="{{ route('news') }}">News</a></h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
                <!-- Main Feature News -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
                    @if($events->isNotEmpty())
                        @php $featured = $events->first(); @endphp
                        <div>
                            <a href="{{ route('news.show', $featured->id) }}" class="block hover:opacity-80 transition">
                                <h1 class="text-3xl font-bold text-gray-800">{{ $featured->title }}</h1>
                                <p class="text-sm text-gray-600 my-2">
                                    <span class="text-red-500 font-semibold">Event</span> |
                                    {{ \Carbon\Carbon::parse($featured->start_date)->format('F d, Y') }} 
                                    @if($featured->end_date) - {{ \Carbon\Carbon::parse($featured->end_date)->format('F d, Y') }} @endif
                                </p>
                                @if ($featured->image)
                                    <img src="{{ asset('storage/' . $featured->image) }}" class="w-full h-64 object-cover rounded-md mt-4" alt="Event Image">
                                @endif
                                <p class="mt-4 text-gray-700">{{ $featured->description }}</p> <!-- Added description -->
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Side Panel News -->
                <div class="space-y-6">
                    <div class="side font-semibold">
                        <h3>Related News:</h3>
                    </div>
                    @foreach ($events->skip(1)->take(3) as $event)
                        <a href="{{ route('news.show', $event->id) }}" class="block bg-white p-4 rounded-lg shadow-md flex space-x-4 hover:bg-gray-100 transition">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" class="w-24 h-24 object-cover rounded-md" alt="Event Image">
                            @endif
                            <div>
                                <h3 class="text-md font-semibold text-gray-800">{{ $event->title }}</h3>
                                <p class="text-sm text-gray-600">
                                    <span class="text-red-500 font-semibold">Event</span> |
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}
                                </p>
                                <p class="mt-2 text-gray-700">{{ $event->description }}</p> <!-- Added description -->
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Bottom News Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
                @foreach ($events->skip(4)->take(2) as $event)
                    <a href="{{ route('news.show', $event->id) }}" class="relative group block">
                        @if ($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" class="w-full h-60 object-cover rounded-lg" alt="Event Image">
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex flex-col justify-end p-4 group-hover:bg-opacity-60 transition-all">
                            <p class="text-sm text-gray-300">
                                <span class="text-red-500 font-semibold">Event</span> | 
                                {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y') }}
                            </p>
                            <h3 class="text-lg font-semibold text-white mt-1">{{ $event->title }}</h3>
                            <p class="mt-2 text-gray-300">{{ $event->description }}</p> <!-- Added description -->
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection