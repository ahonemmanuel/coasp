{{-- resources/views/admin/allies/index.blade.php --}}
@extends('layouts.dash')

@section('title', 'Gestion des Alliés')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-users mr-2"></i> Gestion des Alliés
            </h1>
            <a href="{{ route('admin.allies.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300">
                <i class="fas fa-plus mr-2"></i> Ajouter un allié
            </a>
        </div>

        <!-- Messages de succès -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Alliés</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $allies->total() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Actifs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $allies->where('is_active', true)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <i class="fas fa-times-circle text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Inactifs</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $allies->where('is_active', false)->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des alliés -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ordre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($allies as $ally)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                            {{ $ally->order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $ally->logo) }}"
                                 alt="{{ $ally->name }}"
                                 class="h-12 w-auto object-contain">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $ally->name }}</div>
                            @if($ally->website)
                                <a href="{{ $ally->website }}" target="_blank" class="text-xs text-blue-600 hover:underline flex items-center mt-1">
                                    <i class="fas fa-external-link-alt mr-1"></i> Site web
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($ally->email)
                                <div class="flex items-center mb-1">
                                    <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                    <span>{{ $ally->email }}</span>
                                </div>
                            @endif
                            @if($ally->phone)
                                <div class="flex items-center">
                                    <i class="fas fa-phone mr-2 text-gray-400"></i>
                                    <span>{{ $ally->phone }}</span>
                                </div>
                            @endif
                            @if(!$ally->email && !$ally->phone)
                                <span class="text-gray-400 italic">Non renseigné</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="toggleStatus({{ $ally->id }}, 'ally')"
                                    class="status-toggle-{{ $ally->id }} focus:outline-none">
                                @if($ally->is_active)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Actif
                            </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i> Inactif
                            </span>
                                @endif
                            </button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('admin.allies.edit', $ally) }}"
                               class="text-blue-600 hover:text-blue-900 transition-colors">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.allies.destroy', $ally) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet allié ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                            <p class="text-lg">Aucun allié trouvé.</p>
                            <a href="{{ route('admin.allies.create') }}" class="text-green-600 hover:underline mt-2 inline-block">
                                Ajouter le premier allié
                            </a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $allies->links() }}
        </div>
    </div>

    <script>
        function toggleStatus(id, type) {
            const url = `/admin/allies/${id}/toggle-status`;

            fetch(url, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors du changement de statut');
                });
        }
    </script>
@endsection
