@extends('layouts.app')

@section('title', 'Editar Medicament')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Medicament</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medicaments.update', $medicament->id) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $medicament->nom) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Dosi</label>
            <input type="text" name="dosi" value="{{ old('dosi', $medicament->dosi) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Descripció</label>
            <textarea name="descripcio" class="w-full p-2 border rounded" rows="3">{{ old('descripcio', $medicament->descripcio) }}</textarea>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualitzar</button>
            <a href="{{ route('medicaments.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel·lar</a>
        </div>
    </form>
@endsection
