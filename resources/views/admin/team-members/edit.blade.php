@extends('layouts.dash')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Modifier le Membre d'Équipe</h1>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Nom complet *</label>
                    <input type="text" name="name" value="{{ old('name', $teamMember->name) }}" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Poste/Fonction *</label>
                    <input type="text" name="position" value="{{ old('position', $teamMember->position) }}" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('position') border-red-500 @enderror">
                    @error('position')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Photo</label>
                    <div class="mb-4">
                        <img src="{{ Storage::url($teamMember->photo) }}" alt="{{ $teamMember->name }}" class="h-40 w-40 object-cover rounded-lg">
                    </div>
                    <input type="file" name="photo" accept="image/*"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('photo') border-red-500 @enderror"
                           onchange="previewImage(event)">
                    <p class="text-sm text-gray-500 mt-1">Laissez vide pour conserver la photo actuelle</p>
                    @error('photo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div id="preview" class="mt-4 hidden">
                        <img id="preview-image" class="h-40 w-40 object-cover rounded-lg">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Ordre d'affichage *</label>
                    <input type="number" name="order" value="{{ old('order', $teamMember->order) }}" required min="0"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('order') border-red-500 @enderror">
                    @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 border-t pt-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Réseaux Sociaux</h3>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            <i class="fab fa-facebook-f text-blue-600"></i> Facebook
                        </label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $teamMember->facebook_url) }}"
                               placeholder="https://facebook.com/..."
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            <i class="fab fa-twitter text-blue-400"></i> Twitter
                        </label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $teamMember->twitter_url) }}"
                               placeholder="https://twitter.com/..."
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            <i class="fab fa-linkedin-in text-blue-700"></i> LinkedIn
                        </label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}"
                               placeholder="https://linkedin.com/in/..."
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">
                            <i class="fab fa-instagram text-pink-600"></i> Instagram
                        </label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $teamMember->instagram_url) }}"
                               placeholder="https://instagram.com/..."
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ $teamMember->is_active ? 'checked' : '' }} class="mr-2">
                        <span class="text-gray-700">Membre actif (visible sur le site)</span>
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.team-members.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                        Annuler
                    </a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition">
                        <i class="fas fa-save mr-2"></i>Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewImage = document.getElementById('preview-image');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
