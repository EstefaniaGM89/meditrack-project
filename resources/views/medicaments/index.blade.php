@extends('layouts.app')

@section('title', 'Medicaments')

@section('content')
    @include('components.menu-mobil')

    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">💊 Medicaments</h2>

    <a href="{{ route('medicaments.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
        ➕ Nou Medicament
    </a>

    <form method="GET" action="{{ route('medicaments.index') }}" class="mb-6 flex flex-col sm:flex-row sm:items-center gap-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Filtrar per nom..."
            class="w-full sm:w-64 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 bg-white dark:bg-gray-800 text-black dark:text-white placeholder-gray-400 dark:placeholder-gray-500">
        <button type="submit"
            class="px-4 py-2 bg-indigo-500 dark:bg-indigo-600 text-white rounded hover:bg-indigo-600 dark:hover:bg-indigo-500 transition">🔍</button>
        <select name="sort" onchange="this.form.submit()" class="select-filtro">
            <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>📅 Més recents</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>📅 Més antics</option>
            <option value="alphabetical" {{ request('sort') == 'alphabetical' ? 'selected' : '' }}>🔤 A-Z</option>
            <option value="reverse" {{ request('sort') == 'reverse' ? 'selected' : '' }}>🔠 Z-A</option>
        </select>
    </form>

    <div class="overflow-x-auto pb-16">
        <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow text-sm text-gray-800 dark:text-gray-100">
            <thead class="bg-indigo-300 dark:bg-indigo-600">
                <tr>
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Dosi</th>
                    <th class="px-4 py-2 text-left">Descripció</th>
                    <th class="px-4 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($medicaments as $medicament)
                    <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-4 py-2">{{ $medicament->nom }}</td>
                        <td class="px-4 py-2">{{ $medicament->dosi }}</td>
                        <td class="px-4 py-2">{{ $medicament->descripcio }}</td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('medicaments.edit', $medicament->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-xs">✏️</a>
                                <form action="{{ route('medicaments.destroy', $medicament->id) }}" method="POST" onsubmit="return confirm('Vols eliminar aquest medicament?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-400">No hi ha medicaments registrats.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
