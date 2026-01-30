{{-- resources/views/admin/partners/index.blade.php --}}
@extends('layouts.dash')

@section('title', 'Gestion des Partenaires')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <i class="fas fa-handshake mr-2"></i> Gestion des Partenaires
            </h1>
            <a href="{{ route('admin.partners.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300">
                <i class="fas fa-plus mr-2"></i> Ajouter un partenaire
            </a>
        </div>

        <!-- Messages de succès -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Tableau des partenaires -->
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
                @forelse($partners as $partner)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $partner->order }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $partner->logo) }}"
                                 alt="{{ $partner->name }}"
                                 class="h-12 w-auto object-contain">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $partner->name }}</div>
                            @if($partner->website)
                                <a href="{{ $partner->website }}" target="_blank" class="text-xs text-blue-600 hover:underline">
                                    <i class="fas fa-external-link-alt"></i> Site web
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($partner->email)
                                <div><i class="fas fa-envelope mr-1"></i> {{ $partner->email }}</div>
                            @endif
                            @if($partner->phone)
                                <div><i class="fas fa-phone mr-1"></i> {{ $partner->phone }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button onclick="toggleStatus({{ $partner->id }}, 'partner')"
                                    class="status-toggle-{{ $partner->id }}">
                                @if($partner->is_active)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Actif
                            </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactif
                            </span>
                                @endif
                            </button>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('admin.partners.edit', $partner) }}"
                               class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Aucun partenaire trouvé. <a href="{{ route('admin.partners.create') }}" class="text-green-600 hover:underline">Ajouter le premier</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $partners->links() }}
        </div>
    </div>

    <script>
        function toggleStatus(id, type) {
            const url = type === 'partner'
                ? `/admin/partners/${id}/toggle-status`
                : `/admin/allies/${id}/toggle-status`;

            fetch(url, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
        }
    </script>
@endsection
