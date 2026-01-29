{{-- resources/views/articles/show.blade.php --}}
@extends('layouts.app')

@section('title', $article->title)

@push('styles')
    {{-- Open Graph Meta Tags pour WhatsApp et réseaux sociaux --}}
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}">
    <meta property="og:image" content="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/default-og.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}">
    <meta name="twitter:image" content="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/default-og.jpg') }}">

    <style>
        .article-content {
            line-height: 1.8;
        }
        .article-content h2 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        .article-content h3 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #374151;
        }
        .article-content p {
            margin-bottom: 1.25rem;
            color: #4b5563;
        }
        .article-content img {
            border-radius: 0.75rem;
            margin: 2rem auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .article-content ul, .article-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1.25rem;
        }
        .article-content li {
            margin-bottom: 0.5rem;
        }
        .article-content blockquote {
            border-left: 4px solid #16a34a;
            padding-left: 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #6b7280;
        }
        .article-content a {
            color: #16a34a;
            text-decoration: underline;
        }
        .article-content a:hover {
            color: #15803d;
        }

        .share-button {
            transition: all 0.3s ease;
        }
        .share-button:hover {
            transform: translateY(-2px);
        }

        .sticky-share {
            position: sticky;
            top: 100px;
        }
    </style>
@endpush

@section('content')
    {{-- Hero de l'article --}}
    <article class="bg-white">
        {{-- Image de couverture --}}
        @if($article->featured_image)
            <div class="relative h-96 md:h-[500px] overflow-hidden">
                <img src="{{ asset('storage/' . $article->featured_image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                {{-- Titre sur l'image --}}
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="container mx-auto max-w-4xl">
                        @if($article->category)
                            <span class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-full mb-4">
                            {{ $article->category }}
                        </span>
                        @endif
                        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $article->title }}</h1>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gradient-to-br from-green-600 to-green-800 text-white py-16">
                <div class="container mx-auto px-4 max-w-4xl">
                    @if($article->category)
                        <span class="inline-block px-4 py-2 bg-white/20 text-white text-sm font-semibold rounded-full mb-4">
                        {{ $article->category }}
                    </span>
                    @endif
                    <h1 class="text-3xl md:text-5xl font-bold">{{ $article->title }}</h1>
                </div>
            </div>
        @endif

        {{-- Méta informations --}}
        <div class="border-b bg-gray-50">
            <div class="container mx-auto px-4 max-w-4xl py-6">
                <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600">
                    @if($article->author)
                        <div class="flex items-center">
                            <i class="fas fa-user-circle text-green-600 text-xl mr-2"></i>
                            <span class="font-medium">{{ $article->author }}</span>
                        </div>
                    @endif

                    <div class="flex items-center">
                        <i class="far fa-calendar text-green-600 mr-2"></i>
                        <span>{{ $article->published_at->format('d M Y') }}</span>
                    </div>

                    <div class="flex items-center">
                        <i class="far fa-clock text-green-600 mr-2"></i>
                        <span>{{ $article->read_time }} min de lecture</span>
                    </div>

                    <div class="flex items-center">
                        <i class="far fa-eye text-green-600 mr-2"></i>
                        <span>{{ $article->views }} vues</span>
                    </div>

                    @if($article->gallery_images && count($article->gallery_images) > 0)
                        <div class="flex items-center">
                            <i class="far fa-images text-green-600 mr-2"></i>
                            <span>{{ count($article->gallery_images) + 1 }} images</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Contenu de l'article --}}
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Contenu principal --}}
                <div class="flex-1 max-w-4xl">
                    {{-- Extrait --}}
                    @if($article->excerpt)
                        <div class="bg-green-50 border-l-4 border-green-600 p-6 rounded-r-lg mb-8">
                            <p class="text-lg text-gray-700 italic">{{ $article->excerpt }}</p>
                        </div>
                    @endif

                    {{-- Contenu de l'article --}}
                    <div class="article-content prose prose-lg max-w-none">
                        {!! $article->content !!}
                    </div>

                    {{-- Galerie d'images --}}
                    @if($article->gallery_images && count($article->gallery_images) > 0)
                        <div class="mt-12 border-t pt-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">
                                <i class="fas fa-images text-green-600 mr-2"></i>Galerie d'images
                            </h3>
                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($article->gallery_images as $image)
                                    <a href="{{ asset('storage/' . $image) }}" target="_blank" class="group">
                                        <img src="{{ asset('storage/' . $image) }}"
                                             alt="Gallery image"
                                             class="w-full h-48 object-cover rounded-lg group-hover:opacity-90 transition-opacity">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Boutons de partage mobile --}}
                    <div class="lg:hidden mt-8 p-6 bg-gray-50 rounded-lg">
                        <h4 class="font-bold text-gray-800 mb-4">Partager cet article</h4>
                        <div class="flex flex-wrap gap-3">
                            {{-- WhatsApp --}}
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . route('blog.show', $article->slug)) }}"
                               target="_blank"
                               class="share-button flex items-center gap-2 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                                <i class="fab fa-whatsapp text-xl"></i>
                                <span>WhatsApp</span>
                            </a>

                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $article->slug)) }}"
                               target="_blank"
                               class="share-button flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>

                            {{-- Twitter --}}
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $article->slug)) }}&text={{ urlencode($article->title) }}"
                               target="_blank"
                               class="share-button flex items-center gap-2 px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>

                            {{-- LinkedIn --}}
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $article->slug)) }}"
                               target="_blank"
                               class="share-button flex items-center gap-2 px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>

                            {{-- Copier le lien --}}
                            <button onclick="copyLink()"
                                    class="share-button flex items-center gap-2 px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                                <i class="fas fa-link"></i>
                                <span>Copier</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:w-80">
                    <div class="sticky-share space-y-6">
                        {{-- Partage social (Desktop) --}}
                        <div class="hidden lg:block bg-white p-6 rounded-lg shadow-md">
                            <h4 class="font-bold text-gray-800 mb-4">Partager</h4>
                            <div class="space-y-3">
                                {{-- WhatsApp --}}
                                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . route('blog.show', $article->slug)) }}"
                                   target="_blank"
                                   class="share-button flex items-center gap-3 w-full px-4 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                    <span>WhatsApp</span>
                                </a>

                                {{-- Facebook --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $article->slug)) }}"
                                   target="_blank"
                                   class="share-button flex items-center gap-3 w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span>
                                </a>

                                {{-- Twitter --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $article->slug)) }}&text={{ urlencode($article->title) }}"
                                   target="_blank"
                                   class="share-button flex items-center gap-3 w-full px-4 py-3 bg-sky-500 hover:bg-sky-600 text-white rounded-lg">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span>
                                </a>

                                {{-- LinkedIn --}}
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $article->slug)) }}"
                                   target="_blank"
                                   class="share-button flex items-center gap-3 w-full px-4 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-lg">
                                    <i class="fab fa-linkedin-in"></i>
                                    <span>LinkedIn</span>
                                </a>

                                {{-- Copier le lien --}}
                                <button onclick="copyLink()"
                                        id="copyButton"
                                        class="share-button flex items-center gap-3 w-full px-4 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                                    <i class="fas fa-link"></i>
                                    <span>Copier le lien</span>
                                </button>
                            </div>
                        </div>

                        {{-- Articles similaires --}}
                        @if($relatedArticles->count() > 0)
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <h4 class="font-bold text-gray-800 mb-4">Articles similaires</h4>
                                <div class="space-y-4">
                                    @foreach($relatedArticles as $related)
                                        <a href="{{ route('blog.show', $related->slug) }}" class="block group">
                                            <div class="flex gap-3">
                                                @if($related->featured_image)
                                                    <img src="{{ asset('storage/' . $related->featured_image) }}"
                                                         alt="{{ $related->title }}"
                                                         class="w-20 h-20 object-cover rounded-lg">
                                                @else
                                                    <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <i class="fas fa-newspaper text-green-600"></i>
                                                    </div>
                                                @endif
                                                <div class="flex-1">
                                                    <h5 class="font-medium text-gray-800 group-hover:text-green-600 transition-colors line-clamp-2">
                                                        {{ $related->title }}
                                                    </h5>
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        {{ $related->published_at->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
        </div>

        {{-- Navigation précédent/suivant --}}
        <div class="border-t bg-gray-50">
            <div class="container mx-auto px-4 py-8 max-w-6xl">
                <div class="flex justify-between items-center">
                    <a href="{{ route('blog.index') }}"
                       class="text-green-600 hover:text-green-700 flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Retour aux articles</span>
                    </a>
                </div>
            </div>
        </div>
    </article>

    @push('scripts')
        <script>
            function copyLink() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(function() {
                    const button = document.getElementById('copyButton');
                    const originalContent = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i><span>Copié !</span>';
                    button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
                    button.classList.add('bg-green-600');

                    setTimeout(function() {
                        button.innerHTML = originalContent;
                        button.classList.remove('bg-green-600');
                        button.classList.add('bg-gray-600', 'hover:bg-gray-700');
                    }, 2000);
                });
            }
        </script>
    @endpush
@endsection
