@extends('layouts.app')

@section('title', 'Contact - COASP')

@section('content')

    <!-- Section Contact -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <!-- En-tête de section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Contactez-Nous</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Nous sommes à votre écoute. N'hésitez pas à nous contacter pour toute question ou demande d'information.
                </p>
            </div>

            <!-- Grid de contact -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">

                <!-- Formulaire de contact -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h2>

                    <form class="space-y-6" action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <!-- Nom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nom complet *
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition @error('name') border-red-500 @enderror"
                                placeholder="Votre nom"
                            />
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Adresse email *
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition @error('email') border-red-500 @enderror"
                                placeholder="votre.email@exemple.com"
                            />
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Téléphone
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition"
                                placeholder="+221 77 505 51 21"
                            />
                        </div>

                        <!-- Sujet -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Sujet *
                            </label>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                required
                                value="{{ old('subject') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition @error('subject') border-red-500 @enderror"
                                placeholder="Sujet de votre message"
                            />
                            @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Message *
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition resize-none @error('message') border-red-500 @enderror"
                                placeholder="Votre message..."
                            >{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Messages de succès/erreur -->
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <!-- Bouton d'envoi -->
                        <button
                            type="submit"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 shadow-md"
                        >
                            <i class="fas fa-paper-plane mr-2"></i> Envoyer le message
                        </button>
                    </form>
                </div>

                <!-- Informations de contact -->
                <div class="space-y-6">

                    <!-- Carte d'information 1: Adresse -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-gray-800 text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Adresse</h3>
                                <p class="text-gray-600">
                                    Dakar, Sénégal<br />
                                    Région de Kolda, Djimini
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte d'information 2: Téléphone -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone text-gray-800 text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Téléphone</h3>
                                <p class="text-gray-600">
                                    <a href="tel:+221775055121" class="hover:text-yellow-500 transition">
                                        +221 77 505 51 21
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte d'information 3: Email -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-gray-800 text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Email</h3>
                                <p class="text-gray-600">
                                    <a href="mailto:info@coasp.org" class="hover:text-yellow-500 transition">
                                        info@coasp.org
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte d'information 4: Réseaux sociaux -->
                    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-share-alt text-gray-800 text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Suivez-nous</h3>
                                <div class="flex space-x-4 mt-3">
                                    <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-yellow-400 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-facebook-f text-gray-700"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-yellow-400 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-twitter text-gray-700"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-yellow-400 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-instagram text-gray-700"></i>
                                    </a>
                                    <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-yellow-400 rounded-full flex items-center justify-center transition">
                                        <i class="fab fa-linkedin-in text-gray-700"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Carte Google Maps -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        <i class="fas fa-map-marked-alt mr-2 text-yellow-400"></i>
                        Notre Localisation
                    </h2>
                </div>
                <div class="w-full h-96">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d354277.83564748167!2d-16.9550316!3d14.7783294!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d14.778329399999999!2d-16.955031599999998!5e1!3m2!1sfr!2stg!4v1769397042079!5m2!1sfr!2stg"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full"
                    ></iframe>
                </div>
            </div>

        </div>
    </section>

    <!-- Section CTA (Call to Action) -->
    <section class="bg-green-700 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Besoin d'informations supplémentaires ?
            </h2>
            <p class="text-xl text-green-100 mb-6">
                Notre équipe est disponible pour répondre à toutes vos questions
            </p>
            <a
                href="tel:+221775055121"
                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105"
            >
                <i class="fas fa-phone mr-2"></i> Appelez-nous maintenant
            </a>
        </div>
    </section>

@endsection
