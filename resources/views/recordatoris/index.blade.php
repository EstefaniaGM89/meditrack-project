@extends('layouts.app')

@section('title', 'Recordatoris')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">⏰ Llistat de Recordatoris</h2>

    <a href="{{ route('recordatoris.create') }}"
        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
        ➕ Nou Recordatori
    </a>

    <!-- 🔍 Barra de cerca -->
    <form method="GET" action="{{ route('recordatoris.index') }}" class="mb-6">
        <div class="flex flex-col sm:flex-row gap-4 items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Filtrar per nom..."
                class="w-full sm:w-64 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-b-2 focus:border-indigo-400 focus:shadow-none bg-white dark:bg-gray-800 text-black dark:text-white placeholder-gray-400 dark:placeholder-gray-500 placeholder-opacity-80 italic"
            >
            <button type="submit" class="px-4 py-2 bg-indigo-400 text-white rounded hover:bg-indigo-700 transition">
                🔍
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-indigo-100 dark:bg-indigo-900">
                <tr>
                    <th class="px-4 py-2 text-left">Pacient</th>
                    <th class="px-4 py-2 text-left">Medicaments</th>
                    <th class="px-4 py-2 text-left">Missatge</th>
                    <th class="px-4 py-2 text-left">Hora</th>
                    <th class="px-4 py-2 text-left">Estat</th>
                    <th class="px-4 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recordatoris as $recordatori)
                    <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-4 py-2">{{ $recordatori->pacient->nom ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $recordatori->medicament->nom ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $recordatori->missatge }}</td>
                        <td class="px-4 py-2">{{ $recordatori->hora }}</td>
                        <td class="px-4 py-2">{{ ucfirst($recordatori->estat) }}</td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('recordatoris.edit', $recordatori->id) }}"
                                    class="bg-yellow-400 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold"
                                    title="Editar">✏️</a>
                                <form action="{{ route('recordatoris.destroy', $recordatori->id) }}" method="POST"
                                    onsubmit="return confirm('Segur que vols eliminar-ho?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold"
                                        title="Eliminar">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 dark:text-gray-400 py-4">
                            No hi ha recordatoris registrats.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Opcional: paginació -->
    <div class="mt-4">
        {{ $recordatoris->appends(['search' => request('search')])->links() }}
    </div>
@endsection
