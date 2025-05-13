@extends('layouts.app')

@section('title', 'Registrar-se')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">📝 Registrar-se</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 dark:bg-red-700 dark:text-white">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Nom</label>
            <input type="text" name="nom" required class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Email</label>
            <input type="email" name="email" required class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Contrasenya</label>
            <input type="password" name="password" required class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Rol (opcional)</label>
            <input type="text" name="rol" class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded w-full font-semibold">Registrar-se</button>
    </form>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 text-center">
        Ja tens compte? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Inicia sessió</a>
    </p>
</div>
@endsection