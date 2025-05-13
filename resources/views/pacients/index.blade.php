@extends('layouts.app')

@section('title', 'Pacients')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Llista de Pacients</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pacients.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
       ➕ Afegir Pacient
    </a>

    <!-- 🔍 Barra de cerca -->
    <form method="GET" action="{{ route('pacients.index') }}" class="mb-6">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar per nom..."
                class="w-full sm:w-64 p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
            >
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                🔍 Buscar
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border shadow text-sm">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-3 py-2 text-left">ID</th>
                    <th class="px-3 py-2 text-left">Nom</th>
                    <th class="px-3 py-2 text-left">Email</th>
                    <th class="px-3 py-2 text-left">Núm. Document</th>
                    <th class="px-3 py-2 text-left">Telèfon</th>
                    <th class="px-3 py-2 text-left">Adreça</th>
                    <th class="px-3 py-2 text-left">Data Naixement</th>
                    <th class="px-3 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pacients as $pacient)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-3 py-2">{{ $pacient->id }}</td>
                        <td class="px-3 py-2">{{ $pacient->nom }}</td>
                        <td class="px-3 py-2">{{ $pacient->email }}</td>
                        <td class="px-3 py-2">{{ $pacient->num_document }}</td>
                        <td class="px-3 py-2">{{ $pacient->telefon }}</td>
                        <td class="px-3 py-2">{{ $pacient->adreca }}</td>
                        <td class="px-3 py-2">{{ $pacient->data_naixement }}</td>
                        <td class="px-3 py-2">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('pacients.show', $pacient->id) }}"
                                   class="bg-blue-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Veure">
                                    👁️
                                </a>
                                <a href="{{ route('pacients.edit', $pacient->id) }}"
                                   class="bg-yellow-400 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Editar">
                                    ✏️
                                </a>
                                <form action="{{ route('pacients.destroy', $pacient->id) }}" method="POST"
                                      onsubmit="return confirm('Estàs segur que vols eliminar aquest pacient?')"
                                      class="flex items-center justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                            title="Eliminar">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center text-gray-500">
                            No hi ha pacients registrats.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Opcional: paginació -->
    <div class="mt-4">
        {{ $pacients->appends(['search' => request('search')])->links() }}
    </div>
@endsection

@section('scripts')
<script>
    // Aquí pots afegir scripts addicionals si cal
</script>
@endsection
