@extends('layouts.default')

@section('content')

<section class="min-h-screen py-12 bg-gray-100">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-3xl font-bold text-slate-600 mb-10"><a href="{{ route('landing') }}">Home</a> / <a href="{{ route('news') }}">News</a></h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
                <!-- Main News Content -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $news->title }}</h1>
                    <p class="text-sm text-gray-600 my-2">
                        <span class="text-red-500 font-semibold">Event</span> |
                        {{ \Carbon\Carbon::parse($news->start_date)->format('F d, Y') }} 
                        @if($news->end_date) - {{ \Carbon\Carbon::parse($news->end_date)->format('F d, Y') }} @endif
                    </p>

                    @if ($news->image)
                        {{-- <img src="{{ asset('storage/' . $news->image) }}" class="w-full object-cover rounded-md mt-4" alt="News Image" height="100px" width="100px"> --}}
                        <img src="{{ asset('storage/' . $news->image) }}" 
                            class="w-24 h-24 object-cover rounded-md mt-4" 
                            style="width: 500px; height: 500px; margin-left: 15%;" 
                            alt="News Image">
                    @endif

                    <div class="mt-6 text-gray-700 text-lg">
                        {!! nl2br(e($news->description)) !!}
                    </div>
                </div>

                <!-- Related News -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-800">Related News:</h2>
                    @foreach ($relatedNews as $event)
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
                            </div>
                        </a>
                    @endforeach

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $relatedNews->links('vendor.pagination.custom') }} <!-- This will generate the pagination links with custom styling -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection