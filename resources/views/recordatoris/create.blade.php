@extends('layouts.app')

@section('title', 'Crear Recordatori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Crear Recordatori</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 dark:bg-red-200 dark:text-red-900 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recordatoris.store') }}" method="POST" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label class="block font-semibold">Pacient</label>
            <select name="pacient_id"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                required>
                <option value="">-- Selecciona un pacient --</option>
                @foreach($pacients as $pacient)
                    <option value="{{ $pacient->id }}">{{ $pacient->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Medicament</label>
            <select name="medicament_id"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                required>
                <option value="">-- Selecciona un medicament --</option>
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->id }}">{{ $medicament->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Missatge</label>
            <input type="text" name="missatge"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                required>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Data d'inici</label>
                <input type="date" name="inici"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                    required>
            </div>

            <div>
                <label class="block font-semibold">Data de fi</label>
                <input type="date" name="fi"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Hora</label>
            <input type="time" name="hora"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Dies de la setmana</label>
            <div class="grid grid-cols-2 gap-2 text-black dark:text-white">
                @foreach(['Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte','Diumenge'] as $dia)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="dies_setmana[]" value="{{ $dia }}"
                            class="accent-indigo-600 dark:accent-indigo-400">
                        {{ $dia }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-700 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                💾 Guardar
            </button>
            <a href="{{ route('pacients.index') }}"
                class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-4 py-2 rounded font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
