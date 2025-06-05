@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Menú per a mòbil -->
    <div class="mt-2 mb-6 md:hidden">
        @include('components.menu-mobil')
    </div>

    <!-- Bloque de bienvenida -->
    <div class="bg-indigo-50 dark:bg-indigo-900 p-6 rounded-xl shadow mb-8 transition-all">
        <h2 class="text-4xl font-extrabold tracking-tight text-indigo-800 dark:text-indigo-200 flex items-center justify-between flex-wrap gap-2">
            <span>Benvingut/da a <span class="text-indigo-500 dark:text-indigo-300">MediTrack</span></span>
            <span class="text-3xl animate-wiggle">👋</span>
        </h2>
        <p class="mt-2 text-indigo-700 dark:text-indigo-300 font-semibold">
            Sessió iniciada com: {{ ucwords(Auth::user()->name) }}
        </p>
    </div>

    <!-- Cuadros de estadísticas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $cards = [
                [
                    'title' => '👥 Pacients',
                    'count' => $pacientsCount,
                    'colorClass' => 'bg-indigo-50 border-indigo-100 text-indigo-800 text-indigo-600 bg-indigo-200',
                    'text' => 'Total de pacients registrats',
                    'route' => route('pacients.index'),
                    'label' => 'Veure pacients',
                ],
                [
                    'title' => '💊 Medicaments',
                    'count' => $medicamentsCount,
                    'colorClass' => 'bg-rose-50 border-rose-100 text-rose-800 text-rose-600 bg-rose-200',
                    'text' => 'Total de medicaments registrats',
                    'route' => route('medicaments.index'),
                    'label' => 'Veure medicaments',
                ],
                [
                    'title' => '⏰ Recordatoris',
                    'count' => $recordatorisCount,
                    'colorClass' => 'bg-yellow-50 border-yellow-100 text-yellow-800 text-yellow-600 bg-yellow-200',
                    'text' => 'Total de recordatoris creats',
                    'route' => route('recordatoris.index'),
                    'label' => 'Veure recordatoris',
                ],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="p-6 rounded-2xl shadow-md border {{ explode(' ', $card['colorClass'])[1] }} {{ explode(' ', $card['colorClass'])[0] }} hover:shadow-lg transition hover:scale-[1.02] duration-300 w-full">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold {{ explode(' ', $card['colorClass'])[2] }}">{{ $card['title'] }}</h3>
                    <span class="{{ explode(' ', $card['colorClass'])[4] }} {{ explode(' ', $card['colorClass'])[2] }} px-2 py-1 rounded-full text-sm">{{ $card['count'] }}</span>
                </div>
                <p class="text-gray-700">{{ $card['text'] }}</p>
                <a href="{{ $card['route'] }}" class="{{ explode(' ', $card['colorClass'])[3] }} hover:underline mt-4 inline-block">{{ $card['label'] }}</a>
            </div>
        @endforeach

        <!-- Últim pacient -->
        <div class="p-6 rounded-2xl shadow-md border border-purple-100 bg-purple-50 hover:shadow-lg transition hover:scale-[1.02] duration-300 w-full">
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
        <div class="p-6 rounded-2xl shadow-md border border-orange-100 bg-orange-50 hover:shadow-lg transition hover:scale-[1.02] duration-300 w-full">
            <h3 class="text-lg font-semibold text-orange-800 mb-3">🕰️ Últim recordatori creat</h3>
            @if ($lastRecordatori)
                <p class="text-gray-700">👤 Pacient: <strong>{{ $lastRecordatori->pacient->nom ?? '—' }} {{ $lastRecordatori->pacient->cognoms ?? '' }}</strong></p>
                <p class="text-gray-700">📩 Missatge: <strong>{{ $lastRecordatori->missatge }}</strong></p>
                <p class="text-gray-700">💊 Medicament:
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
        <div class="p-6 rounded-2xl shadow-md border border-yellow-300 bg-yellow-100 hover:shadow-lg transition hover:scale-[1.02] duration-300 w-full">
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
