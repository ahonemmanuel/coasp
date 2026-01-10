@extends('layouts.app')

@section('contet')
    <!-- Hero Slider Section -->
    <section class="relative w-full h-screen overflow-hidden">
        <div class="absolute inset-0">
            <div class="relative w-full h-full">
                <!-- Slide 1 -->
                <div class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('images/slider/slide1.jpg') }}" alt="Slide 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="container mx-auto px-4">
                            <div class="max-w-3xl text-white animate__animated animate__fadeInUp">
                                <p class="text-lg md:text-xl font-light mb-4 uppercase tracking-wider">Bienvenue sur COASP</p>
                                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                                    Agriculture <span class="text-[#e6d54f]">Durable</span> en Afrique
                                </h1>
                                <p class="text-lg md:text-xl mb-8 max-w-2xl">
                                    Promotion de l'agroécologie et défense des droits des paysans en Afrique de l'Ouest
                                </p>
                                <a href="#about" class="inline-block bg-[#e6d54f] text-[#252c24] px-8 py-4 rounded font-bold text-lg hover:bg-[#d4c347] transition-all duration-300 transform hover:scale-105">
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="absolute left-10 top-1/2 -translate-y-1/2 z-10 w-14 h-14 bg-white/20 hover:bg-[#e6d54f] text-white rounded-full flex items-center justify-center transition-all duration-300 hidden md:flex">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button class="absolute right-10 top-1/2 -translate-y-1/2 z-10 w-14 h-14 bg-white/20 hover:bg-[#e6d54f] text-white rounded-full flex items-center justify-center transition-all duration-300 hidden md:flex">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </section>

    <!-- About Section with Images -->
    <section class="py-20 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Images -->
                <div class="space-y-6 animate__animated animate__fadeInLeft">
                    <div class="relative">
                        <img src="{{ asset('images/coasp-agro-ecologie-23.jpg') }}" alt="Agroécologie COASP" class="w-full rounded-lg shadow-2xl">
                    </div>
                    <div class="relative">
                        <img src="{{ asset('images/coasp-agro-ecologie-9.jpg') }}" alt="Agriculture durable" class="w-full rounded-lg shadow-2xl">
                    </div>

                    <!-- Info Box -->
                    <div class="relative bg-[#435a52] text-white p-8 rounded-lg shadow-xl">
                        <p class="text-base leading-relaxed mb-6">
                            La défense des principes vrais de l'agroécologie est importante. Il ne s'agit pas de suivre une mode, mais de redresser le déséquilibre monstrueux causé par le système marchand qui a amené à tant d'injustices, et de rétablir l'autonomie.
                        </p>

                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('images/author.jpg') }}" alt="Sidy Ndao" class="w-16 h-16 rounded-full border-4 border-[#e6d54f]">
                            </div>
                            <div>
                                <p class="font-bold text-lg">Sidy Ndao</p>
                                <p class="text-[#e6d54f] text-sm">Responsable des programmes du Coasp au Sénégal</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="animate__animated animate__fadeInRight">
                    <div class="mb-6">
                        <p class="text-[#e6d54f] text-lg font-semibold uppercase tracking-wider mb-3">À propos de COASP</p>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#435a52] leading-tight mb-6">
                            Promouvoir l'agroécologie en Afrique de l'Ouest
                        </h2>
                    </div>

                    <div class="space-y-6 text-[#494A4D] text-lg leading-relaxed">
                        <p>
                            La COASP est une plateforme sous-régionale regroupant des organisations nationales de défense des droits des paysan(ne)s et de promotion de l'agroécologie paysanne en Afrique de l'Ouest.
                        </p>

                        <p>
                            Notre mission principale est la défense et la promotion de l'agriculture paysanne et familiale durable au bénéfice de la souveraineté alimentaire des populations.
                        </p>

                        <!-- Features List -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-[#e6d54f] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base">Promotion de l'agroécologie</span>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-[#e6d54f] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base">Défense des droits paysans</span>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-[#e6d54f] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base">Souveraineté alimentaire</span>
                            </div>

                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-[#e6d54f] flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-base">Agriculture familiale</span>
                            </div>
                        </div>

                        <div class="mt-8">
                            <a href="#services" class="inline-block bg-[#435a52] text-white px-8 py-4 rounded font-bold hover:bg-[#297d53] transition-all duration-300">
                                Nos Actions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-[#f2f7f5]" id="services">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-16">
                <p class="text-[#e6d54f] text-lg font-semibold uppercase tracking-wider mb-3">Nos Domaines d'Intervention</p>
                <h2 class="text-4xl md:text-5xl font-bold text-[#435a52] mb-4">Ce que nous faisons</h2>
                <div class="w-20 h-1 bg-[#e6d54f] mx-auto"></div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/services/agroecologie.jpg') }}" alt="Agroécologie" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-16 h-16 bg-[#e6d54f] rounded-full flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-[#435a52] mb-4">Promotion de l'agroécologie</h3>
                        <p class="text-[#494A4D] leading-relaxed mb-6">
                            Diffusion et promotion des pratiques agroécologiques auprès des communautés paysannes pour une agriculture durable.
                        </p>
                        <a href="#" class="text-[#297d53] font-semibold hover:text-[#e6d54f] transition-colors inline-flex items-center">
                            En savoir plus
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/services/formation.jpg') }}" alt="Formation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-16 h-16 bg-[#e6d54f] rounded-full flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-[#435a52] mb-4">Formation et renforcement</h3>
                        <p class="text-[#494A4D] leading-relaxed mb-6">
                            Formations techniques et renforcement des capacités des organisations paysannes membres.
                        </p>
                        <a href="#" class="text-[#297d53] font-semibold hover:text-[#e6d54f] transition-colors inline-flex items-center">
                            En savoir plus
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/services/plaidoyer.jpg') }}" alt="Plaidoyer" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-16 h-16 bg-[#e6d54f] rounded-full flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-[#435a52] mb-4">Plaidoyer politique</h3>
                        <p class="text-[#494A4D] leading-relaxed mb-6">
                            Actions de plaidoyer pour l'adoption de politiques agricoles favorables aux paysans.
                        </p>
                        <a href="#" class="text-[#297d53] font-semibold hover:text-[#e6d54f] transition-colors inline-flex items-center">
                            En savoir plus
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-16">
                <p class="text-[#e6d54f] text-lg font-semibold uppercase tracking-wider mb-3">Excellent membre de l'équipe</p>
                <h2 class="text-4xl md:text-5xl font-bold text-[#435a52]">Rencontrez notre superbe équipe</h2>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('images/team/alihou-ndiaye.jpg') }}" alt="Alihou Ndiaye" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <div class="flex justify-center space-x-3">
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <h4 class="text-xl font-bold text-[#435a52] mb-2">Alihou Ndiaye</h4>
                        <p class="text-[#297d53] text-sm">Coordinateur sous-régional COASP</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('images/team/omer-richard.jpg') }}" alt="Omer Richard" class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <div class="flex justify-center space-x-3">
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#435a52] hover:bg-[#e6d54f] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <h4 class="text-xl font-bold text-[#435a52] mb-2">Omer Richard Métogbé</h4>
                        <p class="text-[#297d53] text-sm">Assistant du coordinateur</p>
                    </div>
                </div>

                <!-- Add more team members as needed -->
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-16 bg-[#f2f7f5]">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-center gap-12">
                <div class="grayscale hover:grayscale-0 transition-all duration-300">
                    <img src="{{ asset('images/partners/partner1.png') }}" alt="Partenaire" class="h-16 w-auto">
                </div>
                <div class="grayscale hover:grayscale-0 transition-all duration-300">
                    <img src="{{ asset('images/partners/partner2.png') }}" alt="Partenaire" class="h-16 w-auto">
                </div>
                <div class="grayscale hover:grayscale-0 transition-all duration-300">
                    <img src="{{ asset('images/partners/partner3.png') }}" alt="Partenaire" class="h-16 w-auto">
                </div>
                <div class="grayscale hover:grayscale-0 transition-all duration-300">
                    <img src="{{ asset('images/partners/partner4.png') }}" alt="Partenaire" class="h-16 w-auto">
                </div>
            </div>
        </div>
    </section>

@endsection
