@extends('layouts.app')

@section('title', 'Editar Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Personal Sanitari</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personal-sanitari.update', $persona->id) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $persona->nom) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $persona->email) }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Contrasenya (només si la vols canviar)</label>
            <input type="password" name="password" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-semibold">Rol</label>
            <input type="text" name="rol" value="{{ old('rol', $persona->rol) }}" class="w-full p-2 border rounded">
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Actualitzar</button>
            <a href="{{ route('personal-sanitari.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel·lar</a>
        </div>
    </form>
@endsection
