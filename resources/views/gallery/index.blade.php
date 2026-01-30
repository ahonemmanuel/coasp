@extends('layouts.app')

@section('title', 'Galerie Photos')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Galerie Photos</h1>
                <p class="text-xl text-green-100">Découvrez nos événements en images</p>
            </div>
        </div>
    </section>

    <!-- Galleries Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($galleries as $gallery)
                        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <!-- Image de couverture -->
                            <a href="{{ route('gallery.show', $gallery->slug) }}" class="block relative overflow-hidden group">
                                @if($gallery->photos->first())
                                    <img src="{{ $gallery->photos->first()->image_url }}"
                                         alt="{{ $gallery->title }}"
                                         class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-64 bg-gray-300 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Badge nombre de photos -->
                                <div class="absolute top-4 right-4 bg-black bg-opacity-70 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $gallery->photos_count }} {{ $gallery->photos_count > 1 ? 'photos' : 'photo' }}
                                </div>
                            </a>

                            <!-- Contenu -->
                            <div class="p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-2 hover:text-green-600 transition-colors">
                                    <a href="{{ route('gallery.show', $gallery->slug) }}">
                                        {{ $gallery->title }}
                                    </a>
                                </h2>

                                @if($gallery->description)
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                        {{ Str::limit($gallery->description, 120) }}
                                    </p>
                                @endif

                                <!-- Métadonnées -->
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                    @if($gallery->event_date)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $gallery->event_date->format('d/m/Y') }}
                                        </div>
                                    @endif

                                    @if($gallery->location)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ Str::limit($gallery->location, 20) }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Bouton Voir -->
                                <a href="{{ route('gallery.show', $gallery->slug) }}"
                                   class="inline-flex items-center text-green-600 hover:text-green-800 font-medium transition-colors">
                                    Voir la galerie
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($galleries->hasPages())
                    <div class="mt-12">
                        {{ $galleries->links() }}
                    </div>
                @endif
            @else
                <!-- État vide -->
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Aucune galerie disponible</h3>
                    <p class="text-gray-600">Les galeries photos seront bientôt disponibles.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
