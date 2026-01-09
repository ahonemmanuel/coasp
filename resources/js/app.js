import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

Alpine.plugin(collapse)

window.Alpine = Alpine;
Alpine.start();

// Go Top Button
document.addEventListener('DOMContentLoaded', function() {
    const goTopBtn = document.getElementById('go-top');

    if (goTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                goTopBtn.classList.remove('opacity-0', 'invisible');
                goTopBtn.classList.add('opacity-100', 'visible');
            } else {
                goTopBtn.classList.remove('opacity-100', 'visible');
                goTopBtn.classList.add('opacity-0', 'invisible');
            }
        });

        goTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Search Toggle
    const searchToggle = document.querySelector('.search-toggle');
    const searchOverlay = document.getElementById('search-overlay');

    if (searchToggle && searchOverlay) {
        searchToggle.addEventListener('click', function(e) {
            e.preventDefault();
            searchOverlay.classList.toggle('hidden');
            if (!searchOverlay.classList.contains('hidden')) {
                searchOverlay.querySelector('input').focus();
            }
        });

        // Close on Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !searchOverlay.classList.contains('hidden')) {
                searchOverlay.classList.add('hidden');
            }
        });
    }

    // Sticky Header
    const header = document.getElementById('header');
    if (header) {
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.scrollY;

            if (currentScroll > 100) {
                header.classList.add('shadow-lg');
                header.querySelector('#logo img')?.classList.add('h-12');
                header.querySelector('#logo img')?.classList.remove('h-16');
            } else {
                header.classList.remove('shadow-lg');
                header.querySelector('#logo img')?.classList.remove('h-12');
                header.querySelector('#logo img')?.classList.add('h-16');
            }

            lastScroll = currentScroll;
        });
    }

    // Smooth Scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});
