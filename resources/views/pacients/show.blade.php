@extends('layouts.app')

@section('title', 'Detalls del Pacient')

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Títol amb nom -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                Detalls del Pacient
                <span class="text-indigo-600 dark:text-indigo-400 font-semibold">– {{ $pacient->nom }}</span>
            </h2>
        </div>

        <!-- Targeta -->
        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-2xl shadow-md border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    'Email' => $pacient->email,
                    'Data de naixement' => $pacient->data_naixement,
                    'Núm. Document' => $pacient->num_document,
                    'Telèfon' => $pacient->telefon,
                    'Adreça' => $pacient->adreca,
                    'Ciutat' => $pacient->ciutat,
                    'Codi postal' => $pacient->codi_postal,
                    'Província' => $pacient->provincia,
                    'País' => $pacient->pais,
                    'Mètode de contacte preferit' => $pacient->metode_contacte,
                    'Observacions' => $pacient->observacions,
                    'Al·lèrgies' => $pacient->alergies,
                    'Medicaments' => $pacient->medicaments,
                    'Antecedents' => $pacient->antecedents,
                    'Vacunes' => $pacient->vacunes,
                ] as $label => $value)
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-3">
                        <h3 class="font-semibold text-sm uppercase tracking-wide text-gray-600 dark:text-gray-400">{{ $label }}</h3>
                        <p class="text-base mt-1 break-words">{{ $value ?: '—' }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Botons -->
        <div class="mt-6 flex flex-wrap justify-end gap-3">
            <a href="{{ route('pacients.index') }}"
               class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-5 py-2 rounded font-medium flex items-center gap-2">
                ← Tornar
            </a>

            <a href="{{ route('pacients.edit', $pacient->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded font-medium flex items-center gap-2">
                ✏️ Editar
            </a>

            <form action="{{ route('pacients.destroy', $pacient->id) }}" method="POST"
                  onsubmit="return confirm('Estàs segur que vols eliminar aquest pacient?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded font-medium flex items-center gap-2">
                    🗑️ Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection