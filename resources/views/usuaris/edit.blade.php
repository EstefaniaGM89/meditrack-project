@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Usuario</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuaris.update', $usuari->id) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nom" value="{{ old('nom', $usuari->nom) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $usuari->email) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Contraseña (solo si deseas cambiarla)</label>
            <input type="password" name="pass" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Fecha de Nacimiento</label>
            <input type="date" name="data_naixement" value="{{ old('data_naixement', $usuari->data_naixement) }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualizar</button>
            <a href="{{ route('usuaris.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
