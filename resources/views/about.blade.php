@extends('layouts.app')

@section('title', 'COASP - Qui sommes-nous?')

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endpush

@section('content')

    <style>
        .hero-overlay {
            background-color: rgba(184, 223, 179, 0.7);
        }
    </style>
    <!-- Hero Section -->
    <section class="hero-bg pt-32 pb-20 md:pt-40 md:pb-32 relative">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">À propos de nous</h1>
            <div class="text-white text-lg">
                <span class="inline-flex items-center">
                    <a href="/" class="hover:text-yellow-300">Accueil</a>
                    <i data-feather="chevron-right" class="mx-2 w-4 h-4" ></i>
                    <span>À propos</span>
                </span>
            </div>
        </div>
    </section>
    <!-- Section Historique -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Colonne de texte -->
                <article>
                    <h1 class="text-4xl font-bold text-yellow-400 mb-6">Historique</h1>

                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Émergence du Comité Ouest Africain des Semences Paysannes contre les Impacts de l'Agriculture Industrielle
                    </h2>

                    <div class="space-y-4 text-gray-700 text-sm leading-relaxed">
                        <p>
                            Le COASP a été créé en 2011 à Djimini, un village de la Région de Kolda au Sud du Sénégal, en présence des délégués du Bénin, du Burkina Faso, de la Gambie, de la Guinée Bissau, de la Guinée, du Mali, du Niger, du Sénégal et du Togo, en présence de BEDE (Biodiversité : Echanges et Diffusion d'Experiences) comme témoin. C'était lors de la troisième édition de la foire ouest-africaine des semences paysannes organisée tous les deux ans depuis 2007 par l'Association Sénégalaise des Producteurs de Semences Paysannes (ASPSP).
                        </p>

                        <p>
                            Aujourd'hui, d'autres pays se sont joint au COASP, notamment la Côte d'Ivoire, le Ghana, le Liberia, la Mauritanie et la Sierra Leone.
                        </p>

                        <p>
                            Dans ses activités de promotion de la biodiversité et des droits des paysans, le COASP s'oppose à la prolifération des semences dites améliorées très exigeantes en intrants de synthèse, à la privatisation des semences, à l'introduction des OGM dans les systèmes alimentaires et à la gouvernance non transparente du Traité international sur les ressources phytogénétiques pour l'alimentation et l'agriculture (TIRPAA), du Comité national de la biodiversité (CNB) et autres instruments similaires ayant trait à la biodiversité.
                        </p>

                        <p>
                            Le Bénin, le Burkina Faso, la Gambie, la Guinée Bissau, la Guinée Conakry, le Mali, le Niger, le Sénégal et le Togo.
                        </p>

                        <p class="mt-6">
                            Après ces neufs États, d'autres pays ouest-africains ont rejoint le COASP : Le Centre Afrique, la Côte d'Ivoire, le Ghana, le Libéria, la Mauritanie et la Sierra Leone.
                        </p>
                    </div>
                </article>

                <!-- Colonne des images -->
                <aside class="space-y-6" aria-label="Galerie d'images">
                    <figure class="rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('images/q1.jpg') }}" alt="Variétés de semences traditionnelles exposées dans des bols" class="w-full h-auto" loading="lazy">
                    </figure>

                    <figure class="rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('images/q2.jpg') }}" alt="Travail agricole dans un champ" class="w-full h-auto" loading="lazy">
                    </figure>
                </aside>
            </div>
        </div>
    </section>

    <!-- Section Qui sommes-nous -->
    <section class="py-12 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">

            <!-- En-tête -->
            <header class="text-center mb-12">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Qui sommes-nous?</h2>
                <p class="text-3xl font-semibold text-gray-800">
                    À Propos de Notre Engagement<br>pour une Agriculture Durable
                </p>
            </header>

            <!-- Contenu principal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start mb-12">

                <!-- Colonne image -->
                <figure>
                    <img src="{{ asset('images/q3.jpg') }}" alt="Agriculture Durable" class="w-full h-auto rounded-lg shadow-lg" loading="lazy">
                </figure>

                <!-- Colonne texte -->
                <article class="space-y-4 text-gray-700 text-justify leading-relaxed">
                    <p>
                        Le Comité Ouest Africain des Semences Paysannes (COASP) est un réseau sous régional d'organisations de paysans en Agriculture Ecologique. Il œuvre pour la promotion de la biodiversité agricole cultivée et non cultivée tout en renforçant les droits des paysans et sur celle-ci. Le COASP sert ainsi de cadre de concertation, de sensibilisation, de formation et de plaidoyer pour la souveraineté alimentaire des communautés locales et des pays membres.
                    </p>

                    <p>
                        Dans chaque pays, les individus et organisations qui promeuvent la vision et la mission du COASP sont réunis en une entité unique qui les adhère au réseau régional. Le COASP est dirigé par un Coordonnateur général et un Assistant qui est coordonnateur du réseau dans son pays. A l'échelle pays, qu'importe la structuration adoptée, le responsable (coordinateur national) et son adjoint (assistant) ne devraient pas appartenir à la même organisation.
                    </p>

                    <p>
                        Le COASP est dirigé par un Coordonnateur sous-régional et un Assistant. Cependant, dans chacun des pays membres, l'organisation est représentée par un Coordonnateur National et son Assistant. A ce titre, il est décidé que le coordonnateur pays et son assistant ne doivent pas appartenir à la même association.
                    </p>
                </article>
            </div>

            <!-- Points clés -->
            <div class="max-w-4xl mx-auto space-y-4 mb-8">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-gray-700 leading-relaxed">
                        Le CAOSP est pour le maintien de l'Agriculture Familiale et la promotion de la Souveraineté Alimentaire des peuples.
                    </p>
                </div>

                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-gray-700 leading-relaxed">
                        Le COASP est un cadre de concertation, de sensibilisation, de formation (pratique Agroécologiques et savoirs et savoir-faire), de plaidoyer.
                    </p>
                </div>
            </div>

            <!-- Bouton de contact -->
            <div class="flex justify-start max-w-4xl mx-auto">
                <a href="#contact" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Contactez-Nous
                </a>
            </div>
        </div>
    </section>

    <!-- Section Vision (Hero full width) -->
    <section class="bg-gradient-to-br from-gray-500 via-gray-600 to-gray-500 py-20 px-4">
        <div class="max-w-5xl mx-auto text-center">
            <p class="text-yellow-300 text-lg sm:text-xl lg:text-2xl leading-relaxed font-medium mb-8">
                A l'horizon 2029, les semences paysannes et les système semenciers paysans, en Afrique de l'Ouest, sont librement conduit et partagés par les paysan.ne.s, puis soutenus par des lois et politiques publiques, favorables à l'Agroécologie paysanne pour la Souveraineté Alimentaire des peuples.
            </p>

            <a href="#documents" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-md shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Documents Utiles
            </a>
        </div>
    </section>

    <div class="max-w-4xl mx-auto px-6 py-12">

        <!-- Vision Section -->
        <div class="mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-center mb-8">
                <span class="text-gray-800">Notre</span>
                <span class="text-gray-400">Vision!</span>
            </h1>

            <div class="bg-gray-100 rounded-lg p-8 md:p-10">
                <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                    À l'horizon 2029, les semences paysannes et les système semenciers paysans, en Afrique de l'Ouest, sont librement conduit et partagés par les paysan.ne.s, puis soutenus par des lois et politiques publiques, favorables à l'Agroécologie paysanne pour la Souveraineté Alimentaire des peuples.
                </p>
            </div>
        </div>

        <!-- Mission Section -->
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-8">
                <span class="text-gray-800">Notre</span>
                <span class="text-gray-400">Mission!</span>
            </h2>

            <div class="bg-gray-100 rounded-lg p-8 md:p-10">
                <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                    Créer un cadre approprié où tous ses membres du COASP pourront défendre leurs droits, bénéficier des appuis techniques et financiers afin de sauver les semences paysannes (animales et végétales), l'agriculture Familiale (AF) et promouvoir l'Agroécologie Paysanne (AEP).
                </p>
            </div>
        </div>

    </div>

    <div class="max-w-7xl mx-auto py-12 px-4">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-yellow-500 text-2xl md:text-3xl font-semibold mb-2">
                Objectifs COASP
            </h1>
            <h2 class="text-gray-700 text-3xl md:text-4xl font-bold">
                Agriculture Durable, Semences Essentielles
            </h2>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

            <!-- Card 1: Promotion et valorisation -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="mb-4 text-6xl">
                    📢
                </div>
                <h3 class="text-gray-800 font-bold text-base mb-3 leading-tight">
                    Promotion et valorisation des semences paysannes
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    La promotion de la connaissance et de l'éducation sur les enjeux environnementaux est essentielle pour construire un avenir durable. Nous nous engageons à sensibiliser et éduquer les communautés sur les pratiques respectueuses de l'environnement.
                </p>
            </div>

            <!-- Card 2: Plaidoyer -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="mb-4 text-6xl">
                    👨‍🌾
                </div>
                <h3 class="text-gray-800 font-bold text-base mb-3 leading-tight">
                    Plaidoyer pour la reconnaissance des systèmes semenciers paysans
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Le plaidoyer pour la reconnaissance du système semencier paysan est crucial pour préserver la biodiversité agricole. Ces systèmes traditionnels offrent des semences adaptées aux changements climatiques. Reconnaître leur valeur légalement renforce la souveraineté alimentaire.
                </p>
            </div>

            <!-- Card 3: Développement Durable -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="mb-4 text-6xl">
                    🌱
                </div>
                <h3 class="text-gray-800 font-bold text-base mb-3 leading-tight">
                    Développement Durable
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Soutenir le développement durable en intégrant des pratiques éthiques et écologiques. Nous cherchons à instaurer des changements positifs dans les communautés, favorisant ainsi un équilibre entre le progrès et la préservation de l'environnement.
                </p>
            </div>

            <!-- Card 4: Conservation de la Biodiversité -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="mb-4 text-6xl">
                    🌍
                </div>
                <h3 class="text-gray-800 font-bold text-base mb-3 leading-tight">
                    Conservation de la Biodiversité
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Protéger la biodiversité est au cœur de notre engagement. Nous nous efforçons de préserver la richesse biologique de notre environnement en mettant en place des initiatives de conservation et en sensibilisant à l'importance de la biodiversité.
                </p>
            </div>

            <!-- Card 5: Gouvernance Environnementale -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition-shadow">
                <div class="mb-4 text-6xl">
                    🤝
                </div>
                <h3 class="text-gray-800 font-bold text-base mb-3 leading-tight">
                    Gouvernance Environnementale
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Nous visons à encourager la responsabilité collective pour la protection de notre écosystème, favorisant ainsi une gestion durable des ressources naturelles.
                </p>
            </div>

        </div>

    </div>

    <!-- Vision Cards Section -->
    <section class="py-16 px-4 sm:py-20">
        <div class="max-w-7xl mx-auto">
            <!-- Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card 1: Souveraineté Alimentaire -->
                <div class="group h-96 [perspective:1000px]">
                    <div class="relative h-full w-full rounded-xl shadow-xl transition-all duration-500 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)]">
                        <!-- Front Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 [backface-visibility:hidden]">
                            <div class="flex h-full flex-col items-center justify-center p-8 text-center text-white">
                                <div class="mb-6">
                                    <img src="{{ asset('images/q4.png') }}"
                                         alt="souveraineté alimentaire"
                                         class="w-32 h-32 mx-auto">
                                </div>
                                <h3 class="text-2xl font-bold">
                                    COASP est pour la Souveraineté Alimentaire
                                </h3>
                            </div>
                        </div>

                        <!-- Back Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-white [backface-visibility:hidden] [transform:rotateY(180deg)]">
                            <div class="flex h-full items-center justify-center p-8">
                                <p class="text-gray-700 text-center leading-relaxed">
                                    Nous aspirons à créer un environnement où chaque communauté agricole, soutenue par le COASP, atteint une souveraineté alimentaire totale. Nous visionnons des agriculteurs autonomes, capables de produire et de gérer leurs propres ressources alimentaires de manière durable, renforçant ainsi la sécurité alimentaire et la résilience des peuples.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Diversité Agricole -->
                <div class="group h-96 [perspective:1000px]">
                    <div class="relative h-full w-full rounded-xl shadow-xl transition-all duration-500 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)]">
                        <!-- Front Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-gradient-to-br from-green-500 to-green-700 [backface-visibility:hidden]">
                            <div class="flex h-full flex-col items-center justify-center p-8 text-center text-white">
                                <div class="mb-6">
                                    <i class="text-6xl">🌱</i>
                                </div>
                                <h3 class="text-2xl font-bold">
                                    COASP est pour une Diversité Agricole Ressourçante
                                </h3>
                            </div>
                        </div>

                        <!-- Back Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-white [backface-visibility:hidden] [transform:rotateY(180deg)]">
                            <div class="flex h-full items-center justify-center p-8">
                                <p class="text-gray-700 text-center leading-relaxed">
                                    Nous cherchons à construire un futur agricole où la biodiversité est célébrée et préservée. Notre vision consiste en des terres cultivées qui regorgent de diversité génétique, où les semences paysannes et reproductibles prospèrent, garantissant la résilience des cultures face aux défis environnementaux et climatiques.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Gouvernance Participative -->
                <div class="group h-96 [perspective:1000px]">
                    <div class="relative h-full w-full rounded-xl shadow-xl transition-all duration-500 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)]">
                        <!-- Front Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-gradient-to-br from-purple-500 to-purple-700 [backface-visibility:hidden]">
                            <div class="flex h-full flex-col items-center justify-center p-8 text-center text-white">
                                <div class="mb-6">
                                    <img src="{{ asset('images/q5.png') }}"
                                         alt="gouvernance participative"
                                         class="w-32 h-32 mx-auto">
                                </div>
                                <h3 class="text-2xl font-bold">
                                    COASP est pour une Gouvernance Agricole Participative
                                </h3>
                            </div>
                        </div>

                        <!-- Back Face -->
                        <div class="absolute inset-0 h-full w-full rounded-xl bg-white [backface-visibility:hidden] [transform:rotateY(180deg)]">
                            <div class="flex h-full items-center justify-center p-8">
                                <p class="text-gray-700 text-center leading-relaxed">
                                    Le COASP œuvre pour une gouvernance agricole inclusive et participative. Nous envisageons un modèle où les agriculteurs, collectivement informés et responsabilisés, contribuent activement aux décisions qui façonnent leurs communautés agricoles. Notre vision est celle d'un partenariat étroit entre les acteurs locaux, les organisations agricoles et les institutions, créant ainsi une gouvernance durable et équitable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Partners Carousel Section -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="relative">
                <!-- Swiper Container -->
                <div class="swiper partnersSwiper">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q6.png') }}"
                                     alt="Logo Thousand Currents"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q7.png') }}"
                                     alt="AFSA Logo"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q8.jpeg') }}"
                                     alt="SWISSAID"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q9.jpeg') }}"
                                     alt="Terre Solidaire"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q10.png') }}"
                                     alt="Rosa Luxembourg"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 6 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q11.jpeg') }}"
                                     alt="Fahamu Africa"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 7 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q12.jpeg') }}"
                                     alt="TAPSA SAHEL"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 8 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q13.png') }}"
                                     alt="Sème l'avenir"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 9 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q14.png') }}"
                                     alt="RSP"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 10 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q15.jpg') }}"
                                     alt="Réseau Jardins de Cocagne"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 11 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q16.jpeg') }}"
                                     alt="RBM"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 12 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q17.jpeg') }}"
                                     alt="OXFAM NOVIB"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 13 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q18.png') }}"
                                     alt="OSIWA"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 14 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q19.png') }}"
                                     alt="New Field"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 15 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q20.png') }}"
                                     alt="MISEREOR"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 16 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q21.png') }}"
                                     alt="La Via Campesina"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 17 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q22.jpg') }}"
                                     alt="Fondation Nature & Découvertes"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 18 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q23.jpeg') }}"
                                     alt="Enda Pronat"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 19 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q24.png') }}"
                                     alt="ACRA"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 20 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q25.jpeg') }}"
                                     alt="DYTAES"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 21 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q26.jpeg') }}"
                                     alt="Fondation Léa Nature"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 22 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="h{{ asset('images/q27.jpeg') }}"
                                     alt="La Via Campesina"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 23 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q28.png') }}"
                                     alt="INADES FORMATION"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 24 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q29.jpeg') }}"
                                     alt="HEKS EPER"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 25 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q30.png') }}"
                                     alt="Heidehof Stiftung"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 26 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q31.jpeg') }}"
                                     alt="Fondation de France"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 27 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q32.jpeg') }}"
                                     alt="FIAN International"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>

                        <!-- Slide 28 -->
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center h-32 p-4">
                                <img src="{{ asset('images/q33.jpeg') }}"
                                     alt="FGC"
                                     class="max-h-full w-auto object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <div class="swiper-button-prev !text-gray-700 !w-10 !h-10 after:!text-2xl"></div>
                    <div class="swiper-button-next !text-gray-700 !w-10 !h-10 after:!text-2xl"></div>

                    <!-- Pagination -->
                    <div class="swiper-pagination !bottom-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.partnersSwiper', {
            // Display 3 slides at once
            slidesPerView: 3,
            spaceBetween: 30,

            // Loop through slides infinitely
            loop: true,

            // Autoplay settings
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Animation speed
            speed: 500,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Pagination dots
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Responsive breakpoints
            breakpoints: {
                // Mobile devices
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                // Tablets
                640: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                // Desktop
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                },
            },
        });
    </script>

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-outfit);
            color: var(--color-heading); /* #435a52 au lieu de yellow-400 */
            font-weight: 700;
            line-height: 1.2;
        }

    </style>
@endpush
