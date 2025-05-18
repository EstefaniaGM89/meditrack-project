@extends('layouts.auth')

@section('title', 'Registrar-se')

@section('content')

    {{-- Background reutilitzable --}}
    @include('components.auth.splash')

    <div class="absolute inset-0 bg-black bg-opacity-30 -z-10"></div>

    {{-- Formulari de registre --}}
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 w-full max-w-md z-10 relative">
        @include('components.auth.logo')

        <h2 class="text-3xl font-extrabold mb-6 text-indigo-700 dark:text-indigo-300 text-center">📝 Registrar-se</h2>

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
                <input type="text" name="name" required value="{{ old('name') }}"
                    class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
            </div>

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

            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-semibold">Confirma la Contrasenya</label>
                <input type="password" name="password_confirmation" required
                    class="w-full p-2 border rounded bg-white dark:bg-gray-700 dark:text-white">
            </div>

            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded w-full font-semibold">
                Registrar-se
            </button>
        </form>

        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 text-center">
            Ja tens compte? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Inicia sessió</a>
        </p>

        {{-- Peu de pàgina legal --}}
        <p class="mt-6 text-xs text-gray-500 dark:text-gray-400 text-center">
            © 2025 MediTrack. Tots els drets reservats.
        </p>
    </div>
@endsection