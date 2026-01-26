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
    </style>
@endpush

@section('content')

    <!-- Filtres -->
    <section class="py-8 px-4 bg-white border-b">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-wrap justify-center gap-3">
                <button class="filter-btn px-6 py-2 rounded-full bg-green-600 text-white font-medium" data-filter="all">
                    Tous les documents
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium" data-filter="declaration">
                    Déclarations
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-gray-100 text-gray-700 font-medium" data-filter="journal">
                    Journaux
                </button>
            </div>
        </div>
    </section>

    <!-- Grille de Documents -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="documentsGrid">

                <!-- Document 1 - 7ème Edition 2022 -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="declaration recent">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">2022</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">7ème Édition 2022</h3>
                        <p class="text-gray-600 text-sm mb-4">Déclaration de la Foire COASP - Engagement pour une souveraineté semencière</p>

                        <a href="{{ asset('docs/Declaration-de-la-7eme-edition-Foire-COASP-2022.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

                <!-- Document 2 - Déclaration Djimini 2018 (FR) -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="declaration">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">2018 🇫🇷</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Déclaration Djimini 2018</h3>
                        <p class="text-gray-600 text-sm mb-4">Version française de la déclaration sur les semences paysannes</p>

                        <a href="{{ asset('docs/Declaration-Djimini-2018-finale.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

                <!-- Document 3 - Djimini Declaration 2018 (EN) -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="declaration">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">2018 🇬🇧</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Djimini Declaration 2018</h3>
                        <p class="text-gray-600 text-sm mb-4">English version - Peasant Seed Fair Declaration</p>

                        <a href="{{ asset('docs/Declaration-Djimini-Peasant-Seed-Fair-2018-English.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download
                        </a>
                    </div>
                </div>

                <!-- Document 4 - Foire 2014 -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="journal">
                    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">2014</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Foire 2014</h3>
                        <p class="text-gray-600 text-sm mb-4">Journal de la Foire des semences paysannes ASPSP 2014</p>

                        <a href="{{ asset('docs/ASPSP_2014_journal_foire.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

                <!-- Document 5 - 4ème Edition -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="declaration">
                    <div class="bg-gradient-to-br from-red-500 to-red-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">4ème Édition</span>
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">4ème Édition</h3>
                        <p class="text-gray-600 text-sm mb-4">Déclaration de la Foire Ouest-Africaine des semences paysannes</p>

                        <a href="{{ asset('docs/DECLARATION_Foire_Ouest_Africaine_4eme-Edition.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

                <!-- Document 6 - Foire 2011 -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="declaration">
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">2011</span>
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Foire 2011</h3>
                        <p class="text-gray-600 text-sm mb-4">Déclaration de la Foire des semences paysannes 2011</p>

                        <a href="{{ asset('docs/Foire-semences-Paysannes-2011-Declaration.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

                <!-- Document 7 - 3ème Foire Sous-Régionale -->
                <div class="document-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="journal">
                    <div class="bg-gradient-to-br from-pink-500 to-pink-600 h-40 flex items-center justify-center">
                        <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">3ème Édition</span>
                            <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-bold">PDF</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">3ème Foire Sous-Régionale</h3>
                        <p class="text-gray-600 text-sm mb-4">Publication Grain Magazine - Foire ouest-africaine</p>

                        <a href="{{ asset('docs/grain-4545-3eme-foire-sous-regionale-ouest-africaine-des-semences-paysannes.pdf') }}" target="_blank"
                           class="download-btn flex items-center justify-center w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section CTA -->
    <section class="py-16 px-4 bg-gradient-to-r from-green-700 to-green-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-white text-3xl font-bold mb-4">Besoin de plus d'informations ?</h2>
            <p class="text-green-100 text-lg mb-8">Contactez-nous pour obtenir d'autres documents</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center bg-white text-green-700 font-bold px-8 py-4 rounded-lg hover:bg-green-50 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Nous contacter
            </a>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const documentCards = document.querySelectorAll('.document-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-green-600', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700');
                    });
                    this.classList.remove('bg-gray-100', 'text-gray-700');
                    this.classList.add('bg-green-600', 'text-white');

                    // Filter cards
                    documentCards.forEach(card => {
                        const categories = card.getAttribute('data-category');
                        if (filter === 'all' || (categories && categories.includes(filter))) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endpush
