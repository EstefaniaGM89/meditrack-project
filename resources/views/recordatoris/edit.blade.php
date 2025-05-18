<!-- Vista d' edició de recordatoris -->
@extends('layouts.app')

@section('title', 'Editar Recordatori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">⏰ Editar Recordatori</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-500 dark:bg-red-200 dark:text-red-900 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recordatoris.update', $recordatori->id) }}" method="POST" class="space-y-4 max-w-xl">
        @csrf
        @method('PUT')

        {{-- Pacient --}}
        <div>
            <label class="block font-semibold">Pacient</label>
            <select name="pacient_id" required
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
                @foreach($pacients as $pacient)
                    <option value="{{ $pacient->id }}" {{ $recordatori->pacient_id == $pacient->id ? 'selected' : '' }}>
                        {{ $pacient->nom }}
                        {{ $pacient->cognoms }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Medicament --}}
        <div>
            <label class="block font-semibold">Medicament</label>
            <select name="medicament_id" required
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->id }}" {{ $recordatori->medicament_id == $medicament->id ? 'selected' : '' }}>
                        {{ $medicament->nom }}
                        {{ $medicament->dosi }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Missatge --}}
        <div>
            <label class="block font-semibold">Missatge</label>
            <input type="text" name="missatge" required
                value="{{ old('missatge', $recordatori->missatge) }}"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
        </div>

        {{-- Dates --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Data d'inici</label>
                <input type="date" name="inici" required
                    value="{{ old('inici', $recordatori->inici) }}"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Data de fi</label>
                <input type="date" name="fi"
                    value="{{ old('fi', $recordatori->fi) }}"
                    class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
            </div>
        </div>

        {{-- Hora --}}
        <div>
            <label class="block font-semibold">Hora</label>
            <input type="time" name="hora"
                value="{{ old('hora', $recordatori->hora) }}"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
        </div>

        {{-- Dies de la setmana --}}
        <div>
            <label class="block font-semibold">Dies de la setmana</label>
            <div class="grid grid-cols-2 gap-2 text-black dark:text-white">
                @php
                    $diesSeleccionats = old('dies_setmana') 
                        ?? (is_array($recordatori->dies_setmana) ? $recordatori->dies_setmana : json_decode($recordatori->dies_setmana, true));
                @endphp

                @foreach(['Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge'] as $dia)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="dies_setmana[]" value="{{ $dia }}"
                            class="accent-indigo-600 dark:accent-indigo-400"
                            {{ in_array($dia, $diesSeleccionats) ? 'checked' : '' }}>
                        {{ $dia }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn-guardar">
                💾 Guardar
            </button>

            <a href="{{ route('recordatoris.index') }}"
                class="bg-gray-300 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold dark:bg-gray-700 dark:hover:bg-green-500">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
