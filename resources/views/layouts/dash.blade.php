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
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Pour Firefox */
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) rgba(255, 255, 255, 0.1);
        }

        /* Empêcher le scroll du body quand la sidebar mobile est ouverte */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Animation plus fluide pour la sidebar */
        .sidebar-transition {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">

    <!-- ======================= SIDEBAR ======================= -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-green-800 text-white transform -translate-x-full sidebar-transition md:relative md:translate-x-0 md:flex md:flex-col">

        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center justify-between h-16 px-6 bg-green-900">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/lo.png') }}" alt="COASP Logo" class="h-10 w-auto">
                <span class="text-xl font-bold">COASP</span>
            </a>

            <button id="closeSidebar" class="md:hidden text-white hover:text-gray-300">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation - Scrollable -->
        <nav class="flex-1 overflow-y-auto px-4 py-4 scrollbar-thin">
            <!-- Tableau de bord -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-home"></i>
                <span>Tableau de bord</span>
            </a>

            <!-- Documents -->
            <a href="{{ route('admin.documents.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.documents.*') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-file-alt"></i>
                <span>Documents</span>
            </a>

            <!-- Articles -->
            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.articles.*') ? 'bg-green-700' : 'hover:bg-green-700' }} transition-colors mb-2">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
            </a>

            <!-- Galeries -->
            <a href="{{ route('admin.galleries.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.galleries.*') ? 'bg-green-700 text-white' : 'hover:bg-green-700 hover:text-white' }} transition-colors mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Galeries</span>
            </a>

            <!-- Membres d'Équipe -->
            <a href="{{ route('admin.team-members.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.team-members.*') ? 'bg-green-700 text-white' : 'hover:bg-green-700 hover:text-white' }} transition-colors mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m8-4a4 4 0 10-8 0 4 4 0 008 0zM7 10a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span>Membres d'Équipe</span>
            </a>

            <!-- Séparateur -->
            <div class="border-t border-green-700 my-4"></div>

            <!-- Section Réseaux -->
            <div class="mb-2 px-4 text-xs font-semibold text-green-300 uppercase tracking-wider">
                Réseaux
            </div>

            <!-- Partenaires -->
            <a href="{{ route('admin.partners.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.partners.*') ? 'bg-green-700 text-white' : 'hover:bg-green-700 hover:text-white' }} transition-colors mb-2">
                <i class="fas fa-handshake"></i>
                <span>Partenaires</span>
            </a>

            <!-- Alliés -->
            <a href="{{ route('admin.allies.index') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.allies.*') ? 'bg-green-700 text-white' : 'hover:bg-green-700 hover:text-white' }} transition-colors mb-2">
                <i class="fas fa-users"></i>
                <span>Alliés</span>
            </a>

        </nav>

        <!-- Footer Sidebar avec déconnexion -->
        <div class="flex-shrink-0 p-4 bg-green-900 mt-auto">
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
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- ======================= CONTENU PRINCIPAL ======================= -->
    <div class="flex-1 flex flex-col overflow-hidden min-w-0">

        <!-- ======================= HEADER ======================= -->
        <header class="flex-shrink-0 bg-white shadow-sm h-16 flex items-center justify-between px-4 md:px-6">

            <!-- Bouton Menu Mobile -->
            <button id="openSidebar" class="md:hidden text-gray-600 hover:text-gray-900">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Titre de la page -->
            <div class="flex-1 min-w-0">
                <h1 class="text-xl font-semibold text-gray-800 ml-4 md:ml-0 truncate">
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
        <footer class="flex-shrink-0 bg-white border-t border-gray-200 py-3 px-6">
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
    const body = document.body;

    const openSidebar = () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        body.classList.add('sidebar-open');
    };

    const closeSidebar = () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        body.classList.remove('sidebar-open');
    };

    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    // Fermer la sidebar si on clique sur un lien
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                closeSidebar();
            }
        });
    });

    // Fermer la sidebar en appuyant sur Echap
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && window.innerWidth < 768) {
            closeSidebar();
        }
    });

    // Gestion du resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('hidden');
            body.classList.remove('sidebar-open');
        } else {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script>

@stack('scripts')
</body>
</html>
