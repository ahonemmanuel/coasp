{{-- resources/views/admin/articles/edit.blade.php --}}
@extends('layouts.dash')

@push('styles')
    <script src="https://cdn.tiny.cloud/1/dnkyrq8hm2a3pkj2nnszildk39b81mh1l9sayiui75gv9wxj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

@section('page-title', 'Modifier l\'Article')

@section('content')
    <div class="space-y-6">
        {{-- En-tête --}}
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Modifier l'Article</h2>
                <p class="text-gray-600 mt-1">{{ $article->title }}</p>
            </div>
            <a href="{{ route('admin.articles.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </div>

        {{-- Messages d'erreur --}}
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Il y a {{ $errors->count() }} erreur(s) dans le formulaire
                        </h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Colonne principale (gauche) --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Contenu de l'article --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Contenu de l'article</h3>

                        {{-- Titre --}}
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Titre <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   value="{{ old('title', $article->title) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                   required>
                            @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                                Slug (URL)
                            </label>
                            <input type="text"
                                   id="slug"
                                   name="slug"
                                   value="{{ old('slug', $article->slug) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('slug') border-red-500 @enderror">
                            @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Extrait --}}
                        <div class="mb-4">
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                                Extrait
                            </label>
                            <textarea id="excerpt"
                                      name="excerpt"
                                      rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $article->excerpt) }}</textarea>
                            @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Contenu avec TinyMCE --}}
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Contenu <span class="text-red-500">*</span>
                            </label>
                            <textarea id="content"
                                      name="content"
                                      class="@error('content') border-red-500 @enderror">{{ old('content', $article->content) }}</textarea>
                            @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Colonne latérale (droite) --}}
                <div class="space-y-6">
                    {{-- Publication --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Publication</h3>

                        <div class="space-y-4">
                            {{-- Publier --}}
                            <label class="flex items-center">
                                <input type="checkbox"
                                       id="is_published"
                                       name="is_published"
                                       value="1"
                                       {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                                       class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Publier</span>
                            </label>

                            {{-- Mettre en avant --}}
                            <label class="flex items-center">
                                <input type="checkbox"
                                       id="is_featured"
                                       name="is_featured"
                                       value="1"
                                       {{ old('is_featured', $article->is_featured) ? 'checked' : '' }}
                                       class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-700">Mettre en avant</span>
                            </label>

                            {{-- Date de publication --}}
                            <div>
                                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                                    Date de publication
                                </label>
                                <input type="datetime-local"
                                       id="published_at"
                                       name="published_at"
                                       value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>

                            {{-- Bouton Mettre à jour --}}
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center justify-center space-x-2">
                                <i class="fas fa-save"></i>
                                <span>Mettre à jour</span>
                            </button>
                        </div>
                    </div>

                    {{-- Statistiques --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistiques</h3>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Vues:</span>
                                <span class="font-semibold text-gray-800">{{ $article->views }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Images:</span>
                                <span class="font-semibold text-gray-800">{{ $article->getTotalImagesCount() }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Créé le:</span>
                                <span class="font-semibold text-gray-800">{{ $article->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Modifié le:</span>
                                <span class="font-semibold text-gray-800">{{ $article->updated_at->format('d/m/Y à H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Informations --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations</h3>

                        {{-- Catégorie --}}
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Catégorie
                            </label>
                            <input type="text"
                                   id="category"
                                   name="category"
                                   list="categories"
                                   value="{{ old('category', $article->category) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <datalist id="categories">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">
                                @endforeach
                            </datalist>
                        </div>

                        {{-- Auteur --}}
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                                Auteur
                            </label>
                            <input type="text"
                                   id="author"
                                   name="author"
                                   value="{{ old('author', $article->author) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>

                    {{-- Image principale --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-image text-green-600 mr-2"></i>Image Principale
                        </h3>

                        @if($article->featured_image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $article->featured_image) }}"
                                     alt="{{ $article->title }}"
                                     class="w-full rounded-lg">

                                <label class="flex items-center mt-3">
                                    <input type="checkbox"
                                           id="remove_featured_image"
                                           name="remove_featured_image"
                                           value="1"
                                           class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                    <span class="ml-2 text-sm text-red-600">Supprimer l'image principale</span>
                                </label>
                            </div>
                        @endif

                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $article->featured_image ? 'Remplacer l\'image' : 'Ajouter une image' }}
                            </label>
                            <input type="file"
                                   id="featured_image"
                                   name="featured_image"
                                   accept="image/*"
                                   onchange="previewFeaturedImage(event)"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">

                            <div id="featured-preview" class="mt-4 hidden">
                                <img id="featured-preview-img" src="" alt="Aperçu" class="w-full rounded-lg">
                            </div>
                        </div>
                    </div>

                    {{-- Galerie d'images --}}
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fas fa-images text-blue-600 mr-2"></i>Galerie d'Images
                        </h3>

                        {{-- Images existantes --}}
                        @if($article->gallery_images && count($article->gallery_images) > 0)
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Images actuelles ({{ count($article->gallery_images) }})</h4>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($article->gallery_images as $image)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $image) }}"
                                                 alt="Gallery"
                                                 class="w-full h-24 object-cover rounded-lg">
                                            <label class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center cursor-pointer rounded-lg">
                                                <input type="checkbox"
                                                       name="remove_gallery_images[]"
                                                       value="{{ $image }}"
                                                       class="w-5 h-5 text-red-600">
                                                <span class="ml-2 text-white text-xs">Supprimer</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Cochez les images à supprimer</p>
                            </div>
                        @endif

                        {{-- Ajouter de nouvelles images --}}
                        <div>
                            <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-2">
                                Ajouter de nouvelles images
                            </label>
                            <input type="file"
                                   id="gallery_images"
                                   name="gallery_images[]"
                                   accept="image/*"
                                   multiple
                                   onchange="previewGalleryImages(event)"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <p class="mt-1 text-xs text-gray-500">Sélectionnez plusieurs images (Ctrl/Cmd + clic)</p>

                            <div id="gallery-preview" class="mt-4 grid grid-cols-2 gap-2 hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            // Aperçu de l'image principale
            function previewFeaturedImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('featured-preview-img');
                    preview.src = reader.result;
                    document.getElementById('featured-preview').classList.remove('hidden');
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            // Aperçu des nouvelles images de galerie
            function previewGalleryImages(event) {
                const gallery = document.getElementById('gallery-preview');
                gallery.innerHTML = '';
                gallery.classList.remove('hidden');

                const files = event.target.files;

                for (let i = 0; i < files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative';
                        div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg">
                    <div class="absolute top-1 right-1 bg-green-600 text-white text-xs px-2 py-1 rounded">
                        Nouvelle ${i + 1}
                    </div>
                `;
                        gallery.appendChild(div);
                    };
                    reader.readAsDataURL(files[i]);
                }
            }

            // Configuration TinyMCE
            tinymce.init({
                selector: '#content',
                height: 500,
                menubar: true,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic forecolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | image media link | code | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                language: 'fr_FR',
                images_upload_url: '{{ route("admin.articles.upload-image") }}',
                images_upload_handler: function (blobInfo, success, failure) {
                    let formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    formData.append('_token', '{{ csrf_token() }}');

                    fetch('{{ route("admin.articles.upload-image") }}', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(result => {
                            success(result.location);
                        })
                        .catch(error => {
                            failure('Erreur lors du téléchargement: ' + error);
                        });
                },
                automatic_uploads: true,
                file_picker_types: 'image'
            });
        </script>
    @endpush
@endsection
