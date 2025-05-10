@extends('layouts.app')

@section('title', 'Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">👩‍⚕️ Personal Sanitari</h2>

    <a href="{{ route('personal-sanitari.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
        ➕ Afegir Personal
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
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Rol</th>
                    <th class="px-4 py-2 text-center">Accions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($personal as $persona)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $persona->nom }}</td>
                        <td class="px-4 py-2">{{ $persona->email }}</td>
                        <td class="px-4 py-2">{{ $persona->rol ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('personal-sanitari.show', $persona->id) }}"
                                   class="bg-blue-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Veure">
                                    👁️
                                </a>
                                <a href="{{ route('personal-sanitari.edit', $persona->id) }}"
                                   class="bg-yellow-400 hover:bg-green-600 text-white px-3 py-1 rounded text-xs font-semibold flex items-center justify-center"
                                   title="Editar">
                                    ✏️
                                </a>
                                <form action="{{ route('personal-sanitari.destroy', $persona->id) }}" method="POST"
                                      onsubmit="return confirm('Vols eliminar aquest registre?')"
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
                        <td colspan="4" class="text-center text-gray-500 py-4">No hi ha personal registrat.</td>
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
