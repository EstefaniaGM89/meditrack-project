@extends('layouts.app')

@section('title', 'Recordatoris')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Llista de Recordatoris</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('recordatoris.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        Nou Recordatori
    </a>

    <table class="table-auto w-full mt-6 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID del Usuari</th>
                <th class="px-4 py-2">Nom del Medicament</th>
                <th class="px-4 py-2">Missatge</th>
                <th class="px-4 py-2">Data i Hora</th>
                <th class="px-4 py-2">Dies</th>
                <th class="px-4 py-2">Accions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($recordatoris as $recordatori)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $recordatori->usuaris_id }}</td>
                    <td class="px-4 py-2">{{ $recordatori->medicaments_id }}</td>
                    <td class="px-4 py-2">{{ $recordatori->missatge }}</td>
                    <td class="px-4 py-2">
                        {{ $recordatori->data_hora ? \Carbon\Carbon::parse($recordatori->data_hora)->format('d/m/Y H:i') : '—' }}
                    </td>
                    <td class="px-4 py-2">
                        @if ($recordatori->dies_setmana && is_array($recordatori->dies_setmana))
                            <ul class="list-disc pl-4">
                                @foreach ($recordatori->dies_setmana as $dia)
                                    <li>{{ $dia }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-gray-500 italic">No definits</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('recordatoris.edit', $recordatori->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('recordatoris.destroy', $recordatori->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Estàs segur de voler eliminar aquest recordatori?')" class="text-red-600 hover:underline">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-4 text-center text-gray-500 italic">No hi ha recordatoris.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
