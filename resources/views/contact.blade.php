@extends('layouts.default')

@section('content')

<section class="min-h-screen py-12 bg-gray-100">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-3xl font-bold text-slate-600"><a href="{{ route('landing') }}">Home</a> / <a href="{{ route('contact') }}">Contact</a></h1>
        
        <div class="bg-white p-8 rounded-lg shadow-lg mt-8">
            <h2 class="text-2xl font-bold mb-6 text-slate-600">Contact Us</h2>
            
            <!-- SweetAlert Success Message -->
            @if(session('success'))
                <script>
                    Swal.fire({
                        title: "Success!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonColor: "#10B981"
                    });
                </script>
            @endif
            
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald-400" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald-400" required>
                </div>
                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 font-bold mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald-400" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-emerald-400" required></textarea>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-emerald-500 text-white font-bold rounded-lg hover:bg-emerald-600 transition duration-300">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
