<!-- Vista de creació de personal sanitari -->
@extends('layouts.app')

@section('title', 'Afegir Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">👩‍⚕️ Afegir Personal Sanitari</h2>

    <x-alert-errors />

    <form action="{{ route('personal-sanitari.store') }}" method="POST"
        class="space-y-4 max-w-md text-gray-800 dark:text-gray-100">
        @csrf

        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Cognoms</label>
            <input type="text" name="cognoms" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>
        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Contrasenya</label>
            <input type="password" name="password" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Rol</label>
            <input type="text" name="rol" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white"
                placeholder="auxiliar, infermera, etc...">
        </div>

        <div>
            <label class="block font-semibold">Torn</label>
            <select name="torn" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                <option value="">-- Selecciona un torn --</option>
                <option value="dia" @selected(old('torn') == 'dia')>Dia</option>
                <option value="nit" @selected(old('torn') == 'nit')>Nit</option>
                <option value="nit" @selected(old('torn') == 'nit')>Irrellevant</option>
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