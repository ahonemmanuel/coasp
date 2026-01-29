{{-- resources/views/articles/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Blog - Articles & Actualités')

@push('styles')
    <style>
        .article-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .article-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-green-600 to-green-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Blog & Actualités</h1>
                <p class="text-xl text-green-100">Découvrez nos derniers articles, conseils et actualités</p>
            </div>
        </div>
    </section>

    {{-- Recherche et Filtres --}}
    <section class="bg-white border-b">
        <div class="container mx-auto px-4 py-6">
            <form method="GET" class="flex flex-col md:flex-row gap-4 items-center">
                {{-- Recherche --}}
                <div class="flex-1 w-full">
                    <div class="relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Rechercher un article..."
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                {{-- Filtre Catégorie --}}
                <div class="w-full md:w-64">
                    <select name="category"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                        class="w-full md:w-auto bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                    <i class="fas fa-filter mr-2"></i>Filtrer
                </button>
            </form>
        </div>
    </section>

    {{-- Articles en vedette --}}
    @if($featuredArticles->count() > 0 && !request()->has('search') && !request()->has('category'))
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>Articles en vedette
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($featuredArticles as $featured)
                        <article class="article-card bg-white rounded-xl shadow-md overflow-hidden">
                            <a href="{{ route('blog.show', $featured->slug) }}">
                                @if($featured->featured_image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $featured->featured_image) }}"
                                             alt="{{ $featured->title }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-5xl"></i>
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex items-center gap-3 mb-3">
                                        @if($featured->category)
                                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                        {{ $featured->category }}
                                    </span>
                                        @endif
                                        <span class="text-yellow-500">
                                    <i class="fas fa-star"></i>
                                </span>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-green-600 transition-colors">
                                        {{ $featured->title }}
                                    </h3>

                                    @if($featured->excerpt)
                                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $featured->excerpt }}</p>
                                    @endif

                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span><i class="far fa-calendar mr-1"></i>{{ $featured->published_at->format('d/m/Y') }}</span>
                                        <span><i class="far fa-eye mr-1"></i>{{ $featured->views }}</span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Tous les articles --}}
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">
                @if(request()->has('search'))
                    Résultats de recherche
                @elseif(request()->has('category'))
                    Catégorie : {{ request('category') }}
                @else
                    Tous les articles
                @endif
            </h2>

            @if($articles->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($articles as $article)
                        <article class="article-card bg-white rounded-xl shadow-md overflow-hidden">
                            <a href="{{ route('blog.show', $article->slug) }}">
                                @if($article->featured_image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $article->featured_image) }}"
                                             alt="{{ $article->title }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-5xl"></i>
                                    </div>
                                @endif

                                <div class="p-6">
                                    @if($article->category)
                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">
                                        {{ $article->category }}
                                    </span>
                                    @endif

                                    <h3 class="text-xl font-bold text-gray-800 mt-3 mb-2 hover:text-green-600 transition-colors">
                                        {{ $article->title }}
                                    </h3>

                                    @if($article->excerpt)
                                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $article->excerpt }}</p>
                                    @endif

                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span><i class="far fa-calendar mr-1"></i>{{ $article->published_at->format('d/m/Y') }}</span>
                                        <span><i class="far fa-eye mr-1"></i>{{ $article->views }}</span>
                                    </div>

                                    @if($article->author)
                                        <div class="mt-3 pt-3 border-t border-gray-100 flex items-center">
                                            <i class="fas fa-user-circle text-gray-400 mr-2"></i>
                                            <span class="text-sm text-gray-600">{{ $article->author }}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-search text-gray-300 text-6xl mb-4"></i>
                    <p class="text-gray-500 text-lg mb-4">Aucun article trouvé</p>
                    <a href="{{ route('blog.index') }}" class="text-green-600 hover:text-green-700">
                        Voir tous les articles
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
