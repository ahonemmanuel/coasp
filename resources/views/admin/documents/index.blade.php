@extends('layouts.dash')

@section('page-title', 'Gestion des documents')

@push('styles')
    <style>
        .modal-backdrop {
            backdrop-filter: blur(4px);
        }

        .pdf-viewer {
            height: calc(100vh - 200px);
            min-height: 500px;
        }

        .modal-content {
            max-width: 90vw;
            max-height: 95vh;
        }
    </style>
@endpush

@section('content')
    <div class="space-y-6">

        <!-- En-tête et stats -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    <i class="fas fa-file-alt text-green-600 mr-2"></i>
                    Documents
                </h2>
                <a href="{{ route('admin.documents.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Ajouter un document
                </a>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-600 font-medium">Total</p>
                            <p class="text-2xl font-bold text-blue-700">{{ $stats['total'] }}</p>
                        </div>
                        <i class="fas fa-file-alt text-3xl text-blue-300"></i>
                    </div>
                </div>

                <div class="bg-green-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-green-600 font-medium">Actifs</p>
                            <p class="text-2xl font-bold text-green-700">{{ $stats['active'] }}</p>
                        </div>
                        <i class="fas fa-check-circle text-3xl text-green-300"></i>
                    </div>
                </div>

                <div class="bg-yellow-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-yellow-600 font-medium">En vedette</p>
                            <p class="text-2xl font-bold text-yellow-700">{{ $stats['featured'] }}</p>
                        </div>
                        <i class="fas fa-star text-3xl text-yellow-300"></i>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-purple-600 font-medium">Téléchargements</p>
                            <p class="text-2xl font-bold text-purple-700">{{ $stats['downloads'] }}</p>
                        </div>
                        <i class="fas fa-download text-3xl text-purple-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="bg-white rounded-lg shadow-sm p-4">
            <form method="GET" class="flex flex-wrap gap-4">
                <input type="text"
                       name="search"
                       placeholder="Rechercher..."
                       value="{{ request('search') }}"
                       class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Toutes catégories</option>
                    <option value="declaration" {{ request('category') == 'declaration' ? 'selected' : '' }}>Déclarations</option>
                    <option value="rapport" {{ request('category') == 'rapport' ? 'selected' : '' }}>Rapports</option>
                    <option value="publication" {{ request('category') == 'publication' ? 'selected' : '' }}>Publications</option>
                    <option value="guide" {{ request('category') == 'guide' ? 'selected' : '' }}>Guides</option>
                    <option value="autre" {{ request('category') == 'autre' ? 'selected' : '' }}>Autres</option>
                </select>

                <select name="language" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Toutes langues</option>
                    <option value="fr" {{ request('language') == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="en" {{ request('language') == 'en' ? 'selected' : '' }}>English</option>
                </select>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>

                <a href="{{ route('admin.documents.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-lg font-medium transition-colors">
                    <i class="fas fa-redo mr-2"></i>Réinitialiser
                </a>
            </form>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Table des documents -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Langue</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fichier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléch.</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($documents as $document)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $document->order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-{{ $document->file_type == 'pdf' ? 'pdf' : 'alt' }} text-2xl text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $document->title }}</p>
                                        @if($document->description)
                                            <p class="text-xs text-gray-500 mt-1">{{ Str::limit($document->description, 60) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full
                                    @if($document->category == 'declaration') bg-blue-100 text-blue-800
                                    @elseif($document->category == 'rapport') bg-purple-100 text-purple-800
                                    @elseif($document->category == 'publication') bg-green-100 text-green-800
                                    @elseif($document->category == 'guide') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $document->category_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $document->language_label }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-xs text-gray-500">
                                    {{ $document->formatted_file_size }}<br>
                                    <span class="uppercase">{{ $document->file_type }}</span>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $document->download_count }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <form action="{{ route('admin.documents.toggle-status', $document) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="focus:outline-none" title="{{ $document->is_active ? 'Désactiver' : 'Activer' }}">
                                            <i class="fas fa-circle text-{{ $document->is_active ? 'green' : 'gray' }}-500"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.documents.toggle-featured', $document) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="focus:outline-none" title="{{ $document->is_featured ? 'Retirer vedette' : 'Mettre en vedette' }}">
                                            <i class="fas fa-star text-{{ $document->is_featured ? 'yellow' : 'gray' }}-400"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openDocumentViewer('{{ $document->file_url }}', '{{ addslashes($document->title) }}', '{{ $document->file_name }}')"
                                            class="text-blue-600 hover:text-blue-900"
                                            title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('admin.documents.edit', $document) }}" class="text-green-600 hover:text-green-900" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="text-gray-400">
                                    <i class="fas fa-folder-open text-5xl mb-4"></i>
                                    <p class="text-lg">Aucun document trouvé</p>
                                    <a href="{{ route('admin.documents.create') }}" class="text-green-600 hover:text-green-700 font-medium mt-2 inline-block">
                                        Ajouter le premier document
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($documents->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $documents->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Visualiseur de Document -->
    <div id="documentViewerModal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop -->
        <div class="modal-backdrop fixed inset-0 bg-black bg-opacity-75 transition-opacity" onclick="closeDocumentViewer()"></div>

        <!-- Modal Content -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="modal-content bg-white rounded-lg shadow-2xl w-full relative animate-fade-in">

                <!-- Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-gray-50 rounded-t-lg">
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <i class="fas fa-file-pdf text-2xl text-red-500 flex-shrink-0"></i>
                        <div class="min-w-0 flex-1">
                            <h3 id="modalDocumentTitle" class="text-lg font-semibold text-gray-800 truncate"></h3>
                            <p id="modalDocumentFileName" class="text-xs text-gray-500 truncate"></p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 ml-4">
                        <!-- Bouton Télécharger -->
                        <a id="modalDownloadBtn"
                           href="#"
                           download
                           class="flex items-center space-x-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors font-medium">
                            <i class="fas fa-download"></i>
                            <span class="hidden sm:inline">Télécharger</span>
                        </a>

                        <!-- Bouton Ouvrir dans nouvel onglet -->
                        <a id="modalOpenNewTabBtn"
                           href="#"
                           target="_blank"
                           class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors font-medium">
                            <i class="fas fa-external-link-alt"></i>
                            <span class="hidden sm:inline">Ouvrir</span>
                        </a>

                        <!-- Bouton Fermer -->
                        <button onclick="closeDocumentViewer()"
                                class="text-gray-400 hover:text-gray-600 transition-colors p-2">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
                </div>

                <!-- PDF Viewer -->
                <div class="relative bg-gray-100">
                    <iframe id="documentFrame"
                            class="pdf-viewer w-full border-0"
                            src="">
                    </iframe>

                    <!-- Loader -->
                    <div id="documentLoader" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                        <div class="text-center">
                            <i class="fas fa-spinner fa-spin text-4xl text-green-600 mb-4"></i>
                            <p class="text-gray-600">Chargement du document...</p>
                        </div>
                    </div>
                </div>

                <!-- Footer avec info -->
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <div class="flex items-center space-x-4">
                            <span><i class="fas fa-info-circle mr-1"></i> Utilisez la molette pour zoomer</span>
                            <span class="hidden sm:inline"><i class="fas fa-mouse mr-1"></i> Cliquez pour naviguer</span>
                        </div>
                        <span class="hidden md:inline">Échap pour fermer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Fonction pour ouvrir le visualiseur de document
        function openDocumentViewer(fileUrl, title, fileName) {
            const modal = document.getElementById('documentViewerModal');
            const iframe = document.getElementById('documentFrame');
            const loader = document.getElementById('documentLoader');
            const titleElement = document.getElementById('modalDocumentTitle');
            const fileNameElement = document.getElementById('modalDocumentFileName');
            const downloadBtn = document.getElementById('modalDownloadBtn');
            const openNewTabBtn = document.getElementById('modalOpenNewTabBtn');

            // Définir les informations du document
            titleElement.textContent = title;
            fileNameElement.textContent = fileName;
            downloadBtn.href = fileUrl;
            downloadBtn.download = fileName;
            openNewTabBtn.href = fileUrl;

            // Afficher le modal et le loader
            modal.classList.remove('hidden');
            loader.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Charger le document dans l'iframe
            iframe.src = fileUrl;

            // Masquer le loader une fois le document chargé
            iframe.onload = function() {
                setTimeout(() => {
                    loader.classList.add('hidden');
                }, 500);
            };
        }

        // Fonction pour fermer le visualiseur
        function closeDocumentViewer() {
            const modal = document.getElementById('documentViewerModal');
            const iframe = document.getElementById('documentFrame');

            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';

            // Vider l'iframe pour économiser les ressources
            setTimeout(() => {
                iframe.src = '';
            }, 300);
        }

        // Fermer avec la touche Échap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('documentViewerModal');
                if (!modal.classList.contains('hidden')) {
                    closeDocumentViewer();
                }
            }
        });

        // Animation d'entrée
        const style = document.createElement('style');
        style.textContent = `
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.2s ease-out;
        }
    `;
        document.head.appendChild(style);
    </script>
@endpush
