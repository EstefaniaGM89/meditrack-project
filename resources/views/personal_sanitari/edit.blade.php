@extends('layouts.app')

@section('title', 'Editar Personal Sanitari')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Personal Sanitari</h2>

    @if ($errors->any())
        <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 p-4 rounded mb-4">
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
            <input type="text" name="nom" value="{{ old('nom', $persona->nom) }}"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $persona->email) }}"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                required>
        </div>

        <div>
            <label class="block font-semibold">Contrasenya (només si la vols canviar)</label>
            <input type="password" name="password"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
        </div>

        <div>
            <label class="block font-semibold">Rol</label>
            <input type="text" name="rol" value="{{ old('rol', $persona->rol) }}"
                class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-black dark:text-white">
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-700 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                💾 Guardar
            </button>

            <a href="{{ route('pacients.index') }}"
               class="bg-gray-300 hover:bg-green-500 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
