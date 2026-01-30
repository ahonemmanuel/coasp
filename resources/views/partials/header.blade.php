<!-- Top Bar -->
<div class="bg-[#f5f0e8] border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex flex-col sm:flex-row justify-between items-center py-3 gap-2 sm:gap-0">
            <!-- Contact Info -->
            <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-6 text-sm text-gray-600">
                <a href="tel:+221775055121" class="flex items-center gap-2 hover:text-primary transition-colors whitespace-nowrap">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="text-xs sm:text-sm">+221 77 505 51 21</span>
                </a>
                <span class="text-gray-300 hidden sm:block">|</span>
                <a href="mailto:info@coasp.com" class="flex items-center gap-2 hover:text-primary transition-colors whitespace-nowrap">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-xs sm:text-sm">info@coasp.com</span>
                </a>
            </div>

            <!-- Sélecteur de langue personnalisé -->
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
                    <img src="{{ asset('images/n.png') }}" alt="COASP" class="h-16 sm:h-20 w-auto transition-all duration-300">
                </a>
            </div>

            <!-- Navigation Desktop -->
            <nav class="hidden lg:flex items-center flex-1 justify-center">
                <ul class="flex items-center gap-4 xl:gap-8">
                    <!-- Accueil -->
                    <li>
                        <a href="{{ route('home') }}"
                           class="font-medium text-sm xl:text-base transition-colors no-underline {{ request()->routeIs('home') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Accueil
                        </a>
                    </li>

                    <!-- Qui sommes-nous? -->
                    <li>
                        <a href="{{ route('about') }}"
                           class="font-medium text-sm xl:text-base transition-colors no-underline {{ request()->routeIs('about') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Qui sommes-nous?
                        </a>
                    </li>

                    <!-- Ressources (Dropdown) -->
                    <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="font-medium text-sm xl:text-base transition-colors no-underline flex items-center gap-1 {{ request()->routeIs('documents.*') || request()->routeIs('news.*') || request()->routeIs('gallery.*') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Ressources
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 border border-gray-200">
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('documents.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline text-sm {{ request()->routeIs('documents.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Documents Utiles
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline text-sm {{ request()->routeIs('news.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Actualités COASP
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('gallery.index') }}"
                                       class="block px-6 py-3 transition-colors no-underline text-sm {{ request()->routeIs('gallery.*') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Galerie
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Réseaux (Dropdown) -->
                    <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="font-medium text-sm xl:text-base transition-colors no-underline flex items-center gap-1 {{ request()->routeIs('partners') || request()->routeIs('allies') || request()->routeIs('members') ? 'text-[#297d53]' : 'text-gray-700 hover:text-[#297d53]' }}">
                            Réseaux
                            <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 border border-gray-200">
                            <ul class="py-2">
                                <li>
                                    <a href="{{ route('partners') }}"
                                       class="block px-6 py-3 transition-colors no-underline text-sm {{ request()->routeIs('partners') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Partenaires
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allies') }}"
                                       class="block px-6 py-3 transition-colors no-underline text-sm {{ request()->routeIs('allies') ? 'bg-gray-50 text-[#297d53]' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                                        Alliés
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Right Side Desktop -->
            <div class="hidden lg:flex items-center gap-4 flex-shrink-0">
                <!-- Sélecteur de langue desktop -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open; $event.stopPropagation()"
                            class="flex items-center gap-2 text-sm text-gray-700 hover:text-[#297d53] transition-colors">
                        <img id="header-flag" src="https://flagcdn.com/w40/fr.png" alt="FR" class="w-6 h-4 object-cover rounded">
                        <span id="header-lang" class="font-semibold">FR</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="open"
                         x-cloak
                         @click.away="open = false"
                         x-transition
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 py-2 border border-gray-200">
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

                <a href="{{ route('contact') }}" class="bg-[#3d8c5a] hover:bg-[#2d7a4a] text-white px-6 xl:px-8 py-3 rounded-lg font-semibold text-sm xl:text-base transition-all duration-300 shadow-md hover:shadow-lg no-underline whitespace-nowrap">
                    Contact
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden mobile-menu-toggle p-2 text-gray-700 hover:text-[#297d53] transition-colors">
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden border-t border-gray-200">
            <nav class="py-4">
                <ul class="space-y-1">
                    <!-- Accueil -->
                    <li>
                        <a href="{{ route('home') }}"
                           class="block px-4 py-3 font-medium transition-colors no-underline {{ request()->routeIs('home') ? 'text-[#297d53] bg-gray-50' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                            Accueil
                        </a>
                    </li>

                    <!-- Qui sommes-nous? -->
                    <li>
                        <a href="{{ route('about') }}"
                           class="block px-4 py-3 font-medium transition-colors no-underline {{ request()->routeIs('about') ? 'text-[#297d53] bg-gray-50' : 'text-gray-700 hover:bg-gray-50 hover:text-[#297d53]' }}">
                            Qui sommes-nous?
                        </a>
                    </li>

                    <!-- Ressources (Dropdown Mobile) -->
                    <li>
                        <button onclick="toggleMobileDropdown('resources')" class="w-full flex items-center justify-between px-4 py-3 font-medium text-gray-700 hover:bg-gray-50 hover:text-[#297d53] transition-colors">
                            <span>Ressources</span>
                            <svg id="resources-icon" class="w-5 h-5 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <ul id="resources-dropdown" class="hidden bg-gray-50 space-y-1">
                            <li>
                                <a href="{{ route('documents.index') }}"
                                   class="block px-8 py-2 text-sm transition-colors no-underline {{ request()->routeIs('documents.*') ? 'text-[#297d53]' : 'text-gray-600 hover:text-[#297d53]' }}">
                                    Documents Utiles
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog.index') }}"
                                   class="block px-8 py-2 text-sm transition-colors no-underline {{ request()->routeIs('news.*') ? 'text-[#297d53]' : 'text-gray-600 hover:text-[#297d53]' }}">
                                    Actualités COASP
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gallery.index') }}"
                                   class="block px-8 py-2 text-sm transition-colors no-underline {{ request()->routeIs('gallery.*') ? 'text-[#297d53]' : 'text-gray-600 hover:text-[#297d53]' }}">
                                    Galerie
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Réseaux (Dropdown Mobile) -->
                    <li>
                        <button onclick="toggleMobileDropdown('networks')" class="w-full flex items-center justify-between px-4 py-3 font-medium text-gray-700 hover:bg-gray-50 hover:text-[#297d53] transition-colors">
                            <span>Réseaux</span>
                            <svg id="networks-icon" class="w-5 h-5 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <ul id="networks-dropdown" class="hidden bg-gray-50 space-y-1">
                            <li>
                                <a href="{{ route('partners') }}"
                                   class="block px-8 py-2 text-sm transition-colors no-underline {{ request()->routeIs('partners') ? 'text-[#297d53]' : 'text-gray-600 hover:text-[#297d53]' }}">
                                    Partenaires
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('allies') }}"
                                   class="block px-8 py-2 text-sm transition-colors no-underline {{ request()->routeIs('allies') ? 'text-[#297d53]' : 'text-gray-600 hover:text-[#297d53]' }}">
                                    Alliés
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Langue Mobile -->
                    <li class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="font-medium text-gray-700">Langue:</span>
                            <select onchange="changeLanguageMobile(this.value)" class="bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#297d53]">
                                <option value="fr" selected>Français</option>
                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="pt">Português</option>
                            </select>
                        </div>
                    </li>

                    <!-- Contact -->
                    <li class="px-4 pt-2">
                        <a href="{{ route('contact') }}" class="block text-center bg-[#3d8c5a] hover:bg-[#2d7a4a] text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md no-underline">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Widget Google Translate caché -->
<div id="google_translate_element" style="display: none;"></div>

<script>
    // Menu mobile toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');

                // Fermer les dropdowns quand on ferme le menu mobile
                if (mobileMenu.classList.contains('hidden')) {
                    document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
                        dropdown.classList.add('hidden');
                    });
                    document.querySelectorAll('[id$="-icon"]').forEach(icon => {
                        icon.classList.remove('rotate-180');
                    });
                }
            });
        }

        // Fermer le menu mobile quand on clique sur un lien
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    });

    // Toggle mobile dropdowns
    function toggleMobileDropdown(dropdownName) {
        const dropdown = document.getElementById(dropdownName + '-dropdown');
        const icon = document.getElementById(dropdownName + '-icon');

        if (dropdown) {
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    }

    // Fonction de changement de langue
    function changeLanguage(lang, langText, countryCode) {
        document.getElementById('current-flag').src = `https://flagcdn.com/w40/${countryCode}.png`;
        document.getElementById('current-lang-text').textContent = langText;
        document.getElementById('header-flag').src = `https://flagcdn.com/w40/${countryCode}.png`;
        document.getElementById('header-lang').textContent = lang.toUpperCase();

        // Fermer les dropdowns
        document.querySelectorAll('[x-data]').forEach(el => {
            if (el.__x && el.__x.$data && el.__x.$data.open !== undefined) {
                el.__x.$data.open = false;
            }
        });

        // Sauvegarder la préférence
        localStorage.setItem('preferred_language', lang);

        // Ici, vous pouvez ajouter la logique pour changer réellement la langue
        console.log('Langue changée pour:', lang);
    }

    // Version mobile simplifiée
    function changeLanguageMobile(lang) {
        const languages = {
            'fr': { text: 'Français', code: 'fr' },
            'en': { text: 'English', code: 'gb' },
            'es': { text: 'Español', code: 'es' },
            'pt': { text: 'Português', code: 'pt' }
        };

        if (languages[lang]) {
            changeLanguage(lang, languages[lang].text, languages[lang].code);
        }
    }

    // Initialiser la langue au chargement
    document.addEventListener('DOMContentLoaded', function() {
        const savedLang = localStorage.getItem('preferred_language') || 'fr';
        const languages = {
            'fr': { text: 'Français', code: 'fr' },
            'en': { text: 'English', code: 'gb' },
            'es': { text: 'Español', code: 'es' },
            'pt': { text: 'Português', code: 'pt' }
        };

        if (languages[savedLang]) {
            const lang = languages[savedLang];
            document.getElementById('current-flag').src = `https://flagcdn.com/w40/${lang.code}.png`;
            document.getElementById('current-lang-text').textContent = lang.text;
            document.getElementById('header-flag').src = `https://flagcdn.com/w40/${lang.code}.png`;
            document.getElementById('header-lang').textContent = savedLang.toUpperCase();

            // Mettre à jour le select mobile
            const mobileSelect = document.querySelector('select[onchange*="changeLanguageMobile"]');
            if (mobileSelect) {
                mobileSelect.value = savedLang;
            }
        }
    });
</script>

<style>
    [x-cloak] { display: none !important; }
</style>
