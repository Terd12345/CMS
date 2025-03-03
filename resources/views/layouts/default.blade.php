<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/kld_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <title>@yield('title', "KLD System")</title>
    @vite('resources/css/app.css')
</head>
<body>

    @include('components.header')

    @yield('content')

    @include('components.footer')
    
    <script src="{{ asset('js/header.js') }}"></script>
    
</body>
</html>