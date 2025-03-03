<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/kld_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/adminSidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdownEffect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendarDesign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/screenLoaderAdmin.css') }}" />
    <title>@yield('title', "Admin")</title>
    @vite('resources/css/app.css')
</head>
<body>

    @include('components.dashboard')
    @yield('content')
    
    @yield('scripts')
    

    {{-- jquery --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- datatable cdn link --}}
    <script src="{{ asset('js/datatable.js') }}"></script>
    {{-- dropdown effects --}}
    <script src="{{ asset('js/animationDropdown.js') }}"></script>
    {{-- image preview for users --}}
    <script src="{{ asset('js/imagePreview.js') }}"></script>
    {{-- image preview for admin --}}
    <script src="{{ asset('js/displaypreviewAdmin.js') }}"></script>
    {{-- image preview for news --}}
    <script src="{{ asset('js/imagePreviewNews.js') }}"></script>
    {{-- modal  --}}
    <script src="{{ asset('js/cardDisplay.js') }}"></script>
    {{-- toggle for header --}}
    <script src="{{ asset('js/headerToggle.js') }}"></script>
    {{-- sweetalert --}}
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    {{-- full calendar --}}
    <script src="{{ asset('js/fullcalendar.js') }}"></script>
    <script src="{{ asset('js/fullcalendarModal.js') }}"></script>
    <!-- Initialize DataTable -->
    <script src="{{ asset('js/initializeDataTable.js') }}"></script>
     {{-- initialize calendar --}}
    <script src="{{ asset('js/fullcalendarInitialize.js') }}"></script>
    {{-- sweetalert buttons --}}
    <script src="{{ asset('js/sweetalertButton.js') }}"></script>
    {{-- datatable for managePost --}}
    <script src="{{ asset('js/initializePostnews.js') }}"></script>
    {{-- sweetalert button for user --}}
    <script src="{{ asset('js/sweetalertUser.js') }}"></script>
    {{-- tab hover edit --}}
    <script src="{{ asset('js/tabHover.js') }}"></script>
    {{-- js charts --}}
    <script src="{{ asset('js/charts.js') }}"></script>
    {{-- hide screen loader after content fully loaded --}}
    <script src="{{ asset('js/hideLoader.js') }}"></script>

</body>
</html>