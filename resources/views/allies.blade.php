@extends('layouts.app')

@section('title', 'Nos Alliés - COASP')

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <!-- Section Alliés avec Carrousel -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Titre de la section -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Nos Alliés</h2>
                <p class="text-lg text-gray-600">Ensemble pour l'agro-écologie et la souveraineté alimentaire</p>
                <div class="w-24 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>

            <!-- Carrousel Swiper -->
            <div class="relative">
                <div class="swiper alliesSwiper">
                    <div class="swiper-wrapper">
                        <!-- Slide: ACRA -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Logo-ACRA.png')}}"
                                        alt="acra-coasp-allié-agro-écologie"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">ACRA</h3>
                            </div>
                        </div>

                        <!-- Slide: AFDI -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/AFSA.png')}}"
                                        alt="afdi-coasp-allié-agriculture"
                                        class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">AFDI</h3>
                            </div>
                        </div>

                        <!-- Slide 3 - CGLTE AO -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/CGLTE-AO.jpeg')}}"
                                     alt="CGLTE AO"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">CGLTE AO</h4>
                            </div>
                        </div>

                        <!-- Slide 4 - COPAGEN -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/COPAGEN.jpeg')}}"
                                     alt="COPAGEN"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">COPAGEN</h4>
                            </div>
                        </div>

                        <!-- Slide 5 - DYTAES -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/DYTAES.jpeg')}}"
                                     alt="DYTAES"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">DYTAES</h4>
                            </div>
                        </div>

                        <!-- Slide 6 - Enda Pronat -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/Logo-Enda-Pronat.jpeg')}}"
                                     alt="Enda Pronat"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">Enda Pronat</h4>
                            </div>
                        </div>

                        <!-- Slide 7 - Fahamu Africa -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/Fahamu-Africa.jpeg')}}"
                                     alt="Fahamu Africa"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">Fahamu Africa</h4>
                            </div>
                        </div>

                        <!-- Slide 8 - INADES FORMATION -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/INADES-FORMATION.png')}}"
                                     alt="INADES FORMATION"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">INADES FORMATION</h4>
                            </div>
                        </div>

                        <!-- Slide 9 - La Via Campesina -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/LA-VIA-CAMPESINA.jpeg')}}"
                                     alt="La Via Campesina"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">La Via Campesina</h4>
                            </div>
                        </div>

                        <!-- Slide 10 - RBM -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/RBM.jpeg')}}"
                                     alt="RBM"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">RBM</h4>
                            </div>
                        </div>

                        <!-- Slide 11 - RSP -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-8 flex flex-col items-center justify-center h-64 hover:shadow-xl transition-shadow duration-300">
                                <img
                                    src="{{asset('images/RSP.png')}}"
                                     alt="RSP"
                                     class="max-h-32 w-auto object-contain mb-4">
                                <h4 class="text-lg font-semibold text-gray-700 text-center">RSP</h4>
                            </div>
                        </div>











                        {{-- Alliés ajoutés depuis la base de données --}}
                        @if(isset($dbAllies) && $dbAllies->count() > 0)
                            @foreach($dbAllies as $ally)
                                <div class="swiper-slide">
                                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                        <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                            @if($ally->logo)
                                                <img
                                                    src="{{ asset('storage/' . $ally->logo) }}"
                                                    alt="{{ $ally->name }}"
                                                    class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                                                />
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded">
                                                    <span class="text-gray-400 text-xs">{{ substr($ally->name, 0, 2) }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-sm font-semibold text-gray-700 text-center">{{ $ally->name }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Boutons de navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Section informative optionnelle -->
            <div class="mt-16 text-center max-w-3xl mx-auto">
                <p class="text-gray-600 leading-relaxed">
                    Nos alliés partagent notre vision d'une agriculture durable et respectueuse de l'environnement.
                    Ensemble, nous œuvrons pour la souveraineté alimentaire en Afrique de l'Ouest et la promotion
                    des pratiques agro-écologiques.
                </p>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation du carrousel des alliés
            const alliesSwiper = new Swiper('.alliesSwiper', {
                // Configuration de base
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                speed: 1000,
                grabCursor: true,
                centeredSlides: false,

                // Par défaut (mobile)
                slidesPerView: 2,
                spaceBetween: 15,

                // Navigation
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // Pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },

                // Responsive breakpoints
                breakpoints: {
                    // Mobile large
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    // Tablette
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 25,
                    },
                    // Desktop
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                    // Large Desktop
                    1280: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                },

                // Effet de parallaxe
                parallax: true,

                // Accessibilité
                a11y: {
                    prevSlideMessage: 'Allié précédent',
                    nextSlideMessage: 'Allié suivant',
                },
            });

            // Animation au survol - Pause l'autoplay
            const slides = document.querySelectorAll('.alliesSwiper .swiper-slide');
            slides.forEach(slide => {
                slide.addEventListener('mouseenter', () => {
                    alliesSwiper.autoplay.stop();
                });
                slide.addEventListener('mouseleave', () => {
                    alliesSwiper.autoplay.start();
                });
            });
        });
    </script>
@endpush
