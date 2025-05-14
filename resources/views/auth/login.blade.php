@extends('layouts.auth')

@section('title', 'Iniciar Sessió')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-3xl font-extrabold mb-6 text-indigo-700 dark:text-indigo-300 text-center">🔐 Iniciar Sessió</h2>

        @if($errors->has('email'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 dark:bg-red-700 dark:text-white">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-semibold">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                       class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-semibold">Contrasenya</label>
                <input type="password" name="password" required
                       class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
            </div>

            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded w-full font-semibold">
                Iniciar Sessió
            </button>
        </form>

        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 text-center">
            Encara no tens compte? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Registra't aquí</a>
        </p>
    </div>
@endsection

