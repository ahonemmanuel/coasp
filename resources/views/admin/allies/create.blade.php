{{-- resources/views/admin/allies/create.blade.php --}}
@extends('layouts.dash')

@section('title', 'Ajouter un Allié')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.allies.index') }}" class="text-green-600 hover:text-green-700 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                <i class="fas fa-plus-circle mr-2 text-green-600"></i> Ajouter un Allié
            </h1>

            <form action="{{ route('admin.allies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nom -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nom de l'allié <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror"
                           placeholder="Ex: ACRA, AFSA, La Via Campesina..."
                           required>
                    @error('name')
                    <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo -->
                <div class="mb-6">
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                        Logo <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-500 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500">
                                    <span>Télécharger un fichier</span>
                                    <input type="file"
                                           name="logo"
                                           id="logo"
                                           accept="image/*"
                                           class="sr-only"
                                           onchange="previewImage(event)"
                                           required>
                                </label>
                                <p class="pl-1">ou glisser-déposer</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                        </div>
                    </div>
                    @error('logo')
                    <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror

                    <!-- Aperçu de l'image -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <p class="text-sm font-medium text-gray-700 mb-2">Aperçu :</p>
                        <img src="" alt="Aperçu" class="max-h-32 rounded border-2 border-gray-200">
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea name="description"
                              id="description"
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                              placeholder="Décrivez brièvement cet allié et sa mission...">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Site web -->
                <div class="mb-6">
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-2">
                        Site web
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-globe text-gray-400"></i>
                        </div>
                        <input type="url"
                               name="website"
                               id="website"
                               value="{{ old('website') }}"
                               placeholder="https://exemple.com"
                               class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('website') border-red-500 @enderror">
                    </div>
                    @error('website')
                    <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email et Téléphone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   placeholder="contact@allie.org"
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="tel"
                                   name="phone"
                                   id="phone"
                                   value="{{ old('phone') }}"
                                   placeholder="+221 XX XXX XX XX"
                                   class="w-full pl-10 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                        </div>
                        @error('phone')
                        <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Ordre d'affichage -->
                <div class="mb-6">
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                        Ordre d'affichage
                    </label>
                    <input type="number"
                           name="order"
                           id="order"
                           value="{{ old('order', 0) }}"
                           min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('order') border-red-500 @enderror">
                    @error('order')
                    <p class="mt-1 text-sm text-red-600"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>Plus le nombre est petit, plus l'allié apparaîtra en premier dans le carrousel
                    </p>
                </div>

                <!-- Statut -->
                <div class="mb-6">
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <input type="checkbox"
                               name="is_active"
                               id="is_active"
                               value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">
                            <i class="fas fa-check-circle mr-1 text-green-600"></i>Allié actif (visible sur le site)
                        </label>
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex justify-end space-x-4 pt-4 border-t">
                    <a href="{{ route('admin.allies.index') }}"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-300">
                        <i class="fas fa-times mr-2"></i>Annuler
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                        <i class="fas fa-save mr-2"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const img = preview.querySelector('img');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
