<section class="relative h-screen" x-data="slider()">
    <div class="relative h-full overflow-hidden">

        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform scale-105"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0">

                <!-- Background Image -->
                <div class="absolute inset-0">
                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40"></div>
                </div>

                <!-- Content -->
                <div class="relative h-full flex items-center">
                    <div class="container mx-auto px-4">
                        <div class="max-w-3xl text-white">
                            <!-- Subtitle -->
                            <p x-text="slide.subtitle"
                               x-show="currentSlide === index"
                               x-transition:enter="transition ease-out duration-700 delay-300"
                               x-transition:enter-start="opacity-0 transform translate-y-8"
                               x-transition:enter-end="opacity-100 transform translate-y-0"
                               class="text-accent font-semibold text-lg mb-4"></p>

                            <!-- Title -->
                            <h1 x-html="slide.title"
                                x-show="currentSlide === index"
                                x-transition:enter="transition ease-out duration-700 delay-500"
                                x-transition:enter-start="opacity-0 transform translate-y-8"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                class="text-5xl lg:text-7xl font-outfit font-bold mb-6 leading-tight"></h1>

                            <!-- Description -->
                            <p x-text="slide.description"
                               x-show="currentSlide === index"
                               x-transition:enter="transition ease-out duration-700 delay-700"
                               x-transition:enter-start="opacity-0 transform translate-y-8"
                               x-transition:enter-end="opacity-100 transform translate-y-0"
                               class="text-lg mb-8 leading-relaxed"></p>

                            <!-- Buttons -->
                            <div x-show="currentSlide === index"
                                 x-transition:enter="transition ease-out duration-700 delay-900"
                                 x-transition:enter-start="opacity-0 transform translate-y-8"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 class="flex flex-wrap gap-4">
                                <a :href="slide.button1Link" class="btn-primary">
                                    <span x-text="slide.button1Text"></span>
                                </a>
                                <a :href="slide.button2Link" class="bg-white hover:bg-gray-100 text-gray-900 font-outfit font-bold px-6 py-3 rounded-md transition-all">
                                    <span x-text="slide.button2Text"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- Navigation Arrows -->
        <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm flex items-center justify-center transition-all z-10 group">
            <svg class="w-6 h-6 text-white group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 backdrop-blur-sm flex items-center justify-center transition-all z-10 group">
            <svg class="w-6 h-6 text-white group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Pagination Dots -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-10">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="goToSlide(index)"
                        :class="currentSlide === index ? 'w-12 bg-accent' : 'w-3 bg-white/50 hover:bg-white/70'"
                        class="h-3 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>
</section>

<script>
    function slider() {
        return {
            currentSlide: 0,
            autoplayInterval: null,
            slides: [
                {
                    image: '{{ asset("images/slider/slide1.jpg") }}',
                    subtitle: 'Bienvenue au COASP',
                    title: 'Pour une Agriculture<br>Durable au Sénégal',
                    description: 'Nous soutenons les producteurs agricoles dans leur développement et la promotion de pratiques durables.',
                    button1Text: 'En savoir plus',
                    button1Link: '{{ route("about") }}',
                    button2Text: 'Contactez-nous',
                    button2Link: '{{ route("contact") }}'
                },
                {
                    image: '{{ asset("images/slider/slide2.jpg") }}',
                    subtitle: 'Notre Mission',
                    title: 'Renforcer les Capacités<br>des Producteurs',
                    description: 'Formation, accompagnement et plaidoyer pour une agriculture prospère et résiliente.',
                    button1Text: 'Nos Services',
                    button1Link: '#',
                    button2Text: 'Devenir Membre',
                    button2Link: '#'
                },
                {
                    image: '{{ asset("images/slider/slide3.jpg") }}',
                    subtitle: 'Ensemble',
                    title: 'Cultivons un Avenir<br>Florissant',
                    description: 'Rejoignez-nous dans notre engagement pour une agriculture durable et inclusive.',
                    button1Text: 'Découvrir',
                    button1Link: '#',
                    button2Text: 'Nous Rejoindre',
                    button2Link: '{{ route("contact") }}'
                }
            ],

            init() {
                this.startAutoplay();
            },

            next() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                this.resetAutoplay();
            },

            prev() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.resetAutoplay();
            },

            goToSlide(index) {
                this.currentSlide = index;
                this.resetAutoplay();
            },

            startAutoplay() {
                this.autoplayInterval = setInterval(() => {
                    this.next();
                }, 5000);
            },

            resetAutoplay() {
                clearInterval(this.autoplayInterval);
                this.startAutoplay();
            }
        }
    }
</script>
