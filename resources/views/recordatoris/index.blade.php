@extends('layouts.app')

@section('title', 'Recordatoris')

@section('content')
    <h2 class="text-2xl font-bold mb-6">⏰ Llistat de Recordatoris</h2>

    <a href="{{ route('recordatoris.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
        ➕ Nou Recordatori
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
                    <th class="px-4 py-2 text-left">Pacient</th>
                    <th class="px-4 py-2 text-left">Medicament</th>
                    <th class="px-4 py-2 text-left">Missatge</th>
                    <th class="px-4 py-2 text-left">Hora</th>
                    <th class="px-4 py-2 text-left">Estat</th>
                    <th class="px-4 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recordatoris as $recordatori)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $recordatori->pacient->nom }}</td>
                        <td class="px-4 py-2">{{ $recordatori->medicament->nom }}</td>
                        <td class="px-4 py-2">{{ $recordatori->missatge }}</td>
                        <td class="px-4 py-2">{{ $recordatori->hora }}</td>
                        <td class="px-4 py-2">{{ ucfirst($recordatori->estat) }}</td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('recordatoris.show', $recordatori->id) }}"
                                   class="bg-blue-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Veure">
                                    👁️
                                </a>
                                <a href="{{ route('recordatoris.edit', $recordatori->id) }}"
                                   class="bg-yellow-400 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Editar">
                                    ✏️
                                </a>
                                <form action="{{ route('recordatoris.destroy', $recordatori->id) }}" method="POST"
                                      onsubmit="return confirm('Segur que vols eliminar-ho?')"
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
                        <td colspan="6" class="text-center text-gray-500 py-4">No hi ha recordatoris registrats.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
