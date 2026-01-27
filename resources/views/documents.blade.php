@extends('layouts.app')

@push('styles')
    <style>
        .document-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .document-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .download-btn {
            transition: all 0.3s;
        }

        .download-btn:hover {
            transform: scale(1.05);
        }

        .badge-new {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
    </style>
@endpush

@section('content')

    <!-- En-tête -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 py-16 px-4">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <i class="fas fa-file-alt mr-3"></i>
                Documents Utiles
            </h1>
            <p class="text-xl text-green-100 max-w-3xl mx-auto">
                Consultez et téléchargez nos documents, déclarations, rapports et publications
            </p>
        </div>
    </section>

    <!-- Filtres -->
    <section class="py-8 px-4 bg-white border-b sticky top-0 z-10 shadow-sm">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap justify-center gap-3">
                <button class="filter-btn px-6 py-2 rounded-full bg-green-600 text-white font-medium" data-filter="all">
                    <i class="fas fa-globe mr-2"></i>Tous les documents
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200" data-filter="declaration">
                    <i class="fas fa-file-signature mr-2"></i>Déclarations
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200" data-filter="journal">
                    <i class="fas fa-newspaper mr-2"></i>Journaux
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200" data-filter="publication">
                    <i class="fas fa-book mr-2"></i>Publications
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200" data-filter="rapport">
                    <i class="fas fa-chart-line mr-2"></i>Rapports
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200" data-filter="guide">
                    <i class="fas fa-book-open mr-2"></i>Guides
                </button>
            </div>
        </div>
    </section>

    <!-- Compteur de documents -->
    <section class="py-6 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between">
                <p class="text-gray-600">
                    <span id="documentCount">{{ count($allDocuments) }}</span> document(s) disponible(s)
                </p>
                <div class="flex items-center space-x-4 text-sm text-gray-500">
                    <span>
                        <i class="fas fa-star text-yellow-500 mr-1"></i>
                        <span id="dynamicCount">{{ collect($allDocuments)->where('is_dynamic', true)->count() }}</span> Nouveaux
                    </span>
                    <span>
                        <i class="fas fa-archive text-gray-400 mr-1"></i>
                        <span id="staticCount">{{ collect($allDocuments)->where('is_static', true)->count() }}</span> Archives
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Grille de Documents -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="documentsGrid">

                @foreach($allDocuments as $document)
                    <!-- Carte Document -->
                    <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden relative"
                         data-category="{{ $document['category'] }}">

                        <!-- Badge Nouveau (pour documents dynamiques) -->
                        @if(isset($document['is_dynamic']) && $document['is_dynamic'])
                            <div class="absolute top-4 right-4 z-10">
                                <span class="badge-new bg-gradient-to-r from-green-500 to-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                    <i class="fas fa-star mr-1"></i>NOUVEAU
                                </span>
                            </div>
                        @endif

                        <!-- Badge Vedette -->
                        @if(isset($document['is_featured']) && $document['is_featured'])
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                    <i class="fas fa-star mr-1"></i>VEDETTE
                                </span>
                            </div>
                        @endif

                        <!-- Icône Document -->
                        <div class="bg-gradient-to-br from-green-100 to-green-50 p-8 flex items-center justify-center">
                            <div class="text-center">
                                @if($document['file_type'] == 'pdf')
                                    <i class="fas fa-file-pdf text-7xl text-red-500 mb-2"></i>
                                @elseif(in_array($document['file_type'], ['doc', 'docx']))
                                    <i class="fas fa-file-word text-7xl text-blue-500 mb-2"></i>
                                @elseif(in_array($document['file_type'], ['xls', 'xlsx']))
                                    <i class="fas fa-file-excel text-7xl text-green-600 mb-2"></i>
                                @else
                                    <i class="fas fa-file-alt text-7xl text-gray-500 mb-2"></i>
                                @endif

                                <!-- Badge Catégorie -->
                                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                    @if($document['category'] == 'declaration') bg-blue-100 text-blue-800
                                    @elseif($document['category'] == 'journal') bg-purple-100 text-purple-800
                                    @elseif($document['category'] == 'publication') bg-green-100 text-green-800
                                    @elseif($document['category'] == 'rapport') bg-orange-100 text-orange-800
                                    @elseif($document['category'] == 'guide') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($document['category']) }}
                                </span>
                            </div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-6">
                            <!-- Titre -->
                            <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 min-h-[3.5rem]">
                                {{ $document['title'] }}
                            </h3>

                            <!-- Description -->
                            @if(isset($document['description']) && $document['description'])
                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                    {{ $document['description'] }}
                                </p>
                            @endif

                            <!-- Métadonnées -->
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                <div class="flex items-center space-x-3">
                                    <!-- Langue -->
                                    <span class="flex items-center">
                                        <i class="fas fa-language mr-1"></i>
                                        {{ $document['language'] == 'fr' ? 'FR' : 'EN' }}
                                    </span>

                                    <!-- Taille du fichier -->
                                    @if(isset($document['file_size']))
                                        <span class="flex items-center">
                                            <i class="fas fa-file mr-1"></i>
                                            {{ $document['file_size'] }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Compteur de téléchargements (pour documents dynamiques) -->
                                @if(isset($document['download_count']) && $document['download_count'] > 0)
                                    <span class="flex items-center text-green-600">
                                        <i class="fas fa-download mr-1"></i>
                                        {{ $document['download_count'] }}
                                    </span>
                                @endif
                            </div>

                            <!-- Bouton Télécharger -->
                            @if(isset($document['is_dynamic']) && $document['is_dynamic'])
                                <!-- Document dynamique depuis la base de données -->
                                <a href="{{ $document['download_route'] }}"
                                   class="download-btn block w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white text-center py-3 rounded-lg font-semibold shadow-md">
                                    <i class="fas fa-download mr-2"></i>
                                    Télécharger
                                </a>
                            @else
                                <!-- Document statique -->
                                <a href="{{ $document['file_url'] }}"
                                   target="_blank"
                                   class="download-btn block w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white text-center py-3 rounded-lg font-semibold shadow-md">
                                    <i class="fas fa-download mr-2"></i>
                                    Télécharger
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Message si aucun document -->
            <div id="noDocuments" class="hidden text-center py-16">
                <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                <p class="text-xl text-gray-500">Aucun document trouvé dans cette catégorie</p>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-8 md:p-12">
                <i class="fas fa-envelope text-5xl text-green-600 mb-4"></i>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Besoin d'autres documents ?
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Contactez-nous pour obtenir des documents spécifiques ou des informations complémentaires
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Nous contacter
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const documentCards = document.querySelectorAll('.document-card');
            const documentCount = document.getElementById('documentCount');
            const noDocuments = document.getElementById('noDocuments');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-green-600', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    this.classList.add('bg-green-600', 'text-white');

                    // Filtrer les documents
                    let visibleCount = 0;
                    documentCards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'block';
                            // Animation d'apparition
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'scale(1)';
                            }, 10);
                            visibleCount++;
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'scale(0.9)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });

                    // Mettre à jour le compteur
                    documentCount.textContent = visibleCount;

                    // Afficher le message si aucun document
                    if (visibleCount === 0) {
                        noDocuments.classList.remove('hidden');
                    } else {
                        noDocuments.classList.add('hidden');
                    }
                });
            });

            // Animation initiale des cartes
            documentCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 50);
            });
        });
    </script>
@endpush
