@extends('layouts.app')

@section('title', $gallery->title . ' - Galerie Photos')

@section('content')
    <!-- En-tête de la galerie -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-12">
        <div class="container mx-auto px-4">
            <!-- Fil d'Ariane -->
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm text-green-100">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Accueil</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('gallery.index') }}" class="hover:text-white transition-colors">Galerie</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </li>
                    <li class="text-white font-medium">{{ Str::limit($gallery->title, 30) }}</li>
                </ol>
            </nav>

            <!-- Informations de la galerie -->
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                <div class="max-w-4xl">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ $gallery->title }}</h1>

                    @if($gallery->description)
                        <p class="text-lg text-green-100 mb-6">{{ $gallery->description }}</p>
                    @endif

                    <!-- Métadonnées -->
                    <div class="flex flex-wrap items-center gap-6 text-sm">
                        @if($gallery->event_date)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $gallery->event_date->format('d F Y') }}</span>
                            </div>
                        @endif

                        @if($gallery->location)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $gallery->location }}</span>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $gallery->photos->count() }} {{ $gallery->photos->count() > 1 ? 'photos' : 'photo' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Bouton Télécharger -->
                @if($gallery->photos->count() > 0)
                    <div class="flex-shrink-0">
                        <a href="{{ route('gallery.download', $gallery->slug) }}"
                           class="inline-flex items-center px-6 py-3 bg-white text-green-700 hover:bg-green-50 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Télécharger tout (ZIP)
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            @if($gallery->photos->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($gallery->photos as $photo)
                        <div class="cursor-pointer" onclick="openLightbox({{ $loop->index }})">
                            <img src="{{ $photo->image_url }}"
                                 alt="{{ $photo->title ?? $gallery->title }}"
                                 class="w-full h-64 object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow">
                            @if($photo->title)
                                <p class="mt-2 text-sm font-medium text-gray-800">{{ $photo->title }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <p class="text-gray-600">Aucune photo dans cette galerie.</p>
                </div>
            @endif

            <div class="mt-12 text-center">
                <a href="{{ route('gallery.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Retour
                </a>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal - Pour voir en GRAND -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-50 hidden items-center justify-center p-4">
        <!-- Bouton fermer -->
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-green-400 transition-colors z-10">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Navigation précédent -->
        <button onclick="changePhoto(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-green-400 transition-colors z-10">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <!-- Image en grand -->
        <div class="max-w-7xl max-h-screen">
            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[90vh] object-contain mx-auto rounded-lg">
            <div id="lightbox-caption" class="text-white text-center mt-4 text-lg font-medium"></div>
        </div>

        <!-- Navigation suivant -->
        <button onclick="changePhoto(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-green-400 transition-colors z-10">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Compteur -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white text-sm bg-green-600 px-4 py-2 rounded-full font-medium">
            <span id="photo-counter"></span>
        </div>
    </div>

    @push('scripts')
        <script>
            let currentPhotoIndex = 0;
            const photos = @json($gallery->photos->map(function($photo) {
    return [
        'url' => $photo->image_url,
        'title' => $photo->title ?? '',
    ];
}));

            function openLightbox(index) {
                currentPhotoIndex = index;
                updateLightbox();
                document.getElementById('lightbox').classList.remove('hidden');
                document.getElementById('lightbox').classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                document.getElementById('lightbox').classList.add('hidden');
                document.getElementById('lightbox').classList.remove('flex');
                document.body.style.overflow = 'auto';
            }

            function changePhoto(direction) {
                currentPhotoIndex += direction;

                if (currentPhotoIndex < 0) {
                    currentPhotoIndex = photos.length - 1;
                } else if (currentPhotoIndex >= photos.length) {
                    currentPhotoIndex = 0;
                }

                updateLightbox();
            }

            function updateLightbox() {
                const photo = photos[currentPhotoIndex];
                document.getElementById('lightbox-img').src = photo.url;
                document.getElementById('lightbox-caption').textContent = photo.title;
                document.getElementById('photo-counter').textContent = `${currentPhotoIndex + 1} / ${photos.length}`;
            }

            // Navigation au clavier
            document.addEventListener('keydown', function(e) {
                const lightbox = document.getElementById('lightbox');
                if (!lightbox.classList.contains('hidden')) {
                    if (e.key === 'Escape') closeLightbox();
                    if (e.key === 'ArrowLeft') changePhoto(-1);
                    if (e.key === 'ArrowRight') changePhoto(1);
                }
            });

            // Fermer au clic sur le fond noir
            document.getElementById('lightbox').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeLightbox();
                }
            });
        </script>
    @endpush
@endsection
