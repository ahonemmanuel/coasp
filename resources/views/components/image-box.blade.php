@props(['image', 'icon', 'title', 'description', 'link'])

<div class="group relative overflow-hidden rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
    <!-- Image -->
    <div class="relative h-64 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </div>

    <!-- Content -->
    <div class="p-6 bg-white">
        <!-- Icon -->
        <div class="flex items-center justify-center w-16 h-16 bg-accent rounded-full mb-4 transition-colors group-hover:bg-primary">
            {!! $icon !!}
        </div>

        <!-- Title -->
        <h4 class="text-xl font-outfit font-bold text-heading mb-3 group-hover:text-primary transition-colors">
            <a href="{{ $link }}">{{ $title }}</a>
        </h4>

        <!-- Description -->
        <p class="text-body mb-4 line-clamp-3">{{ $description }}</p>

        <!-- Button -->
        <a href="{{ $link }}" class="inline-flex items-center gap-2 text-primary font-outfit font-semibold hover:gap-3 transition-all">
            Voir Plus
            <svg class="w-5 h-5" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
        </a>
    </div>
</div>
