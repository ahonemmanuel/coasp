@extends('layouts.dash')

@section('title', 'Modifier la galerie')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- En-tête -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Modifier la galerie: {{ $gallery->title }}</h1>
            <p class="text-sm text-gray-600 mt-1">Modifiez les informations et gérez les photos de la galerie</p>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-lg" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 mb-6 rounded-lg" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Informations de la galerie -->
        <div class="bg-white rounded-lg shadow-md mb-6">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Informations de la galerie</h2>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Colonne principale -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Titre -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
                                    Titre de la galerie <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       id="title"
                                       name="title"
                                       value="{{ old('title', $gallery->title) }}"
                                       required
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 @error('title') border-red-500 @enderror">
                                @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
                                    Description
                                </label>
                                <textarea id="description"
                                          name="description"
                                          rows="4"
                                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 @error('description') border-red-500 @enderror">{{ old('description', $gallery->description) }}</textarea>
                                @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Colonne latérale -->
                        <div class="space-y-6">
                            <!-- Date de l'événement -->
                            <div>
                                <label for="event_date" class="block text-sm font-medium text-gray-900 mb-2">
                                    Date de l'événement
                                </label>
                                <input type="date"
                                       id="event_date"
                                       name="event_date"
                                       value="{{ old('event_date', $gallery->event_date?->format('Y-m-d')) }}"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 @error('event_date') border-red-500 @enderror">
                                @error('event_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Lieu -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-900 mb-2">
                                    Lieu
                                </label>
                                <input type="text"
                                       id="location"
                                       name="location"
                                       value="{{ old('location', $gallery->location) }}"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 @error('location') border-red-500 @enderror">
                                @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Ordre -->
                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-900 mb-2">
                                    Ordre d'affichage
                                </label>
                                <input type="number"
                                       id="order"
                                       name="order"
                                       value="{{ old('order', $gallery->order) }}"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 @error('order') border-red-500 @enderror">
                                @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Statut actif -->
                            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                <input type="checkbox"
                                       id="is_active"
                                       name="is_active"
                                       {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                                       class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="is_active" class="ml-3 text-sm font-medium text-gray-900">
                                    Galerie active
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.galleries.index') }}"
                           class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition duration-150">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Retour
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-sm">
                            <i class="fas fa-save mr-2"></i>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Gestion des photos -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <div class="flex items-center">
                    <h2 class="text-lg font-semibold text-gray-900">
                        Photos de la galerie
                    </h2>
                    <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        {{ $gallery->photos->count() }} photo(s)
                    </span>
                </div>
                @if($gallery->photos->count() > 0)
                    <a href="{{ route('admin.galleries.download', $gallery) }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm">
                        <i class="fas fa-download mr-2"></i>
                        Télécharger tout (ZIP)
                    </a>
                @endif
            </div>
            <div class="p-6">
                <!-- Formulaire d'upload -->
                <form action="{{ route('admin.galleries.upload-photos', $gallery) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      id="upload-form"
                      class="mb-8">
                    @csrf

                    <div class="mb-4">
                        <label for="photos" class="block text-sm font-medium text-gray-900 mb-2">
                            Sélectionner des photos
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="photos" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-150">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                    <p class="mb-2 text-sm text-gray-700">
                                        <span class="font-semibold">Cliquez pour téléverser</span> ou glissez-déposez
                                    </p>
                                    <p class="text-xs text-gray-500">JPG, PNG, GIF (max. 5 MB par photo)</p>
                                </div>
                                <input id="photos"
                                       name="photos[]"
                                       type="file"
                                       multiple
                                       accept="image/*"
                                       class="hidden"
                                       onchange="displaySelectedFiles(this)">
                            </label>
                        </div>
                        <div id="selected-files" class="mt-2 text-sm text-gray-600"></div>
                        @error('photos')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-sm">
                        <i class="fas fa-upload mr-2"></i>
                        Téléverser les photos
                    </button>
                </form>

                <hr class="my-8 border-gray-200">

                <!-- Grille de photos -->
                @if($gallery->photos->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="photos-grid">
                        @foreach($gallery->photos as $photo)
                            <div class="relative group photo-item" data-id="{{ $photo->id }}">
                                <div class="aspect-square bg-gray-200 rounded-lg overflow-hidden">
                                    <img src="{{ $photo->image_url }}"
                                         alt="{{ $photo->title }}"
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 rounded-lg flex items-center justify-center">
                                    <form action="{{ route('admin.galleries.delete-photo', $photo) }}"
                                          method="POST"
                                          onsubmit="return confirm('Supprimer cette photo ?');"
                                          class="opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-150">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="absolute top-2 left-2 bg-white px-2.5 py-1 rounded-md text-xs font-semibold text-gray-800 shadow">
                                    #{{ $photo->order }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-images text-5xl text-gray-300 mb-4"></i>
                        <p class="mt-2 text-sm text-gray-600 font-medium">Aucune photo dans cette galerie</p>
                        <p class="text-xs text-gray-500 mt-1">Téléversez des photos en utilisant le formulaire ci-dessus</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function displaySelectedFiles(input) {
                const fileList = input.files;
                const display = document.getElementById('selected-files');

                if (fileList.length > 0) {
                    display.textContent = `${fileList.length} fichier(s) sélectionné(s)`;
                    display.classList.add('text-indigo-600', 'font-medium');
                } else {
                    display.textContent = '';
                    display.classList.remove('text-indigo-600', 'font-medium');
                }
            }
        </script>
    @endpush
@endsection
