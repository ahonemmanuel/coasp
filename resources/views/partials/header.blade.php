<header id="header" class="bg-white shadow-sm sticky top-0 z-40 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="COASP" class="h-16 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex gap-8 text-[#3e483c] font-outfit text-lg font-semibold">
                    <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}">Accueil</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-primary transition-colors">Qui sommes-nous?</a></li>
                    <li class="relative group">
                        <a href="#" class="hover:text-primary transition-colors flex items-center gap-1">
                            Ressources
                            <svg class="w-4 h-4" fill="currentColor"><path d="M7 10l5 5 5-5z"/></svg>
                        </a>
                        <!-- Dropdown -->
                        <ul class="absolute top-full left-0 mt-2 bg-white shadow-lg rounded-md py-2 min-w-[200px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Documents Utiles</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Actualités COASP</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Galerie</a></li>
                        </ul>
                    </li>
                    <li class="relative group">
                        <a href="#" class="hover:text-primary transition-colors flex items-center gap-1">
                            Réseaux
                            <svg class="w-4 h-4" fill="currentColor"><path d="M7 10l5 5 5-5z"/></svg>
                        </a>
                        <ul class="absolute top-full left-0 mt-2 bg-white shadow-lg rounded-md py-2 min-w-[200px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Partenaires</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Alliés</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Right Side Actions -->
            <div class="flex items-center gap-4">
                <!-- Search Button -->
                <button class="search-toggle p-2 hover:text-primary transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Contact Button -->
                <a href="{{ route('contact') }}" class="hidden md:inline-block bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-md font-outfit font-bold transition-all">
                    Contact
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="lg:hidden mobile-menu-toggle p-2">
                    <div class="w-6 h-0.5 bg-current mb-1.5"></div>
                    <div class="w-6 h-0.5 bg-current mb-1.5"></div>
                    <div class="w-6 h-0.5 bg-current"></div>
                </button>
            </div>
        </div>
    </div>

    <!-- Search Overlay -->
    <div id="search-overlay" class="hidden absolute top-full left-0 right-0 bg-white shadow-lg p-4">
        <form action="{{ route('search') }}" method="GET" class="container mx-auto">
            <div class="relative">
                <input type="search" name="q" placeholder="Rechercher..." class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-primary">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</header>
