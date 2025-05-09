@extends('layouts.app')

@section('title', 'Medicaments')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Llista de Medicaments</h2>
    <a href="{{ route('medicaments.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Nou Medicament</a>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full bg-white shadow rounded mt-6">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="p-2">ID Medicament</th>
                <th class="p-2">Nom</th>
                <th class="p-2">Descripció</th>
                <th class="p-2">Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicaments as $medicament)
                <tr class="border-b">
                    <td class="p-2">{{ $medicament->id }}</td>
                    <td class="p-2">{{ $medicament->nom }}</td>
                    <td class="p-2">{{ $medicament->descripcio }}</td>
                    <td class="p-2">{{ $medicament->dosi }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('medicaments.edit', $medicament->id) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                        <form action="{{ route('medicaments.destroy', $medicament->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estàs segur de que vols eliminar aquest medicament?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
