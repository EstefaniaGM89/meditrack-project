@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-3xl font-bold mb-6">Benvingut/da a MediTrack 👋</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">👥 Pacients</h3>
            <p class="text-gray-600">Total: <strong>{{ $pacientsCount }}</strong></p>
            <a href="{{ route('pacients.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure pacients →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">💊 Medicaments</h3>
            <p class="text-gray-600">Total: <strong>{{ $medicamentsCount }}</strong></p>
            <a href="{{ route('medicaments.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure medicaments →</a>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">⏰ Recordatoris</h3>
            <p class="text-gray-600">Total: <strong>{{ $recordatorisCount }}</strong></p>
            <a href="{{ route('recordatoris.index') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Veure recordatoris →</a>
        </div>

        <div class="bg-white p-4 rounded shadow lg:col-span-2">
            <h3 class="text-lg font-semibold">📌 Últim pacient registrat</h3>
            @if ($lastPacient)
                <p class="text-gray-600">Nom: <strong>{{ $lastPacient->nom }}</strong></p>
                <p class="text-gray-600">Email: <strong>{{ $lastPacient->email }}</strong></p>
                <p class="text-gray-600">Data naixement: <strong>{{ $lastPacient->data_naixement }}</strong></p>
            @else
                <p class="text-gray-600">Encara no hi ha pacients registrats.</p>
            @endif
        </div>

        <div class="bg-white p-4 rounded shadow lg:col-span-3">
            <h3 class="text-lg font-semibold">🔔 Últim recordatori creat</h3>
            @if ($lastRecordatori)
                <p class="text-gray-600">Missatge: <strong>{{ $lastRecordatori->missatge }}</strong></p>
                <p class="text-gray-600">Pacient: <strong>{{ $lastRecordatori->pacient->nom ?? '—' }}</strong></p>
                <p class="text-gray-600">Medicament: <strong>{{ $lastRecordatori->medicament->nom ?? '—' }}</strong></p>
            @else
                <p class="text-gray-600">Encara no hi ha recordatoris creats.</p>
            @endif
        </div>
    </div>
@endsection
