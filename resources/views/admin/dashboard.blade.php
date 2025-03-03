@extends('layouts.dashboard')

@section('content')

        {{-- SweetAlert Script --}}
        @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    title: "Welcome Back, {{ Auth::user()->name }}",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                });
            });
        </script>
        @endif

    
    @section('dashboard-content')
        {{-- Breadcrumb --}}
        <p class="text-gray-500 mb-6">
            <a href="{{ route('home') }}">Dashboard</a> / <a href="{{ route('home') }}">Home</a>
        </p>
        
        {{-- Main content --}}
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Dashboard Overview</h2>
            <canvas id="dashboardChart" width="400" height="200"></canvas>
        </div>

        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('dashboardChart').getContext('2d');
                const dashboardChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Users', 'Events', 'Admins'],
                        datasets: [{
                            label: 'Count',
                            data: [{{ $usersCount }}, {{ $eventsCount }}, {{ $adminsCount }}],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>

    @endsection

@endsection
