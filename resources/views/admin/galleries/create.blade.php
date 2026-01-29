@extends('layouts.dash')

@section('title', 'Créer une galerie')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <!-- Afficher toutes les erreurs -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 mb-6 rounded-lg" role="alert">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i>
                    <p class="font-bold">Erreurs détectées :</p>
                </div>
                <ul class="list-disc list-inside ml-7">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- En-tête -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Créer une galerie d'événement</h1>
            <p class="text-sm text-gray-600 mt-1">Remplissez les informations ci-dessous pour créer une nouvelle galerie</p>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6">
                <form action="{{ route('admin.galleries.store') }}" method="POST">
                    @csrf

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
                                       value="{{ old('title') }}"
                                       required
                                       placeholder="Ex: Conférence Agricole 2024"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 placeholder-gray-400 @error('title') border-red-500 @enderror">
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
                                          placeholder="Description de l'événement..."
                                          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 placeholder-gray-400 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
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
                                       value="{{ old('event_date') }}"
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
                                       value="{{ old('location') }}"
                                       placeholder="Ex: Lomé, Togo"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 placeholder-gray-400 @error('location') border-red-500 @enderror">
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
                                       value="{{ old('order', 0) }}"
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
                                       {{ old('is_active', true) ? 'checked' : '' }}
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
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-sm">
                            <i class="fas fa-save mr-2"></i>
                            Créer la galerie
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
