<!-- Vista de Dashboard on estan les estadístiques i informació general de l'aplicació -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-indigo-50 dark:bg-indigo-900 p-6 rounded-xl shadow mb-8 transition-all">
        <h2
            class="text-4xl font-extrabold tracking-tight text-indigo-800 dark:text-indigo-200 flex items-center justify-between">
            <span>Benvingut/da a <span class="text-indigo-500 dark:text-indigo-300">MediTrack</span></span>
            <span class="inline-block text-3xl animate-wiggle">👋</span>
        </h2>
        <p class="mt-2 text-indigo-700 dark:text-indigo-300 font-semibold">
            Sessió iniciada com: {{ ucwords(Auth::user()->name) }}
        </p>

    </div>

    <div class="grid 'sm:grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Pacients -->
        <div
            class="p-6 rounded-2xl shadow-md border border-indigo-100 bg-indigo-50 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-indigo-800">👥 Pacients</h3>
                <span class="bg-indigo-200 text-indigo-800 px-2 py-1 rounded-full text-sm">{{ $pacientsCount }}</span>
            </div>
            <p class="text-gray-700">Total de pacients registrats</p>
            <a href="{{ route('pacients.index') }}" class="text-indigo-600 hover:underline mt-4 inline-block">Veure
                pacients</a>
        </div>

        <!-- Medicaments -->
        <div
            class="p-6 rounded-2xl shadow-md border border-rose-100 bg-rose-50 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-rose-800">💊 Medicaments</h3>
                <span class="bg-rose-200 text-rose-800 px-2 py-1 rounded-full text-sm">{{ $medicamentsCount }}</span>
            </div>
            <p class="text-gray-700">Total de medicaments registrats</p>
            <a href="{{ route('medicaments.index') }}" class="text-rose-600 hover:underline mt-4 inline-block">Veure
                medicaments</a>
        </div>

        <!-- Recordatoris -->
        <div
            class="p-6 rounded-2xl shadow-md border border-yellow-100 bg-yellow-50 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-yellow-800">⏰ Recordatoris</h3>
                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-sm">{{ $recordatorisCount }}</span>
            </div>
            <p class="text-gray-700">Total de recordatoris creats</p>
            <a href="{{ route('recordatoris.index') }}" class="text-yellow-700 hover:underline mt-4 inline-block">Veure
                recordatoris</a>
        </div>

        <!-- Últim pacient -->
        <div
            class="p-6 rounded-2xl shadow-md border border-purple-100 bg-purple-50 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <h3 class="text-lg font-semibold text-indigo-800 mb-3">📌 Últim pacient registrat</h3>
            @if ($lastPacient)
                <p class="text-gray-700">👤 <strong>{{ $lastPacient->nom }} {{ $lastPacient->cognoms }}</strong></p>
                <p class="text-gray-700">📧 {{ $lastPacient->email }}</p>
                <p class="text-gray-700">🎂 {{ \Carbon\Carbon::parse($lastPacient->data_naixement)->format('d/m/Y') }}</p>
                <p class="text-gray-700">📞 {{ $lastPacient->telefon }}</p>
            @else
                <p class="text-gray-600">Encara no hi ha pacients registrats.</p>
            @endif
        </div>

        <!-- Últim recordatori -->
        <div
            class="p-6 rounded-2xl shadow-md border border-orange-100 bg-orange-50 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <h3 class="text-lg font-semibold text-orange-800 mb-3">🕰️ Últim recordatori creat</h3>
            @if ($lastRecordatori)
                <p class="text-gray-700">
                    👤 Pacient:
                    <strong>
                        {{ $lastRecordatori->pacient->nom ?? '—' }}
                        {{ $lastRecordatori->pacient->cognoms ?? '' }}
                    </strong>
                </p>
                <p class="text-gray-700">📩 Missatge: <strong>{{ $lastRecordatori->missatge }}</strong></p>
                <p class="text-gray-700">
                    💊 Medicament:
                    <strong>
                        {{ $lastRecordatori->medicament->nom ?? '—' }}
                        @if ($lastRecordatori->medicament && $lastRecordatori->medicament->dosi)
                            ({{ $lastRecordatori->medicament->dosi }})
                        @endif
                    </strong>
                </p>

            @else
                <p class="text-gray-600">Encara no hi ha recordatoris creats.</p>
            @endif
        </div>
        <!-- Recordatoris pendents -->
        <div
            class="p-6 rounded-2xl shadow-md border border-yellow-300 bg-yellow-100 hover:shadow-lg transition hover:scale-[1.02] duration-300">
            <div class="flex items-center justify-between mb-2">
                <h3 class="text-lg font-semibold text-yellow-800">🔔 Notificacions pendents</h3>
                <span class="bg-yellow-300 text-yellow-900 px-2 py-1 rounded-full text-sm">
                    {{ $recordatorisPendents->count() }}
                </span>
            </div>
            <p class="text-gray-700">Preses i administració de tractaments pendents</p>
            <a href="{{ route('recordatoris.index', ['filtre' => 'pendents']) }}"
                class="text-yellow-800 font-medium hover:underline mt-4 inline-block">Veure pendents d'administrar</a>
        </div>

    </div>


@endsection