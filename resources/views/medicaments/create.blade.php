@extends('layouts.app')

@section('title', 'Crear Medicament')

@section('content')
    <h2 class="text-2xl font-bold mb-6 dark:text-white">Crear Medicament</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-gray-700 dark:bg-gray-900 dark:text-gray-300 p-4 rounded mb-4">
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
            <label class="block font-semibold dark:text-white">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
        </div>

        <div>
            <label class="block font-semibold dark:text-white">Dosi</label>
            <input type="text" name="dosi" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" required>
        </div>

        <div>
            <label class="block font-semibold dark:text-white">Descripció</label>
            <textarea name="descripcio" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="3"></textarea>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-700 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                💾 Guardar
            </button>
            <a href="{{ route('pacients.index') }}"
                class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-4 py-2 rounded font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection