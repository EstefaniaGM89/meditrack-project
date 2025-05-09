@extends('layouts.app')

@section('title', 'Crear Recordatori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Crear Recordatori</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recordatoris.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block font-semibold">Pacient</label>
            <select name="pacient_id" class="w-full p-2 border rounded" required>
                <option value="">-- Selecciona un pacient --</option>
                @foreach ($pacients as $pacient)
                    <option value="{{ $pacient->id }}" {{ old('pacient_id') == $pacient->id ? 'selected' : '' }}>
                        {{ $pacient->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Medicament</label>
            <select name="medicaments_id" class="w-full p-2 border rounded" required>
                <option value="">-- Selecciona un medicament --</option>
                @foreach ($medicaments as $medicament)
                    <option value="{{ $medicament->id }}" {{ old('medicaments_id') == $medicament->id ? 'selected' : '' }}>
                        {{ $medicament->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-semibold">Missatge</label>
            <textarea name="missatge" class="w-full p-2 border rounded" rows="3" required>{{ old('missatge') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Data i Hora</label>
            <input type="datetime-local" name="data_hora" value="{{ old('data_hora') }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Hora (opcional)</label>
            <input type="time" name="hora" value="{{ old('hora') }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Dies de la setmana</label>
            @php
                $diesDisponibles = ['Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge'];
                $seleccionats = old('dies_setmana', []);
            @endphp
            <div class="grid grid-cols-2 gap-2">
                @foreach ($diesDisponibles as $dia)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="dies_setmana[]" value="{{ $dia }}"
                            {{ in_array($dia, $seleccionats) ? 'checked' : '' }} class="mr-2">
                        {{ $dia }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('recordatoris.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
