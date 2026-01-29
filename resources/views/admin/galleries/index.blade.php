@extends('layouts.dash')

@section('title', 'Galeries d\'événements')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Galeries d'événements</h1>
                <p class="text-sm text-gray-600 mt-1">Gérez toutes vos galeries photos d'événements</p>
            </div>
            <a href="{{ route('admin.galleries.create') }}"
               class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-sm">
                <i class="fas fa-plus mr-2"></i>
                Nouvelle galerie
            </a>
        </div>

        <!-- Messages de succès -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-lg" role="alert">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Tableau des galeries -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Titre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Date événement
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Lieu
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Photos
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Statut
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Ordre
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($galleries as $gallery)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $gallery->title }}</div>
                                @if($gallery->description)
                                    <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($gallery->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $gallery->event_date ? $gallery->event_date->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $gallery->location ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    <i class="fas fa-images mr-1"></i>
                                    {{ $gallery->photos_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($gallery->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span>
                                        Actif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <span class="w-2 h-2 mr-1.5 bg-gray-500 rounded-full"></span>
                                        Inactif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $gallery->order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Bouton Télécharger ZIP -->
                                    @if($gallery->photos_count > 0)
                                        <a href="{{ route('admin.galleries.download', $gallery) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs rounded-md transition duration-150"
                                           title="Télécharger toutes les photos">
                                            <i class="fas fa-download mr-1"></i>
                                            ZIP
                                        </a>
                                    @endif

                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                       class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs rounded-md transition duration-150">
                                        <i class="fas fa-edit mr-1"></i>
                                        Modifier
                                    </a>

                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}"
                                          method="POST"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette galerie ?')"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition duration-150">
                                            <i class="fas fa-trash mr-1"></i>
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-images text-5xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-700 font-medium mb-2">Aucune galerie trouvée</p>
                                    <p class="text-gray-500 text-sm mb-4">Commencez par créer votre première galerie d'événement</p>
                                    <a href="{{ route('admin.galleries.create') }}"
                                       class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 shadow-sm">
                                        <i class="fas fa-plus mr-2"></i>
                                        Créer une galerie
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($galleries->hasPages())
                <div class="bg-white px-4 py-3 border-t border-gray-200">
                    {{ $galleries->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
