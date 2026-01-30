@extends('layouts.app')

@section('title', 'Nos Partenaires - COASP')

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
    <!-- Section Partenaires avec Carrousel -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Titre de la section -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Nos Partenaires</h2>
                <p class="text-lg text-gray-600">Ils nous font confiance et nous soutiennent dans notre mission</p>
                <div class="w-24 h-1 bg-green-600 mx-auto mt-4"></div>
            </div>

            <!-- Carrousel Swiper -->
            <div class="relative">
                <div class="swiper partnersSwiper">
                    <div class="swiper-wrapper">
                        <!-- Slide: Ambassade de France au Sénégal -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{ asset('images/Ambassade-de-France-au-Senegal.jpeg') }}"
                                        alt="ambassade-de-france-au-sénégal-coasp-agro-écologie-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Ambassade de France au Sénégal</h3>
                            </div>
                        </div>

                        <!-- Slide: Autre Terre -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{ asset('images/Autre-Terre.png') }}"
                                        alt="autre-terre-coasp-partenaire-agro-écologie"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Autre Terre</h3>
                            </div>
                        </div>

                        <!-- Slide: Fian International -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/FIAN-international.jpeg')}}"
                                        alt="fian-international-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Fian International</h3>
                            </div>
                        </div>

                        <!-- Slide: Fondation de France -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Fondation-de-France.jpeg')}}"
                                        alt="fondation-de-france-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Fondation de France</h3>
                            </div>
                        </div>

                        <!-- Slide: Fondation Léa Nature -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Lea-Nature.jpeg')}}"
                                        alt="fondation-léa-nature-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Fondation Léa Nature</h3>
                            </div>
                        </div>

                        <!-- Slide: Fondation Nature & Découverte -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/logo-fondation-Nature-et-decouvertes.jpg')}}"
                                        alt="fondation-nature-découverte-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Fondation Nature & Découverte</h3>
                            </div>
                        </div>

                        <!-- Slide: FGC -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/FGC.jpeg')}}"
                                        alt="fgc-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">FGC</h3>
                            </div>
                        </div>

                        <!-- Slide: Heidehof Stiftung -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Heidehof-Stiftung.png')}}"
                                        alt="heidehof-stiftung-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Heidehof Stiftung</h3>
                            </div>
                        </div>

                        <!-- Slide: HEKS EPER -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/HEKS-EPER.jpeg')}}"
                                        alt="heks-eper-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">HEKS EPER</h3>
                            </div>
                        </div>

                        <!-- Slide: MISEREOR -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/MISEREOR.png')}}"
                                        alt="misereor-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">MISEREOR</h3>
                            </div>
                        </div>

                        <!-- Slide: New Field -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/New-Field.png')}}"
                                        alt="new-field-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">New Field</h3>
                            </div>
                        </div>

                        <!-- Slide: OXFAM NOVIB -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/OXFAM-NOVIB.jpeg')}}"
                                        alt="oxfam-novib-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">OXFAM NOVIB</h3>
                            </div>
                        </div>

                        <!-- Slide: OSIWA -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/OSIWA.png')}}"
                                        alt="osiwa-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">OSIWA</h3>
                            </div>
                        </div>

                        <!-- Slide: ROSA LUXEMBOURG -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/RLS.png')}}"
                                        alt="rosa-luxembourg-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">ROSA LUXEMBOURG</h3>
                            </div>
                        </div>

                        <!-- Slide: Sème l'avenir -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Seme-lavenir.png')}}"
                                        alt="sème-l-avenir-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Sème l'avenir</h3>
                            </div>
                        </div>

                        <!-- Slide: SWISSAID -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/SWISSAID.jpeg')}}"
                                        alt="swissaid-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">SWISSAID</h3>
                            </div>
                        </div>

                        <!-- Slide: TAPSA SAHEL -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/TAPSA-SAHEL.jpeg')}}"
                                        alt="tapsa-sahel-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">TAPSA SAHEL</h3>
                            </div>
                        </div>

                        <!-- Slide: Terre Solidaire -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Terre-Solidaire.jpeg')}}"
                                        alt="terre-solidaire-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">Terre Solidaire</h3>
                            </div>
                        </div>

                        <!-- Slide: THOUSAND CURRENTS -->
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                    <img
                                        src="{{asset('images/Thousand-currents.png')}}"
                                        alt="thousand-currents-coasp-partenaire"
                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                    />
                                </div>
                                <h3 class="text-sm font-semibold text-gray-700 text-center">THOUSAND CURRENTS</h3>
                            </div>
                        </div>

                        {{-- Partenaires ajoutés depuis la base de données --}}
                        @if(isset($dbPartners) && $dbPartners->count() > 0)
                            @foreach($dbPartners as $partner)
                                <div class="swiper-slide">
                                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 w-full h-48 flex flex-col items-center justify-center group">
                                        <div class="w-full h-32 flex items-center justify-center mb-3 overflow-hidden">
                                            @if($partner->logo)
                                                <img
                                                    src="{{ asset('storage/' . $partner->logo) }}"
                                                    alt="{{ $partner->name }}"
                                                    class="max-w-full max-h-full object-contain transition-all duration-300"
                                                />
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded">
                                                    <span class="text-gray-400 text-xs">{{ substr($partner->name, 0, 2) }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-sm font-semibold text-gray-700 text-center">{{ $partner->name }}</h3>
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

        </div>
    </section>
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialisation du carrousel avec Swiper
        const partnersSwiper = new Swiper('.partnersSwiper', {
            // Configuration de base
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 800,
            grabCursor: true,

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
            },

            // Responsive breakpoints
            breakpoints: {
                // Mobile
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                // Tablette
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                // Desktop
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
                // Large desktop
                1280: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                }
            }
        });
    </script>
@endpush
