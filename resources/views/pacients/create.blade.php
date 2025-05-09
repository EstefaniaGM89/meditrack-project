@extends('layouts.app')

@section('title', 'Crear Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Crear Pacient</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacients.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Contrasenya</label>
            <input type="password" name="pass" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Data de naixement</label>
            <input type="date" name="data_naixement" class="w-full p-2 border rounded" required>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('pacients.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
