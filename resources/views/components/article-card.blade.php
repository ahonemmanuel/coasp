{{-- resources/views/components/article-card.blade.php --}}
<article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
    <a href="{{ route('blog.show', $article->slug) }}">
        @if($article->featured_image)
            <div class="h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $article->featured_image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
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
        </div>
    </a>
</article>
