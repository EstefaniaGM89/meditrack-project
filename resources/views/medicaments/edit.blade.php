<!-- Vista d' edició de medicaments -->
@extends('layouts.app')

@section('title', 'Editar Medicament')

@section('content')
    <h2 class="text-2xl font-bold mb-6 dark:text-white">💊 Editar Medicament</h2>

    <x-alert-errors />

    <form action="{{ route('medicaments.update', $medicament->id) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold dark:text-white">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $medicament->nom) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold dark:text-white">Dosi</label>
            <input type="text" name="dosi" value="{{ old('dosi', $medicament->dosi) }}"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold dark:text-white">Descripció</label>
            <textarea name="descripcio" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white"
                rows="3">{{ old('descripcio', $medicament->descripcio) }}</textarea>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="btn-guardar">
                💾 Guardar
            </button>

            <a href="{{ route('medicaments.index') }}"
                class="bg-gray-400 hover:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection