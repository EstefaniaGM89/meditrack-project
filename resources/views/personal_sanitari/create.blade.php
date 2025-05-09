@extends('layouts.app')

@section('title', 'Afegir Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Registrar nou membre del personal</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personal-sanitari.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Rol (opcional)</label>
            <input type="text" name="rol" class="w-full p-2 border rounded" placeholder="Auxiliar, Infermera...">
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Contrasenya</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('personal-sanitari.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
@endsection
