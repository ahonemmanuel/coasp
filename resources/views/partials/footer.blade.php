<footer class="bg-[#2d3e36] text-white pt-20 pb-8">
    <div class="container mx-auto px-4">

        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-16">

            <!-- Logo - 3 colonnes -->
            <div class="lg:col-span-3">
                <div class="mb-6">
                    <img src="{{ asset('images/lo.png') }}" alt="COASP" class="h-48 w-48">
                </div>
            </div>

            <!-- Menu - 3 colonnes -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-semibold text-xl mb-6">Menu</h3>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors text-base">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors text-base">
                            A propos de nous
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors text-base">
                            Nous Contacter
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Nous Contacter - 3 colonnes -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-semibold text-xl mb-6">Nous Contacter</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-white flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-300 text-base leading-relaxed">
                            Adresse: Grand standing, Thiès Sénégal
                        </span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-white flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <a href="mailto:info@coasp.org" class="text-gray-300 hover:text-white transition-colors text-base">
                            Email: info@coasp.org
                        </a>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-white flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <a href="tel:+221775055121" class="text-gray-300 hover:text-white transition-colors text-base">
                            Téléphone: +221 77 505 51 21
                        </a>
                    </li>
                </ul>
            </div>

            <!-- S'inscrire aux newsletters - 3 colonnes -->
            <div class="lg:col-span-3">
                <h3 class="text-white font-semibold text-xl mb-6">S'inscrire aux newsletters</h3>
                <p class="text-gray-300 mb-6 text-base leading-relaxed">
                    Inscrivez-vous à notre newsletters pour avoir de nos nouvelles
                </p>

                <!-- Formulaire Newsletter -->

                @if(session('success'))
                    <div class="mt-3 p-3 bg-green-600 text-white rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-[#4a5c54] pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-300 text-sm">
                    © {{ date('Y') }} COASP. Tous droits réservés.
                </p>

                <ul class="flex flex-wrap gap-6 text-sm">
                    <li>
                        <a href="{{ route('privacy') }}" class="text-gray-300 hover:text-white transition-colors">
                            Politique de confidentialité
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}" class="text-gray-300 hover:text-white transition-colors">
                            Conditions d'utilisation
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('legal') }}" class="text-gray-300 hover:text-white transition-colors">
                            Mentions légales
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
