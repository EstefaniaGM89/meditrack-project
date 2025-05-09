@extends('layouts.app')

@section('title', 'Crear Medicament')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Crear Medicament</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicaments.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block font-semibold">ID del Medicament</label>
            <input type="text" name="nom" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Descripció</label>
            <textarea name="descripcio" class="w-full p-2 border rounded" rows="3"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Dosi</label>
            <input type="text" name="dosi" class="w-full p-2 border rounded" required>
        </div>
        
        <div>
            <label class="block font-semibold">Data d'inici</label>
            <input type="date" name="inici" class="w-full p-2 border rounded" required>
        </div>
        
        <div>
            <label class="block font-semibold">Data de fi</label>
            <input type="date" name="fi" class="w-full p-2 border rounded">
        </div>
        
        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('medicaments.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
