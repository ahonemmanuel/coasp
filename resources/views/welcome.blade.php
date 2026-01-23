@extends('layouts.app')

@section('content')

    {{-- SLIDER REVOLUTION --}}
    <section class="relative w-full overflow-hidden">
        <div class="swiper homeSlider">
            <div class="swiper-wrapper">

                {{-- Slide 1 --}}
                <div class="swiper-slide relative h-[900px] md:h-[700px]">
                    <img src="{{ asset('images/slides/90.png') }}" alt="Slide 1" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="container mx-auto px-4 h-full relative z-10">
                        <div class="flex items-center h-full">
                            <div class="max-w-5xl">
                                <div class="text-[#e6d54f] font-['Nunito'] font-semibold text-[30px] md:text-[24px] leading-[28px] mb-4 animate-[fadeInUp_1s]">
                                    Bienvenue au COASP - Pour une Agriculture Durable en Afrique de l'Ouest
                                </div>
                                <h1 class="font-['Nunito'] font-bold text-white text-[63px] md:text-[52px] leading-[72px] md:leading-[59px] mb-6 animate-[fadeInLeft_1.2s]">
                                    Préservons les semences paysannes et développons l'agroécologie paysanne
                                </h1>
                                <p class="font-['Poppins'] text-white text-[18px] leading-[28px] mb-8 max-w-3xl animate-[fadeInUp_1s_0.5s]">
                                    Découvrez notre engagement envers une souveraineté semencière renforcée et une agriculture équitable.
                                </p>
                                <a href="{{ route('about') }}" class="inline-block bg-[#297d53] text-white font-['Poppins'] font-semibold text-[16px] px-[25px] py-[15px] rounded-[5px] hover:bg-white hover:text-black transition-all duration-300 animate-[fadeInUp_1.2s_1s]">
                                    En Savoir Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="swiper-slide relative h-[900px] md:h-[700px]">
                    <img src="{{ asset('images/slides/coasp-image-agro-ecologie-6.png') }}" alt="Slide 2" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="container mx-auto px-4 h-full relative z-10">
                        <div class="flex items-center justify-center h-full text-center">
                            <div class="max-w-4xl">
                                <div class="text-[#e6d54f] font-['Nunito'] font-semibold text-[30px] md:text-[24px] leading-[28px] mb-4 animate-[fadeIn_1s]">
                                    Souveraineté Semencière Paysanne
                                </div>
                                <h1 class="font-['Nunito'] font-bold text-white text-[72px] md:text-[59px] leading-[82px] md:leading-[67px] mb-6 animate-[fadeInDown_1.2s]">
                                    Foire de semences paysanes
                                </h1>
                                <p class="font-['Poppins'] text-white text-[18px] leading-[28px] mb-8 mx-auto max-w-2xl animate-[fadeInUp_1s_0.5s]">
                                    Rejoignez-nous dans la préservation de notre biodiversité agricole.
                                </p>
                                <a href="{{ route('about') }}" class="inline-block bg-[#297d53] text-white font-['Poppins'] font-semibold text-[16px] px-[25px] py-[15px] rounded-[5px] hover:bg-white hover:text-black transition-all duration-300 animate-[fadeInUp_1.2s_1s]">
                                    Contactez-nous
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Navigation --}}
            <div class="swiper-button-next !text-white"></div>
            <div class="swiper-button-prev !text-white"></div>
            <div class="swiper-pagination !bottom-8"></div>
        </div>
    </section>

    {{-- SECTION TITRE PILIERS --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="text-[#e6d54f] font-['Poppins'] font-medium text-[16px] mb-4">
                    Engagement Intégré pour une Agriculture Durable
                </div>
                <h1 class="font-['Nunito'] font-bold text-[#435a52] text-[50px] md:text-[40px] leading-[1.2] mb-6">
                    Piliers d'Action du COASP : Cultiver, Renforcer, Plaider et Communiquer Semences Paysannes en Action
                </h1>
            </div>
        </div>
    </section>

    {{-- IMAGE BOXES - 4 PILIERS --}}
    <section class="py-16 bg-[#f2f7f5]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                {{-- Box 1: Foires et Conférences --}}
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="relative h-[240px] overflow-hidden">
                        <img src="{{ asset('images/pillars/whatsapp-image-08-57-49.jpeg') }}" alt="Foires et Conférences" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-white transform translate-y-0 group-hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-[#e6d54f] rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="font-['Outfit'] font-semibold text-[#435a52] text-[20px] leading-[1.3]">
                            <a href="#aboutcoasp" class="hover:text-[#297d53] transition-colors">Foires et Conférences</a>
                        </h4>
                    </div>
                </div>

                {{-- Box 2: Renforcement des Capacités --}}
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="relative h-[240px] overflow-hidden">
                        <img src="{{ asset('images/pillars/capacity-building.jpeg') }}" alt="Renforcement des Capacités" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-white transform translate-y-0 group-hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-[#e6d54f] rounded-full flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="font-['Outfit'] font-semibold text-[#435a52] text-[20px] leading-[1.3]">
                            <a href="#aboutcoasp" class="hover:text-[#297d53] transition-colors">Renforcement des Capacités</a>
                        </h4>
                    </div>
                </div>

                {{-- Box 3: Plaidoyer et Lobbying --}}
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="relative h-[240px] overflow-hidden">
                        <img src="{{ asset('images/pillars/advocacy.jpeg') }}" alt="Plaidoyer et Lobbying" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-white transform translate-y-0 group-hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-[#e6d54f] rounded-full flex items-center justify-center">
                                <i class="fas fa-bullhorn text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="font-['Outfit'] font-semibold text-[#435a52] text-[20px] leading-[1.3]">
                            <a href="#aboutcoasp" class="hover:text-[#297d53] transition-colors">Plaidoyer et Lobbying</a>
                        </h4>
                    </div>
                </div>

                {{-- Box 4: Communication et Documentation --}}
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="relative h-[240px] overflow-hidden">
                        <img src="{{ asset('images/pillars/communication.jpeg') }}" alt="Communication" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 bg-white transform translate-y-0 group-hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-[#e6d54f] rounded-full flex items-center justify-center">
                                <i class="fas fa-comments text-white text-xl"></i>
                            </div>
                        </div>
                        <h4 class="font-['Outfit'] font-semibold text-[#435a52] text-[20px] leading-[1.3]">
                            <a href="#aboutcoasp" class="hover:text-[#297d53] transition-colors">Communication et Documentation</a>
                        </h4>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- SECTION À PROPOS COASP --}}
    <section id="aboutcoasp" class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Colonne gauche: Images --}}
                <div class="relative">
                    <div class="relative">
                        <img src="{{ asset('images/about/main-image.jpg') }}" alt="COASP" class="w-full rounded-lg shadow-xl">
                        <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-[#e6d54f] rounded-lg -z-10"></div>
                    </div>
                </div>

                {{-- Colonne droite: Contenu --}}
                <div>
                    <div class="text-[#e6d54f] font-['Poppins'] font-medium text-[16px] mb-4">
                        À Propos du COASP
                    </div>
                    <h2 class="font-['Nunito'] font-bold text-[#435a52] text-[50px] md:text-[40px] leading-[1.2] mb-6">
                        Coalition pour la Protection du Patrimoine Génétique Africain
                    </h2>
                    <p class="text-[#494A4D] text-[16px] leading-[1.75] mb-6">
                        Le COASP (Coalition pour la Protection du Patrimoine Génétique Africain) est une organisation dédiée à la préservation des semences paysannes et au développement de l'agroécologie en Afrique de l'Ouest.
                    </p>
                    <p class="text-[#494A4D] text-[16px] leading-[1.75] mb-8">
                        Nous œuvrons pour une souveraineté semencière renforcée, une agriculture équitable et durable qui respecte les droits des paysans et préserve la biodiversité agricole pour les générations futures.
                    </p>
                    <a href="{{ route('about') }}" class="inline-block bg-[#297d53] text-white font-['Poppins'] font-semibold text-[16px] px-[30px] py-[14px] rounded-[8px] hover:bg-[#1e5d3d] transition-all duration-300">
                        Découvrez Notre Mission
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- COMPTEURS / STATISTIQUES --}}
    <section class="py-20 bg-[#297d53] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('{{ asset('images/patterns/pattern.png') }}');"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                {{-- Compteur 1 --}}
                <div class="text-center">
                    <div class="text-[#e6d54f] font-['Nunito'] font-bold text-[60px] leading-[1] mb-2">
                        <span class="counter" data-target="15">0</span>+
                    </div>
                    <div class="text-white font-['Poppins'] text-[18px]">Années d'Expérience</div>
                </div>

                {{-- Compteur 2 --}}
                <div class="text-center">
                    <div class="text-[#e6d54f] font-['Nunito'] font-bold text-[60px] leading-[1] mb-2">
                        <span class="counter" data-target="500">0</span>+
                    </div>
                    <div class="text-white font-['Poppins'] text-[18px]">Variétés Préservées</div>
                </div>

                {{-- Compteur 3 --}}
                <div class="text-center">
                    <div class="text-[#e6d54f] font-['Nunito'] font-bold text-[60px] leading-[1] mb-2">
                        <span class="counter" data-target="10000">0</span>+
                    </div>
                    <div class="text-white font-['Poppins'] text-[18px]">Paysans Formés</div>
                </div>

                {{-- Compteur 4 --}}
                <div class="text-center">
                    <div class="text-[#e6d54f] font-['Nunito'] font-bold text-[60px] leading-[1] mb-2">
                        <span class="counter" data-target="12">0</span>
                    </div>
                    <div class="text-white font-['Poppins'] text-[18px]">Pays d'Intervention</div>
                </div>

            </div>
        </div>
    </section>

    {{-- DERNIÈRES ACTUALITÉS --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="text-[#e6d54f] font-['Poppins'] font-medium text-[16px] mb-4">
                    Actualités COASP
                </div>
                <h2 class="font-['Nunito'] font-bold text-[#435a52] text-[50px] md:text-[40px] leading-[1.2]">
                    Dernières Nouvelles et Événements
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @for($i = 1; $i <= 3; $i++)
                    <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/news/news-'.$i.'.jpg') }}" alt="Actualité {{ $i }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-[#798883] mb-3">
                                <span><i class="far fa-calendar mr-2"></i>12 Nov 2025</span>
                                <span><i class="far fa-user mr-2"></i>Admin</span>
                            </div>
                            <h3 class="font-['Outfit'] font-semibold text-[#435a52] text-[24px] leading-[1.3] mb-3 hover:text-[#297d53] transition-colors">
                                <a href="{{ route('news.show', $i) }}">Titre de l'actualité {{ $i }}</a>
                            </h3>
                            <p class="text-[#494A4D] text-[15px] leading-[1.75] mb-4">
                                Extrait de l'actualité qui donne un aperçu du contenu...
                            </p>
                            <a href="{{ route('news.show', $i) }}" class="inline-flex items-center text-[#297d53] font-['Outfit'] font-medium text-[16px] hover:text-[#e6d54f] transition-colors">
                                Lire Plus <i class="icon-graingrow-angle-right ml-2"></i>
                            </a>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <script>
        // Swiper Slider
        const homeSlider = new Swiper('.homeSlider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });

        // Compteurs animés
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const animateCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(() => animateCounter(counter), 1);
            } else {
                counter.innerText = target;
            }
        };

        // Observer pour déclencher l'animation au scroll
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => counterObserver.observe(counter));
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush
