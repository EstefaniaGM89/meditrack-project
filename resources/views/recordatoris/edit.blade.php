@extends('layouts.app')

@section('title', 'Editar Recordatori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">✏️ Editar Recordatori</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
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

        <div>
            <label class="block font-semibold">Pacient</label>
            <select name="pacient_id" class="w-full p-2 border rounded" required>
                @foreach($pacients as $pacient)
                    <option value="{{ $pacient->id }}" {{ $recordatori->pacient_id == $pacient->id ? 'selected' : '' }}>
                        {{ $pacient->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Medicament</label>
            <select name="medicament_id" class="w-full p-2 border rounded" required>
                @foreach($medicaments as $medicament)
                    <option value="{{ $medicament->id }}" {{ $recordatori->medicament_id == $medicament->id ? 'selected' : '' }}>
                        {{ $medicament->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Missatge</label>
            <input type="text" name="missatge" value="{{ old('missatge', $recordatori->missatge) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Data d'inici</label>
                <input type="date" name="inici" value="{{ old('inici', $recordatori->inici) }}" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Data de fi</label>
                <input type="date" name="fi" value="{{ old('fi', $recordatori->fi) }}" class="w-full p-2 border rounded">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Hora</label>
            <input type="time" name="hora" value="{{ old('hora', $recordatori->hora) }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Dies de la setmana</label>
            <div class="grid grid-cols-2 gap-2">
                @php
                    $diesSeleccionats = is_array($recordatori->dies_setmana) ? $recordatori->dies_setmana : json_decode($recordatori->dies_setmana, true);
                @endphp

                @foreach(['Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte','Diumenge'] as $dia)
                    <label>
                        <input type="checkbox" name="dies_setmana[]" value="{{ $dia }}" {{ in_array($dia, $diesSeleccionats ?? []) ? 'checked' : '' }} class="mr-2">
                        {{ $dia }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm font-semibold flex items-center gap-2">
                💾 Guardar
            </button>
            <a href="{{ route('recordatoris.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded text-sm font-semibold flex items-center gap-2">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        // Aquí pots afegir scripts addicionals si cal
    </script>