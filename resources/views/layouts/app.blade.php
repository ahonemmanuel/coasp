<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COASP')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-poppins antialiased">

<!-- Preloader -->
@include('partials.preloader')

<!-- Go Top Button -->
<button id="go-top" class="fixed bottom-8 right-8 bg-accent hover:bg-accent-dark p-3 rounded-full shadow-lg opacity-0 transition-all duration-300 z-50">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<!-- Mobile Menu Sidebar -->
@include('partials.mobile-menu')

<!-- Top Bar -->
@include('partials.topbar')

<!-- Header -->
@include('partials.header')

<!-- Page Title -->
@yield('page-title')

<!-- Main Content -->
<main id="main-content" class="site-main">
    @yield('content')
</main>

<!-- Footer -->
@include('partials.footer')

@stack('scripts')
</body>
</html>
