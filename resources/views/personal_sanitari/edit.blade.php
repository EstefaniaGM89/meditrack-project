<!-- Vista d' edició de personal sanitari -->
@extends('layouts.app')

@section('title', 'Editar Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">👩‍⚕️ Editar Personal Sanitari</h2>

    <x-alert-errors />

    <form action="{{ route('personal-sanitari.update', parameters: $persona->id) }}" method="POST"
        class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $persona->nom) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Cognoms</label>
            <input type="text" name="cognoms" value="{{ old('cognoms', $persona->cognoms) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>
        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $persona->email) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Contrasenya (Només si la vols canviar)</label>
            <input type="password" name="password" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Rol</label>
            <input type="text" name="rol" value="{{ old('rol', $persona->rol) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Torn</label>
            <select name="torn" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
                <option value="">-- Selecciona un torn --</option>
                <option value="dia" {{ $persona->torn === 'dia' ? 'selected' : '' }}>Dia</option>
                <option value="nit" {{ $persona->torn === 'nit' ? 'selected' : '' }}>Nit</option>
                <option value="irrellevant" {{ $persona->torn === 'irrellevant' ? 'selected' : '' }}>Irrellevant</option>
            </select>

        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn-guardar">
                💾 Guardar
            </button>

            <a href="{{ route('personal-sanitari.index') }}"
                class="bg-gray-400 hover:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection