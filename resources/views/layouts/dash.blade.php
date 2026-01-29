<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Admin - AgroOrg')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">

    <!-- ======================= SIDEBAR ======================= -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-green-800 text-white transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0">

        <!-- Logo -->
        <div class="flex items-center justify-between h-16 px-6 bg-green-900">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                <i class="fas fa-leaf text-2xl"></i>
                <span class="text-xl font-bold">AgroOrg</span>
            </a>
            <button id="closeSidebar" class="md:hidden text-white hover:text-gray-300">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4 overflow-y-auto scrollbar-hide h-[calc(100vh-8rem)]">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-home"></i>
                <span>Tableau de bord</span>
            </a>

            <a href="{{ route('admin.documents.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.documents.*') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-file-alt"></i>
                <span>Documents</span>
            </a>

            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.articles.*') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
            </a>

                <a href="{{ route('admin.galleries.index') }}"
                   class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.galleries.*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Galeries</span>
                </a>


        </nav>

        <!-- Footer Sidebar avec déconnexion -->
        <div class="absolute bottom-0 left-0 right-0 p-4 bg-green-900">
            <div class="flex items-center space-x-3 px-4 py-2">
                <img src="https://ui-avatars.com/api/?name=Admin&background=4ade80&color=fff"
                     alt="Admin"
                     class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="text-sm font-semibold">Administrateur</p>
                    <p class="text-xs text-gray-300">admin@agroorg.com</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="hover:text-red-400 transition-colors" title="Déconnexion">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Overlay pour mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- ======================= CONTENU PRINCIPAL ======================= -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- ======================= HEADER ======================= -->
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-4 md:px-6">

            <!-- Bouton Menu Mobile -->
            <button id="openSidebar" class="md:hidden text-gray-600 hover:text-gray-900">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Titre de la page -->
            <div class="flex-1">
                <h1 class="text-xl font-semibold text-gray-800 ml-4 md:ml-0">
                    @yield('page-title', 'Tableau de bord')
                </h1>
            </div>

            <!-- Actions Header - Déconnexion rapide -->
            <div class="flex items-center space-x-4">
                <!-- Bouton déconnexion simple -->
                <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden md:inline">Déconnexion</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- ======================= ZONE DE CONTENU ======================= -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        <!-- ======================= FOOTER ======================= -->
        <footer class="bg-white border-t border-gray-200 py-3 px-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} AgroOrg. Tous droits réservés.</p>
                <div class="flex space-x-4 mt-2 md:mt-0">
                    <a href="#" class="hover:text-green-600 transition-colors">Aide</a>
                    <a href="#" class="hover:text-green-600 transition-colors">Contact</a>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- ======================= JAVASCRIPT ======================= -->
<script>
    // Gestion du sidebar mobile
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const openBtn = document.getElementById('openSidebar');
    const closeBtn = document.getElementById('closeSidebar');

    openBtn.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    const closeSidebar = () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    };

    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            overlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });

    // Toggle notifications
    function toggleNotifications() {
        const dropdown = document.getElementById('notificationsDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Fermer les dropdowns en cliquant à l'extérieur
    document.addEventListener('click', function(event) {
        const notificationsDropdown = document.getElementById('notificationsDropdown');

        if (!event.target.closest('#notificationsDropdown') &&
            !event.target.closest('button[onclick="toggleNotifications()"]')) {
            notificationsDropdown?.classList.add('hidden');
        }
    });

    // Auto-fermer les messages de succès/erreur après 5 secondes
</script>

@stack('scripts')
</body>
</html>
