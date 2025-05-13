@extends('layouts.app')

@section('title', 'Iniciar Sessió')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">🔐 Iniciar Sessió</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 dark:bg-red-700 dark:text-white">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 dark:bg-green-700 dark:text-white">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Email</label>
            <input type="email" name="email" required class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-300 font-semibold">Contrasenya</label>
            <input type="password" name="password" required class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded w-full font-semibold">Iniciar Sessió</button>
    </form>

    <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 text-center">
        Encara no tens compte? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Registra't</a>
    </p>
</div>
@endsection