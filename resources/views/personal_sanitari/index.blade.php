@extends('layouts.app')

@section('title', 'Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Llista de Personal Sanitari</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('personal-sanitari.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        + Nou membre
    </a>

    <table class="table-auto w-full mt-6 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Rol</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Accions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($personal as $persona)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $persona->nom }}</td>
                    <td class="px-4 py-2">{{ $persona->rol ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $persona->email }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('personal-sanitari.edit', $persona->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('personal-sanitari.destroy', $persona->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Eliminar aquest membre?')" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-gray-500 italic py-4">No hi ha personal sanitari registrat.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
