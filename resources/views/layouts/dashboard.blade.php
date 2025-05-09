@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Benvingut/da a MediTrack 👋</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">👥 Usuaris</h3>
            <p class="text-gray-600">Gestió d'usuaris registrats.</p>
            <a href="{{ route('pacients.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure usuaris →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">💊 Medicaments</h3>
            <p class="text-gray-600">Llistat i gestió de medicació.</p>
            <a href="{{ route('medicaments.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure medicaments →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">⏰ Recordatoris</h3>
            <p class="text-gray-600">Configura les alarmes.</p>
            <a href="{{ route('recordatoris.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure recordatoris →</a>
        </div>
    </div>
@endsection
