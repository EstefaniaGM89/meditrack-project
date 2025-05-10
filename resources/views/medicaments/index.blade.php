@extends('layouts.app')

@section('title', 'Llistat de Medicaments')

@section('content')
    <h2 class="text-2xl font-bold mb-6">💊 Llistat de Medicaments</h2>

    <a href="{{ route('medicaments.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
        ➕ Afegir Medicament
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border shadow text-sm">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nom</th>
                    <th class="px-4 py-2 text-left">Dosi</th>
                    <th class="px-4 py-2 text-left">Descripció</th>
                    <th class="px-4 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($medicaments as $medicament)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $medicament->nom }}</td>
                        <td class="px-4 py-2">{{ $medicament->dosi }}</td>
                        <td class="px-4 py-2">{{ $medicament->descripcio }}</td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('medicaments.show', $medicament->id) }}"
                                   class="bg-blue-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Veure">
                                    👁️
                                </a>
                                <a href="{{ route('medicaments.edit', $medicament->id) }}"
                                   class="bg-yellow-400 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Editar">
                                    ✏️
                                </a>
                                <form action="{{ route('medicaments.destroy', $medicament->id) }}" method="POST"
                                      onsubmit="return confirm('Vols eliminar aquest medicament?')"
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
                        <td colspan="4" class="text-center text-gray-500 py-4">No hi ha medicaments registrats.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        // Aquí pots afegir scripts addicionals si cal
    </script>
@endsection
