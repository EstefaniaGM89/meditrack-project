@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Bienvenida a MediTrack 👋</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">👥 Usuarios</h3>
            <p class="text-gray-600">Gestión de usuarios registrados.</p>
            <a href="{{ route('usuaris.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver usuarios →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">💊 Medicamentos</h3>
            <p class="text-gray-600">Listado y gestión de medicación.</p>
            <a href="{{ route('medicaments.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver medicamentos →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">⏰ Recordatorios</h3>
            <p class="text-gray-600">Configura alarmas para tomas.</p>
            <a href="{{ route('recordatoris.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Ver recordatorios →</a>
        </div>
    </div>
@endsection
