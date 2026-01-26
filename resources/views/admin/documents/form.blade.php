<!-- Titre -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Titre <span class="text-red-500">*</span>
    </label>
    <input type="text"
           name="title"
           value="{{ old('title', $document->title ?? '') }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('title') border-red-500 @enderror"
           required>
    @error('title')
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Description
    </label>
    <textarea name="description"
              rows="3"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('description') border-red-500 @enderror">{{ old('description', $document->description ?? '') }}</textarea>
    @error('description')
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<!-- Catégorie et Langue -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Catégorie <span class="text-red-500">*</span>
        </label>
        <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('category') border-red-500 @enderror" required>
            <option value="">Sélectionner...</option>
            <option value="declaration" {{ old('category', $document->category ?? '') == 'declaration' ? 'selected' : '' }}>Déclaration</option>
            <option value="rapport" {{ old('category', $document->category ?? '') == 'rapport' ? 'selected' : '' }}>Rapport</option>
            <option value="publication" {{ old('category', $document->category ?? '') == 'publication' ? 'selected' : '' }}>Publication</option>
            <option value="guide" {{ old('category', $document->category ?? '') == 'guide' ? 'selected' : '' }}>Guide</option>
            <option value="autre" {{ old('category', $document->category ?? '') == 'autre' ? 'selected' : '' }}>Autre</option>
        </select>
        @error('category')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Langue <span class="text-red-500">*</span>
        </label>
        <select name="language" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('language') border-red-500 @enderror" required>
            <option value="fr" {{ old('language', $document->language ?? 'fr') == 'fr' ? 'selected' : '' }}>Français</option>
            <option value="en" {{ old('language', $document->language ?? 'fr') == 'en' ? 'selected' : '' }}>English</option>
        </select>
        @error('language')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Fichier -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Fichier @if(!isset($document)) <span class="text-red-500">*</span> @endif
    </label>
    @if(isset($document) && $document->file_path)
        <div class="mb-2 p-3 bg-gray-50 rounded-lg flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fas fa-file-pdf text-red-500"></i>
                <span class="text-sm text-gray-700">{{ $document->file_name }}</span>
                <span class="text-xs text-gray-500">({{ $document->formatted_file_size }})</span>
            </div>
            <a href="{{ $document->file_url }}" target="_blank" class="text-green-600 hover:text-green-700 text-sm">
                <i class="fas fa-download mr-1"></i> Télécharger
            </a>
        </div>
        <p class="text-xs text-gray-500 mb-2">Laissez vide pour conserver le fichier actuel</p>
    @endif
    <input type="file"
           name="file"
           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('file') border-red-500 @enderror">
    <p class="mt-1 text-xs text-gray-500">Formats acceptés: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, ZIP (Max: 10 MB)</p>
    @error('file')
    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<!-- Options -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Ordre d'affichage
        </label>
        <input type="number"
               name="order"
               value="{{ old('order', $document->order ?? 0) }}"
               min="0"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
    </div>

    <div class="flex items-end">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $document->is_active ?? true) ? 'checked' : '' }}
                   class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
            <span class="text-sm font-medium text-gray-700">Document actif</span>
        </label>
    </div>

    <div class="flex items-end">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox"
                   name="is_featured"
                   value="1"
                   {{ old('is_featured', $document->is_featured ?? false) ? 'checked' : '' }}
                   class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
            <span class="text-sm font-medium text-gray-700">En vedette</span>
        </label>
    </div>
</div>
