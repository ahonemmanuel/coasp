<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COASP - Pour une Agriculture Durable en Afrique de l'Ouest">
    <title>@yield('title', 'COASP - Agriculture & Écologie')</title>
    <script src="https://unpkg.com/feather-icons"></script>


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-poppins">

@include('partials.header')

<main>
    @yield('content')
</main>

@include('partials.footer')

<!-- Go Top Button -->
<button id="go-top"
        class="fixed bottom-8 right-8 w-12 h-12 bg-accent hover:bg-accent-dark text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-50 flex items-center justify-center">
    <i class="fas fa-arrow-up"></i>
</button>

@stack('scripts')
</body>
</html>
