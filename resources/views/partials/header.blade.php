<!-- Top Bar -->
<div class="bg-[#f5f0e8] border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Contact Info -->
            <div class="flex items-center gap-6 text-sm text-gray-600">
                <a href="tel:+221775055121" class="flex items-center gap-2 hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>Appelez-Nous directement sur +221 77 505 51 21</span>
                </a>
                <span class="text-gray-300">|</span>
                <a href="mailto:info@coasp.com" class="flex items-center gap-2 hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Email: info@coasp.com</span>
                </a>
            </div>

            <!-- Sélecteur de langue personnalisé -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" id="current-language" class="flex items-center gap-2 text-sm text-gray-700 hover:text-primary transition-colors">
                    <img id="current-flag" src="https://flagcdn.com/w40/fr.png" alt="FR" class="w-6 h-4 object-cover rounded">
                    <span id="current-lang-text" class="font-semibold">Français</span>
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <div x-show="open"
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 py-2">

                    <button onclick="changeLanguage('fr', 'Français', 'fr')" class="language-option flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                        <img src="https://flagcdn.com/w40/fr.png" alt="FR" class="w-6 h-4 object-cover rounded">
                        <span class="font-medium">Français</span>
                    </button>

                    <button onclick="changeLanguage('en', 'English', 'gb')" class="language-option flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                        <img src="https://flagcdn.com/w40/gb.png" alt="EN" class="w-6 h-4 object-cover rounded">
                        <span class="font-medium">English</span>
                    </button>

                    <button onclick="changeLanguage('es', 'Español', 'es')" class="language-option flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                        <img src="https://flagcdn.com/w40/es.png" alt="ES" class="w-6 h-4 object-cover rounded">
                        <span class="font-medium">Español</span>
                    </button>

                    <button onclick="changeLanguage('pt', 'Português', 'pt')" class="language-option flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                        <img src="https://flagcdn.com/w40/pt.png" alt="PT" class="w-6 h-4 object-cover rounded">
                        <span class="font-medium">Português</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header id="header" class="bg-white shadow-sm sticky top-0 z-40 transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <!-- Logo -->
            <div class="logo flex-shrink-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/n.png') }}" alt="COASP" class="h-20 w-auto transition-all duration-300">
                </a>
            </div>

            <!-- Navigation Desktop -->
            <nav class="hidden lg:flex items-center flex-1 justify-center">
                <ul class="flex items-center gap-8">
                    <!-- Accueil -->
                    <li>
                        <a href="{{ route('home') }}"
                           class="font-medium text-base transition-colors no-underline {{ request()->routeIs('home') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Accueil
                        </a>
                    </li>

                    <!-- Qui sommes-nous? -->
                    <li>
                        <a href="{{ route('about') }}"
                           class="font-medium text-base transition-colors no-underline {{ request()->routeIs('about') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Qui sommes-nous?
                        </a>
                    </li>

                    <!-- Ressources (Dropdown) -->
                    <li class="relative dropdown-container" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="font-medium text-base transition-colors no-underline flex items-center gap-1 {{ request()->routeIs('documents.*') || request()->routeIs('news.*') || request()->routeIs('gallery.*') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Ressources
                            <span class="text-lg">+</span>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl z-50"
                             style="display: none;">
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('documents.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline {{ request()->routeIs('documents.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Documents Utiles
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('news.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline {{ request()->routeIs('news.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Actualités COASP
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline {{ request()->routeIs('gallery.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Galerie
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Réseaux (Dropdown) -->
                    <li class="relative dropdown-container" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="font-medium text-base transition-colors no-underline flex items-center gap-1 {{ request()->routeIs('partners') || request()->routeIs('allies') || request()->routeIs('members') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Réseaux
                            <span class="text-lg">+</span>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl z-50"
                             style="display: none;">
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('partners') }}"
                                       class="block px-6 py-3 transition-colors no-underline {{ request()->routeIs('partners') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Partenaires
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allies') }}"
                                       class="block px-6 py-3 transition-colors no-underline {{ request()->routeIs('allies') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Alliés
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Right Side -->
            <div class="hidden lg:flex items-center gap-4 flex-shrink-0">
                <!-- Sélecteur de langue -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 text-sm text-gray-700 hover:text-[#297d53] transition-colors">
                        <img id="header-flag" src="https://flagcdn.com/w40/fr.png" alt="FR" class="w-6 h-4 object-cover rounded">
                        <span id="header-lang" class="font-semibold">FR</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 py-2">
                        <button onclick="changeLanguage('fr', 'Français', 'fr')" class="flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                            <img src="https://flagcdn.com/w40/fr.png" alt="FR" class="w-6 h-4 object-cover rounded">
                            <span class="font-medium">Français</span>
                        </button>
                        <button onclick="changeLanguage('en', 'English', 'gb')" class="flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                            <img src="https://flagcdn.com/w40/gb.png" alt="EN" class="w-6 h-4 object-cover rounded">
                            <span class="font-medium">English</span>
                        </button>
                        <button onclick="changeLanguage('es', 'Español', 'es')" class="flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                            <img src="https://flagcdn.com/w40/es.png" alt="ES" class="w-6 h-4 object-cover rounded">
                            <span class="font-medium">Español</span>
                        </button>
                        <button onclick="changeLanguage('pt', 'Português', 'pt')" class="flex items-center gap-3 w-full px-4 py-3 text-sm hover:bg-gray-50 transition-colors text-gray-700">
                            <img src="https://flagcdn.com/w40/pt.png" alt="PT" class="w-6 h-4 object-cover rounded">
                            <span class="font-medium">Português</span>
                        </button>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="bg-[#3d8c5a] hover:bg-[#2d7a4a] text-white px-8 py-3 rounded-lg font-semibold text-base transition-all duration-300 shadow-md hover:shadow-lg no-underline">
                    Contact
                </a>
            </div>

            <!-- Mobile Menu -->
            <button class="lg:hidden mobile-menu-toggle p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Widget Google Translate caché -->
<div id="google_translate_element" style="display: none;"></div>
