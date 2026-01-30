@extends('layouts.app')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom transitions for smoother sliding */
        #slider {
            transition: transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        /* Ensure full coverage with increased height */
        .carousel-slide {
            min-height: 120vh;
        }

        .absolute.inset-0 {
            width: 100%;
            height: 100%;
        }

        /* Responsive adjustments for very small screens */
        @media (max-width: 640px) {
            .carousel-slide {
                min-height: 100vh;
            }
            h1 {
                font-size: 2rem !important;
                line-height: 1.2 !important;
            }
            p {
                font-size: 1rem !important;
            }
            span {
                font-size: 0.875rem !important;
            }
        }

        /* Accessibility focus styles */
        button:focus {
            outline: 2px solid white;
            outline-offset: 2px;
        }

        /* Prevent layout shift when images load */
        img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Animations personnalisées pour la section À Propos */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes floatAnimation {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.9s ease-out forwards;
        }

        .animate-slideInRight {
            animation: slideInRight 0.9s ease-out forwards;
        }

        .animate-float {
            animation: floatAnimation 3s ease-in-out infinite;
        }

        .gradient-shimmer {
            background: linear-gradient(
                90deg,
                #EAB308 0%,
                #FCD34D 50%,
                #EAB308 100%
            );
            background-size: 1000px 100%;
            animation: shimmer 3s infinite;
        }

        .card-hover-effect {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover-effect:hover {
            transform: translateY(-8px) scale(1.02);
        }

        /* Styles pour la section équipe */
        .team-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .team-card:hover {
            transform: translateY(-8px);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideInUp {
            animation: slideInUp 0.6s ease-out forwards;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper-slide-image {
            height: 400px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            transition: transform 0.3s ease;
        }

        .swiper-slide-image:hover {
            transform: scale(1.02);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.1) 0%,
                rgba(0, 0, 0, 0.5) 50%,
                rgba(0, 0, 0, 0.8) 100%
            );
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swiper-slide-image:hover .image-overlay {
            opacity: 1;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white !important;
            background: rgba(34, 197, 94, 0.9);
            width: 50px !important;
            height: 50px !important;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(34, 197, 94, 1);
            transform: scale(1.1);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px !important;
        }

        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: white;
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            background: #22c55e;
            opacity: 1;
        }
    </style>
@endpush

@section('content')
    <!-- Slider Container -->
    <div class="relative w-full overflow-hidden carousel-slide">
        <!-- Slides -->
        <div class="relative w-full h-full flex transition-transform duration-1000 ease-in-out" id="slider">
            <!-- Slide 1 -->
            <div class="min-w-full h-full relative carousel-slide">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <img src="{{ asset('images/ca.png') }}" alt="Agriculture durable" class="w-full h-full object-cover">
                <div class="absolute inset-0 flex items-center justify-center px-6 md:px-12 lg:px-20">
                    <div class="w-full max-w-5xl text-white text-center">
                        <span class="text-yellow-400 font-semibold text-lg md:text-xl lg:text-2xl mb-3 md:mb-4 block">Bienvenue au COASP Pour une Agriculture Durable en Afrique de l'Ouest</span>
                        <h1 class="text-white text-3xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-4 md:mb-6 leading-tight">Préservons les semences paysannes et développons l'agroécologie paysanne
                        </h1>
                        <p class="text-lg md:text-xl lg:text-2xl mb-6 md:mb-8 max-w-4xl mx-auto">Découvrez notre engagement envers une souveraineté semencière renforcée et une agriculture équitable.</p>
                        <a href="{{ route('about') }}" class="bg-green-700 hover:bg-white hover:text-green-700 text-white px-8 py-3 md:px-10 md:py-4 lg:px-12 lg:py-4 rounded-md text-base md:text-lg lg:text-xl font-medium transition duration-300 inline-block">En Savoir Plus</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="min-w-full h-full relative carousel-slide">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <img src="{{ asset('images/ca1.png') }}" alt="Semences paysannes" class="w-full h-full object-cover">
                <div class="absolute inset-0 flex items-center justify-center px-6 md:px-12 lg:px-20">
                    <div class="w-full max-w-6xl text-white text-center">
                        <span class="text-yellow-400 font-semibold text-base md:text-lg lg:text-xl mb-3 md:mb-4 block">Souveraineté Semencière Paysanne</span>
                        <h1 class="text-white text-3xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-4 md:mb-6 leading-tight">Foire de semences paysannes</h1>
                        <p class="text-base md:text-lg lg:text-xl xl:text-2xl mb-6 md:mb-8 max-w-5xl mx-auto">Rejoignez-nous dans la préservation de notre biodiversité agricole.</p>
                        <a href="{{ route('contact') }}" class="bg-green-700 hover:bg-white hover:text-green-700 text-white px-8 py-3 md:px-10 md:py-4 lg:px-12 lg:py-5 rounded-md text-base md:text-lg lg:text-xl font-medium transition duration-300 inline-block">Contactez-nous</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button id="prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-green-700 hover:bg-opacity-100 text-white rounded-full p-3 transition-all duration-300 z-10">
            <i data-feather="chevron-left" class="w-6 h-6"></i>
        </button>
        <button id="next" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-green-700 hover:bg-opacity-100 text-white rounded-full p-3 transition-all duration-300 z-10">
            <i data-feather="chevron-right" class="w-6 h-6"></i>
        </button>

        <!-- Pagination Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition duration-300 slider-dot" data-index="0"></button>
            <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition duration-300 slider-dot" data-index="1"></button>
        </div>
    </div>

    <!-- Section Piliers d'Action -->
    <section class="py-16 px-4 md:px-8 lg:px-16 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- En-tête de section -->
            <div class="text-center mb-12">
                <h2 class="text-yellow-500 text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Engagement Intégré pour une Agriculture Durable</h2>
                <p class="text-gray-700 text-base md:text-lg lg:text-xl max-w-5xl mx-auto">Piliers d'Action du COASP : Cultiver, Renforcer, Plaider et Communiquer Semences Paysannes en Action</p>
            </div>

            <!-- Grille de cartes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Carte 1: Foires et Conférences -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/f1.jpeg') }}" alt="Foires et Conférences" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-12 h-12 text-green-600 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Foires et Conférences</h3>

                        <p class="text-gray-600 text-sm mb-6">Organisation de foires et de conférences pour favoriser la concertation entre les acteurs de la semence paysanne. Sensibilisation des agriculteurs, des organisations locales et de la société civile aux enjeux de la souveraineté semencière.</p>

                        <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-md transition duration-300">
                            Voir Plus <span class="ml-2">»</span>
                        </a>
                    </div>
                </div>

                <!-- Carte 2: Formation et Renforcement des Capacités -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/f2.jpg') }}" alt="Formation et Renforcement" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-12 h-12 text-green-600 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">FORMATION ET RENFORCEMENT DES CAPACITÉS</h3>

                        <p class="text-gray-600 text-sm mb-6">Dispensation de formations pratiques en Agroécologie Renforcement des compétences des agriculteurs en gestion durable des semences.</p>

                        <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-md transition duration-300">
                            Voir Plus <span class="ml-2">»</span>
                        </a>
                    </div>
                </div>

                <!-- Carte 3: Plaidoyer et Veille Juridique -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/f3.jpg') }}" alt="Plaidoyer et Veille Juridique" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-12 h-12 text-green-600 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">PLAIDOYER ET VEILLE JURIDIQUE</h3>

                        <p class="text-gray-600 text-sm mb-6">Engagement dans des actions de plaidoyer auprès des institutions, Mise en place d'une veille juridique et réglementaire sur les semences paysannes pour protéger les droits des agriculteurs.</p>

                        <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-md transition duration-300">
                            Voir Plus <span class="ml-2">»</span>
                        </a>
                    </div>
                </div>

                <!-- Carte 4: Communication -->
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/f4.jpeg') }}" alt="Communication" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6 text-center">
                        <div class="flex justify-center mb-4">
                            <svg class="w-12 h-12 text-green-600 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">COMMUNICATION</h3>

                        <p class="text-gray-600 text-sm mb-6">Utilisation d'outils de communication pour rendre les activités du COASP plus visibles et partager des informations sur les pratiques agroécologiques.</p>

                        <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-md transition duration-300">
                            Voir Plus <span class="ml-2">»</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section À Propos -->
    <section class="py-16 px-4 md:px-8 lg:px-16 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Colonne Gauche: Images avec overlay -->
                <div class="relative pb-20 md:pb-24 animate-slideInLeft">
                    <!-- Image 1 (en haut) -->
                    <div class="w-full mb-3 group overflow-hidden rounded-lg">
                        <img src="{{ asset('images/b1.jpg') }}" alt="Agriculture paysanne" class="w-full h-72 md:h-80 lg:h-96 rounded-lg shadow-xl object-cover transform transition-transform duration-700 group-hover:scale-110">
                    </div>

                    <!-- Image 2 (en bas) -->
                    <div class="w-full group overflow-hidden rounded-lg">
                        <img src="{{ asset('images/b2.jpg') }}" alt="Marché local" class="w-full h-56 md:h-64 lg:h-72 rounded-lg shadow-xl object-cover transform transition-transform duration-700 group-hover:scale-110">
                    </div>

                    <!-- Rectangle jaune avec gradient animé et effet shimmer -->
                    <div class="absolute left-0 w-10/12 md:w-9/12 lg:w-4/5 gradient-shimmer rounded-tr-3xl shadow-2xl hover:shadow-yellow-500/50 transition-all duration-500 animate-float" style="top: 65%; min-height: 280px;">
                        <div class="p-6 md:p-7 lg:p-9 bg-yellow-400/95 rounded-tr-3xl backdrop-blur-sm">
                            <p class="text-white text-xs md:text-sm lg:text-base leading-relaxed mb-5 md:mb-6 font-normal drop-shadow-md">
                                La défense des principes vrais de l'agroécologie est importante. Il ne s'agit pas de suivre une mode, mais de redresser le déséquilibre monstrueux causé par le système marchand qui a amené à tant d'injustices, et de rétablir l'autonomie.
                            </p>

                            <!-- Profil auteur -->
                            <div class="flex items-center space-x-2 md:space-x-3 group">
                                <img src="{{ asset('images/b3.jpg') }}" alt="Alihou Ndiaye" class="w-10 h-10 md:w-14 md:h-14 rounded-full border-4 border-white object-cover shadow-lg transform transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                                <div>
                                    <h4 class="text-white font-bold text-sm md:text-base lg:text-lg drop-shadow-md">Alihou Ndiaye</h4>
                                    <p class="text-white/90 text-xs md:text-sm drop-shadow-md">coordinateur sous-régional COASP</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Colonne Droite: Contenu -->
                <div class="space-y-6 md:space-y-8 animate-slideInRight">
                    <!-- En-tête -->
                    <div class="animate-fadeInUp">
                        <p class="text-yellow-500 font-semibold text-xs md:text-sm mb-2 uppercase tracking-wider animate-pulse">À PROPOS DE NOTRE ORGANISATION</p>
                        <h2 class="text-transparent bg-clip-text bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900 text-2xl md:text-3xl lg:text-4xl font-bold mb-4">Qu'est ce que l'AEP?</h2>
                        <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                            À la différence de l'agriculture conventionnelle, l'agroécologie paysanne renforce et maintien la biodiversité. Elle est nourrie par le patrimoine immatériel et matériel légué à l'humanité.
                        </p>
                    </div>

                    <!-- Carte 1: Agriculture & Écologie -->
                    <div class="bg-white rounded-xl p-5 md:p-6 border-2 border-gray-100 shadow-lg card-hover-effect hover:border-green-200 hover:shadow-2xl hover:shadow-green-100/50 group">
                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center shadow-md transform transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-6 h-6 md:w-7 md:h-7 text-green-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-gray-900 text-lg md:text-xl font-bold mb-2 group-hover:text-green-700 transition-colors duration-300">Agriculture & Écologie</h3>
                                <p class="text-gray-600 text-xs md:text-sm italic leading-relaxed">
                                    Fusionnant harmonieusement l'agriculture et l'écologie, nous promouvons des pratiques durables et respectueuses de l'environnement.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte 2: Cultures & Fruits -->
                    <div class="bg-white rounded-xl p-5 md:p-6 border-2 border-gray-100 shadow-lg card-hover-effect hover:border-green-200 hover:shadow-2xl hover:shadow-green-100/50 group">
                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center shadow-md transform transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                                    <svg class="w-6 h-6 md:w-7 md:h-7 text-green-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-gray-900 text-lg md:text-xl font-bold mb-2 group-hover:text-green-700 transition-colors duration-300">Cultures & Fruits</h3>
                                <p class="text-gray-600 text-xs md:text-sm italic leading-relaxed">
                                    Nous travaillons main dans la main avec les agriculteurs locaux pour encourager des méthodes de culture innovantes.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton avec effet animé -->
                    <div class="pt-2">
                        <a href="{{ route('about') }}" class="relative inline-block bg-gradient-to-r from-green-700 to-green-600 hover:from-green-800 hover:to-green-700 text-black font-semibold px-6 py-3 md:px-8 md:py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-2xl hover:shadow-green-500/50 transform hover:-translate-y-1 hover:scale-105 text-sm md:text-base group overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            En savoir plus
                            <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Galerie COASP -->
    <section class="py-16 px-4 md:px-8 lg:px-16 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- En-tête -->
            <div class="text-center mb-12">
                <p class="text-yellow-500 font-semibold text-sm md:text-base mb-2 uppercase tracking-wide">Nos Événements</p>
                <h2 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Galerie COASP</h2>
                <p class="text-gray-600 text-base md:text-lg max-w-3xl mx-auto">
                    Découvrez les moments forts des foires sous-régionales ouest-africaines des semences paysannes
                </p>
            </div>

            <!-- Swiper Slider -->
            <div class="swiper gallerySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 - Foire 2014 -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/ASPSP_2014_journal_foire.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/foire_2014.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">Foire 2014</p>
                                        <p class="text-sm">Journal de la Foire</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 2 - 7ème Edition 2022 -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/Declaration-de-la-7eme-edition-Foire-COASP-2022.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/7eme_Edition_2022.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">7ème Edition 2022</p>
                                        <p class="text-sm">Déclaration de la Foire COASP</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 3 - Déclaration Djimini 2018 (FR) -->
                    <div class="swiper-slide">
                        <a href="{{asset('docs/Declaration-Djimini-2018-finale.pdf')}}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/Declaration_Djimini_2018.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">Déclaration Djimini 2018</p>
                                        <p class="text-sm">Version Française</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 4 - Déclaration Djimini 2018 (EN) -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/Declaration-Djimini-Peasant-Seed-Fair-2018-English.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/Djimini_Declaration_2018.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">Djimini Declaration 2018</p>
                                        <p class="text-sm">English Version</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 5 - 4ème Edition -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/DECLARATION_Foire_Ouest_Africaine_4eme-Edition.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/4eme_Edition.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">4ème Edition</p>
                                        <p class="text-sm">Foire Ouest-Africaine</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 6 - Foire 2011 -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/Foire-semences-Paysannes-2011-Declaration.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/Foire_2011.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">Foire 2011</p>
                                        <p class="text-sm">Déclaration</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Slide 7 - 3ème Foire Sous-Régionale -->
                    <div class="swiper-slide">
                        <a href="{{ asset('docs/grain-4545-3eme-foire-sous-regionale-ouest-africaine-des-semences-paysannes.pdf') }}" target="_blank" class="block">
                            <div class="swiper-slide-image" style="background-image: url('{{ asset('images/3eme_Foire_Sous-Regionale.jpg') }}')">
                                <div class="image-overlay">
                                    <div class="text-center text-white px-6">
                                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-xl font-semibold mb-2">3ème Foire Sous-Régionale</p>
                                        <p class="text-sm">Grain Magazine</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Navigation arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Section Équipe -->
    <section class="py-16 px-4 md:px-8 lg:px-16 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- En-tête -->
            <div class="text-center mb-12 animate-slideInUp">
                <p class="text-yellow-500 font-semibold text-sm md:text-base mb-2 uppercase tracking-wide">Excellent membre de l'équipe</p>
                <h2 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold">Rencontrez notre superbe équipe</h2>
            </div>

            <!-- Grille des membres - 4 colonnes -->
            <!-- Section Équipe -->
            <section class="py-16 px-4 md:px-8 lg:px-16 bg-white">
                <div class="max-w-7xl mx-auto">
                    <!-- En-tête -->
                    <div class="text-center mb-12 animate-slideInUp">
                        <p class="text-yellow-500 font-semibold text-sm md:text-base mb-2 uppercase tracking-wide">Excellent membre de l'équipe</p>
                        <h2 class="text-gray-900 text-3xl md:text-4xl lg:text-5xl font-bold">Rencontrez notre superbe équipe</h2>
                    </div>

                    @php
                        // Récupérer les membres dynamiques de la base de données
                        $dynamicMembers = \App\Models\TeamMember::active()->ordered()->get();
                        $totalMembers = 2 + $dynamicMembers->count(); // 2 statiques + dynamiques
                        $showMoreButton = $totalMembers > 4;

                        // Limiter à 2 membres dynamiques pour l'affichage initial si on dépasse 4
                        $displayedDynamicMembers = $showMoreButton ? $dynamicMembers->take(2) : $dynamicMembers;
                    @endphp

                        <!-- Grille des membres - 4 colonnes -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="team-grid">
                        <!-- Carte 1: Alihou Ndiaye (STATIQUE) -->
                        <div class="relative group team-card">
                            <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                <!-- Image -->
                                <div class="relative h-72 overflow-hidden">
                                    <img src="{{ asset('images/b3.jpg') }}" alt="Alihou Ndiaye" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">

                                    <!-- Overlay gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    <!-- Icônes sociales verticales -->
                                    <div class="absolute right-4 top-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                        <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden">
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300">
                                                <i class="fab fa-facebook-f text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-twitter text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-linkedin-in text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-instagram text-sm"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Bouton de partage -->
                                    <button onclick="shareProfile('Alihou Ndiaye')" class="absolute bottom-4 right-4 bg-green-600 hover:bg-green-700 text-white p-2.5 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100">
                                        <i class="fas fa-share-alt text-sm"></i>
                                    </button>
                                </div>

                                <!-- Informations -->
                                <div class="p-4 bg-gradient-to-br from-gray-50 to-white">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Alihou Ndiaye</h3>
                                    <p class="text-gray-600 text-xs">coordinateur sous-régional COASP</p>
                                </div>
                            </div>
                        </div>

                        <!-- Carte 2: Omer Richard Métogbé Agoligan (STATIQUE) -->
                        <div class="relative group team-card">
                            <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                <!-- Image -->
                                <div class="relative h-72 overflow-hidden">
                                    <img src="{{ asset('images/b4.jpg') }}" alt="Omer Richard Métogbé Agoligan" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">

                                    <!-- Overlay gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                    <!-- Icônes sociales verticales -->
                                    <div class="absolute right-4 top-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                        <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden">
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300">
                                                <i class="fab fa-facebook-f text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-twitter text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-linkedin-in text-sm"></i>
                                            </a>
                                            <a href="#" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                <i class="fab fa-instagram text-sm"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Bouton de partage -->
                                    <button onclick="shareProfile('Omer Richard Métogbé Agoligan')" class="absolute bottom-4 right-4 bg-green-600 hover:bg-green-700 text-white p-2.5 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100">
                                        <i class="fas fa-share-alt text-sm"></i>
                                    </button>
                                </div>

                                <!-- Informations -->
                                <div class="p-4 bg-gradient-to-br from-gray-50 to-white">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Omer Richard Métogbé Agoligan</h3>
                                    <p class="text-gray-600 text-xs">Assistant du coordinateur sous-régional COASP</p>
                                </div>
                            </div>
                        </div>

                        <!-- Membres DYNAMIQUES de la base de données -->
                        @foreach($displayedDynamicMembers as $member)
                            <div class="relative group team-card">
                                <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                    <!-- Image -->
                                    <div class="relative h-72 overflow-hidden">
                                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">

                                        <!-- Overlay gradient -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        <!-- Icônes sociales verticales -->
                                        @if($member->facebook_url || $member->twitter_url || $member->linkedin_url || $member->instagram_url)
                                            <div class="absolute right-4 top-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                                <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden">
                                                    @if($member->facebook_url)
                                                        <a href="{{ $member->facebook_url }}" target="_blank" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300">
                                                            <i class="fab fa-facebook-f text-sm"></i>
                                                        </a>
                                                    @endif

                                                    @if($member->twitter_url)
                                                        <a href="{{ $member->twitter_url }}" target="_blank" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                            <i class="fab fa-twitter text-sm"></i>
                                                        </a>
                                                    @endif

                                                    @if($member->linkedin_url)
                                                        <a href="{{ $member->linkedin_url }}" target="_blank" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                            <i class="fab fa-linkedin-in text-sm"></i>
                                                        </a>
                                                    @endif

                                                    @if($member->instagram_url)
                                                        <a href="{{ $member->instagram_url }}" target="_blank" class="flex items-center justify-center w-10 h-10 text-white hover:bg-yellow-500 transition-colors duration-300 border-t border-yellow-300">
                                                            <i class="fab fa-instagram text-sm"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Bouton de partage -->
                                        <button onclick="shareProfile('{{ $member->name }}')" class="absolute bottom-4 right-4 bg-green-600 hover:bg-green-700 text-white p-2.5 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-110 opacity-0 group-hover:opacity-100">
                                            <i class="fas fa-share-alt text-sm"></i>
                                        </button>
                                    </div>

                                    <!-- Informations -->
                                    <div class="p-4 bg-gradient-to-br from-gray-50 to-white">
                                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
                                        <p class="text-gray-600 text-xs">{{ $member->position }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bouton "Voir Plus" (affiché si plus de 4 membres au total) -->
                    @if($showMoreButton)
                        <div class="text-center mt-10">
                            <button onclick="openTeamModal()"
                                    class="bg-green-500 hover:bg-green-600 text-black font-semibold px-8 py-3 rounded-xl transition-all duration-300 shadow-lg hover:shadow-2xl hover:shadow-green-500/50 transform hover:-translate-y-1 hover:scale-105">

                                <i class="fas fa-users mr-2"></i>
                                Voir tous les membres ({{ $totalMembers }})
                            </button>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Modal Popup pour tous les membres -->
            <div id="teamModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden overflow-y-auto" onclick="closeTeamModal(event)">
                <div class="min-h-screen px-4 py-8 flex items-center justify-center">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-7xl w-full mx-auto transform transition-all" onclick="event.stopPropagation()">
                        <!-- Header du modal -->
                        <div class="bg-gradient-to-r from-green-700 to-green-600 px-6 py-5 rounded-t-2xl flex justify-between items-center">
                            <div>
                                <h3 class="text-2xl font-bold text-white">Notre Équipe Complète</h3>
                                <p class="text-green-100 text-sm mt-1">{{ $totalMembers }} membres</p>
                            </div>
                            <button onclick="closeTeamModal()" class="text-white hover:bg-white/20 rounded-full p-2 transition-colors duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Contenu du modal -->
                        <div class="p-6 max-h-[70vh] overflow-y-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Membres statiques dans le modal -->
                                <div class="relative group">
                                    <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                        <div class="relative h-64 overflow-hidden">
                                            <img src="{{ asset('images/b3.jpg') }}" alt="Alihou Ndiaye" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                            <!-- Icônes sociales dans le modal -->
                                            <div class="absolute right-3 top-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden flex flex-col">
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors">
                                                        <i class="fab fa-facebook-f text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-twitter text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-linkedin-in text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-instagram text-xs"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 bg-gradient-to-br from-gray-50 to-white">
                                            <h4 class="text-base font-bold text-gray-900 mb-1">Alihou Ndiaye</h4>
                                            <p class="text-gray-600 text-xs">coordinateur sous-régional COASP</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                        <div class="relative h-64 overflow-hidden">
                                            <img src="{{ asset('images/b4.jpg') }}" alt="Omer Richard Métogbé Agoligan" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                            <div class="absolute right-3 top-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden flex flex-col">
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors">
                                                        <i class="fab fa-facebook-f text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-twitter text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-linkedin-in text-xs"></i>
                                                    </a>
                                                    <a href="#" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                        <i class="fab fa-instagram text-xs"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 bg-gradient-to-br from-gray-50 to-white">
                                            <h4 class="text-base font-bold text-gray-900 mb-1">Omer Richard Métogbé Agoligan</h4>
                                            <p class="text-gray-600 text-xs">Assistant du coordinateur sous-régional COASP</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tous les membres dynamiques dans le modal -->
                                @foreach($dynamicMembers as $member)
                                    <div class="relative group">
                                        <div class="relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                                            <div class="relative h-64 overflow-hidden">
                                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                                @if($member->facebook_url || $member->twitter_url || $member->linkedin_url || $member->instagram_url)
                                                    <div class="absolute right-3 top-3 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                        <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden flex flex-col">
                                                            @if($member->facebook_url)
                                                                <a href="{{ $member->facebook_url }}" target="_blank" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors">
                                                                    <i class="fab fa-facebook-f text-xs"></i>
                                                                </a>
                                                            @endif

                                                            @if($member->twitter_url)
                                                                <a href="{{ $member->twitter_url }}" target="_blank" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                                    <i class="fab fa-twitter text-xs"></i>
                                                                </a>
                                                            @endif

                                                            @if($member->linkedin_url)
                                                                <a href="{{ $member->linkedin_url }}" target="_blank" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                                    <i class="fab fa-linkedin-in text-xs"></i>
                                                                </a>
                                                            @endif

                                                            @if($member->instagram_url)
                                                                <a href="{{ $member->instagram_url }}" target="_blank" class="flex items-center justify-center w-8 h-8 text-white hover:bg-yellow-500 transition-colors border-t border-yellow-300">
                                                                    <i class="fab fa-instagram text-xs"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="p-3 bg-gradient-to-br from-gray-50 to-white">
                                                <h4 class="text-base font-bold text-gray-900 mb-1">{{ $member->name }}</h4>
                                                <p class="text-gray-600 text-xs">{{ $member->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Footer du modal -->
                        <div class="bg-gray-50 px-6 py-4 rounded-b-2xl text-center">
                            <button onclick="closeTeamModal()" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Fonction pour ouvrir le modal
                function openTeamModal() {
                    const modal = document.getElementById('teamModal');
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Empêcher le scroll de la page
                }

                // Fonction pour fermer le modal
                function closeTeamModal(event) {
                    // Si event est undefined, c'est qu'on a cliqué sur le bouton fermer
                    // Si event.target === event.currentTarget, c'est qu'on a cliqué sur le fond noir
                    if (!event || event.target === event.currentTarget || event.target.closest('button')) {
                        const modal = document.getElementById('teamModal');
                        modal.classList.add('hidden');
                        document.body.style.overflow = ''; // Réactiver le scroll
                    }
                }

                // Fermer avec la touche Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        closeTeamModal();
                    }
                });

                // Fonction de partage
                function shareProfile(name) {
                    if (navigator.share) {
                        navigator.share({
                            title: name + ' - COASP',
                            text: 'Découvrez ' + name + ' de notre équipe COASP',
                            url: window.location.href
                        }).catch(err => console.log('Erreur de partage:', err));
                    } else {
                        // Fallback: copier l'URL dans le presse-papier
                        const url = window.location.href;
                        navigator.clipboard.writeText(url).then(() => {
                            alert('Lien copié dans le presse-papier!');
                        });
                    }
                }
            </script>




        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.gallerySwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,

            // Autoplay
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },

            // Pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Responsive breakpoints
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },

            // Effects
            effect: 'slide',
            speed: 500,
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('slider');
            const slides = document.querySelectorAll('#slider > div');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');

            let currentIndex = 0;
            const slideCount = slides.length;
            let autoSlideInterval;

            function initSlider() {
                updateSlider();
                startAutoSlide();
            }

            function updateSlider() {
                slider.style.transform = `translateX(-${currentIndex * 100}%)`;

                dots.forEach((dot, index) => {
                    dot.classList.toggle('bg-opacity-100', index === currentIndex);
                    dot.classList.toggle('bg-opacity-50', index !== currentIndex);
                });
            }

            function goToSlide(index) {
                currentIndex = (index + slideCount) % slideCount;
                updateSlider();
                resetAutoSlide();
            }

            function nextSlide() {
                goToSlide(currentIndex + 1);
            }

            function prevSlide() {
                goToSlide(currentIndex - 1);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000);
            }

            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    goToSlide(parseInt(dot.getAttribute('data-index')));
                });
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') nextSlide();
                if (e.key === 'ArrowLeft') prevSlide();
            });

            slider.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            slider.addEventListener('mouseleave', () => {
                startAutoSlide();
            });

            initSlider();

            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
@endpush
