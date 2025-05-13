@extends('layouts.app')

@section('title', 'Pacients')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Llista de Pacients</h2>

    <a href="{{ route('pacients.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
       ➕ Nou Pacient
    </a>

    <!-- 🔍 Barra de cerca -->
    <form method="GET" action="{{ route('pacients.index') }}" class="mb-6">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Filtrar per nom..."
                class="w-full sm:w-64 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-200 bg-white dark:bg-gray-800 text-black dark:text-white"
            >
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                🔍
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-indigo-100 dark:bg-indigo-900">
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
                    <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
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
                        <td colspan="8" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
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

