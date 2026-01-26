<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Agronomie')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        @layer utilities {
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
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
            <a href="#" class="flex items-center space-x-2">
                <i class="fas fa-leaf text-2xl"></i>
                <span class="text-xl font-bold">AgroOrg</span>
            </a>
            <button id="closeSidebar" class="md:hidden text-white hover:text-gray-300">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-6 px-4 overflow-y-auto scrollbar-hide h-[calc(100vh-8rem)]">
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-green-700 hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-home"></i>
                <span>Tableau de bord</span>
            </a>

            <a href="{{ route('admin.documents.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-seedling"></i>
                <span>gestion des Documents</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-mountain"></i>
                <span>Analyse des sols</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-cloud-sun"></i>
                <span>Météo</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-tractor"></i>
                <span>Équipements</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-chart-line"></i>
                <span>Statistiques</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-file-alt"></i>
                <span>Rapports</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-users"></i>
                <span>Équipe</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-bell"></i>
                <span>Alertes</span>
                <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">3</span>
            </a>

            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-green-700 transition-colors mb-2">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>

        <!-- Footer Sidebar -->
        <div class="absolute bottom-0 left-0 right-0 p-4 bg-green-900">
            <div class="flex items-center space-x-3 px-4 py-2">
                <img src="https://ui-avatars.com/api/?name=Admin&background=4ade80&color=fff"
                     alt="Admin"
                     class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="text-sm font-semibold">Administrateur</p>
                    <p class="text-xs text-gray-300">admin@agroorg.com</p>
                </div>
                <button class="hover:text-gray-300" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
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
            <div class="flex-1 md:flex-none">
                <h1 class="text-xl font-semibold text-gray-800 ml-4 md:ml-0">
                    @yield('page-title', 'Tableau de bord')
                </h1>
            </div>

            <!-- Actions Header -->
            <div class="flex items-center space-x-4">

                <!-- Recherche (masqué sur mobile) -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <input type="text"
                               placeholder="Rechercher..."
                               class="w-64 px-4 py-2 pl-10 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="relative">
                    <button class="relative text-gray-600 hover:text-gray-900" onclick="toggleNotifications()">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </button>

                    <!-- Dropdown notifications -->
                    <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <div class="p-4 border-b border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-800">Notifications</h3>
                        </div>

                        <div class="max-h-96 overflow-y-auto">
                            <a href="#" class="block p-4 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-green-100 p-2 rounded-full">
                                        <i class="fas fa-seedling text-green-600 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-800">Nouvelle culture ajoutée</p>
                                        <p class="text-xs text-gray-500 mt-1">Il y a 2 heures</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="block p-4 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-yellow-100 p-2 rounded-full">
                                        <i class="fas fa-exclamation-triangle text-yellow-600 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-800">Alerte météo</p>
                                        <p class="text-xs text-gray-500 mt-1">Il y a 5 heures</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="block p-4 hover:bg-gray-50">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-blue-100 p-2 rounded-full">
                                        <i class="fas fa-file-alt text-blue-600 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-800">Rapport mensuel disponible</p>
                                        <p class="text-xs text-gray-500 mt-1">Il y a 1 jour</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="p-3 border-t border-gray-200">
                            <a href="#" class="text-sm text-green-600 hover:text-green-700 font-medium block text-center">
                                Voir toutes les notifications
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Avatar utilisateur -->
                <div class="hidden md:block relative">
                    <button onclick="toggleUserMenu()" class="flex items-center space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=16a34a&color=fff"
                             alt="Admin"
                             class="w-8 h-8 rounded-full hover:ring-2 hover:ring-green-500 transition-all">
                    </button>

                    <!-- Dropdown user menu -->
                    <div id="userMenuDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 border border-gray-200">
                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 border-b border-gray-100">
                            <i class="fas fa-user mr-2"></i> Mon profil
                        </a>

                        <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 border-b border-gray-100">
                            <i class="fas fa-cog mr-2"></i> Paramètres
                        </a>

                        <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- ======================= ZONE DE CONTENU ======================= -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-100">
            @yield('content')
        </main>

        <!-- ======================= FOOTER ======================= -->
        <footer class="bg-white border-t border-gray-200 py-4 px-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} AgroOrg. Tous droits réservés.</p>
                <div class="flex space-x-4 mt-2 md:mt-0">
                    <a href="#" class="hover:text-green-600 transition-colors">Aide</a>
                    <a href="#" class="hover:text-green-600 transition-colors">Documentation</a>
                    <a href="#" class="hover:text-green-600 transition-colors">Contact</a>
                    <a href="#" class="hover:text-green-600 transition-colors">Confidentialité</a>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- ======================= JAVASCRIPT ======================= -->
<script>
    // ============ Gestion du sidebar mobile ============
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

    // ============ Toggle notifications dropdown ============
    function toggleNotifications() {
        const dropdown = document.getElementById('notificationsDropdown');
        const userMenu = document.getElementById('userMenuDropdown');

        if (userMenu && !userMenu.classList.contains('hidden')) {
            userMenu.classList.add('hidden');
        }

        dropdown.classList.toggle('hidden');
    }

    // ============ Toggle user menu dropdown ============
    function toggleUserMenu() {
        const dropdown = document.getElementById('userMenuDropdown');
        const notifications = document.getElementById('notificationsDropdown');

        if (notifications && !notifications.classList.contains('hidden')) {
            notifications.classList.add('hidden');
        }

        dropdown.classList.toggle('hidden');
    }

    // ============ Fermer les dropdowns en cliquant à l'extérieur ============
    document.addEventListener('click', function(event) {
        const notificationsDropdown = document.getElementById('notificationsDropdown');
        const userMenuDropdown = document.getElementById('userMenuDropdown');

        if (!event.target.closest('#notificationsDropdown') &&
            !event.target.closest('button[onclick="toggleNotifications()"]')) {
            notificationsDropdown?.classList.add('hidden');
        }

        if (!event.target.closest('#userMenuDropdown') &&
            !event.target.closest('button[onclick="toggleUserMenu()"]')) {
            userMenuDropdown?.classList.add('hidden');
        }
    });

    // ============ Animation des liens du sidebar ============
    document.querySelectorAll('aside nav a').forEach(link => {
        link.addEventListener('click', function(e) {
            document.querySelectorAll('aside nav a').forEach(l => {
                l.classList.remove('bg-green-700');
            });

            this.classList.add('bg-green-700');
        });
    });
</script>

@stack('scripts')
</body>
</html>
