@extends('layouts.app')

@section('title', 'Editar Recordatori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Recordatori</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recordatoris.update', $recordatori->id) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">ID del Pacient</label>
            <input type="number" name="pacients_id" value="{{ old('pacients_id', $recordatori->pacients_id) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">ID del Medicament</label>
            <input type="number" name="medicaments_id" value="{{ old('medicaments_id', $recordatori->medicaments_id) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Missatge</label>
            <textarea name="missatge" class="w-full p-2 border rounded" rows="3" required>{{ old('missatge', $recordatori->missatge) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Data i Hora (opcional)</label>
            <input type="datetime-local" name="data_hora"
                value="{{ old('data_hora', $recordatori->data_hora ? \Carbon\Carbon::parse($recordatori->data_hora)->format('Y-m-d\TH:i') : '') }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Hora (opcional)</label>
            <input type="time" name="hora"
                value="{{ old('hora', $recordatori->hora) }}"
                class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Dies de la setmana</label>
            @php
                $diesDisponibles = ['Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte', 'Diumenge'];
                $diesSeleccionats = old('dies_setmana', $recordatori->dies_setmana ?? []);
            @endphp
            <div class="grid grid-cols-2 gap-2">
                @foreach ($diesDisponibles as $dia)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="dies_setmana[]" value="{{ $dia }}"
                            {{ in_array($dia, $diesSeleccionats) ? 'checked' : '' }} class="mr-2">
                        {{ $dia }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualitzar</button>
            <a href="{{ route('recordatoris.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
