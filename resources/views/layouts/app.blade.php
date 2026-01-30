<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="COASP - Pour une Agriculture Durable en Afrique de l'Ouest">
    <title>@yield('title', 'COASP - Agriculture & Écologie')</title>

    <!-- AlpineJS pour les dropdowns -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Feather Icons -->
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
        class="fixed bottom-8 right-8 w-10 h-10 sm:w-12 sm:h-12 bg-[#3d8c5a] hover:bg-[#2d7a4a] text-white rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-50 flex items-center justify-center">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Bouton "Go to Top"
    document.addEventListener('DOMContentLoaded', function() {
        const goTopButton = document.getElementById('go-top');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                goTopButton.classList.remove('opacity-0', 'invisible');
                goTopButton.classList.add('opacity-100', 'visible');
            } else {
                goTopButton.classList.remove('opacity-100', 'visible');
                goTopButton.classList.add('opacity-0', 'invisible');
            }
        });

        goTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });

    // Initialiser Feather Icons
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

@stack('scripts')
</body>
</html>
