<div id="preloader" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center">
    <div class="relative">
        <!-- Spinner Animation -->
        <div class="w-20 h-20 border-4 border-gray-200 border-t-primary rounded-full animate-spin"></div>

        <!-- Logo au centre (optionnel) -->
        <div class="absolute inset-0 flex items-center justify-center">
            <img src="{{ asset('images/logo-icon.png') }}" alt="Loading" class="w-10 h-10">
        </div>
    </div>
</div>

<style>
    #preloader {
        transition: opacity 0.5s ease-out;
    }

    #preloader.fade-out {
        opacity: 0;
        pointer-events: none;
    }
</style>

<script>
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        setTimeout(() => {
            preloader.classList.add('fade-out');
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        }, 500);
    });
</script>
