@extends('layouts.app')

@section('title', 'Detalls del Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Detalls del Pacient</h2>

    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto space-y-4">
        @foreach([
            'Nom' => $pacient->nom,
            'Email' => $pacient->email,
            'Data de naixement' => $pacient->data_naixement,
            'Núm. Document' => $pacient->num_document,
            'Telèfon' => $pacient->telefon,
            'Adreça' => $pacient->adreca,
            'Ciutat' => $pacient->ciutat,
            'Codi postal' => $pacient->codi_postal,
            'Província' => $pacient->provincia,
            'País' => $pacient->pais,
            'Observacions' => $pacient->observacions,
            'Al·lèrgies' => $pacient->alergies,
            'Medicaments' => $pacient->medicaments,
            'Antecedents' => $pacient->antecedents,
            'Vacunes' => $pacient->vacunes,
            'Mètode de contacte preferit' => $pacient->metode_contacte,
        ] as $label => $value)
            <div>
                <h3 class="font-semibold text-gray-700">{{ $label }}:</h3>
                <p>{{ $value ?: '—' }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6 flex flex-wrap gap-3 justify-center">
        <a href="{{ route('pacients.index') }}"
            class="bg-gray-300 text-gray-800 px-5 py-2 rounded hover:bg-gray-400 font-medium flex items-center gap-2">
            ← Tornar a la llista
        </a>

        <a href="{{ route('pacients.edit', $pacient->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded font-medium flex items-center gap-2">
            ✏️ Editar
        </a>

        <form action="{{ route('pacients.destroy', $pacient->id) }}" method="POST"
            onsubmit="return confirm('Estàs segur que vols eliminar aquest pacient?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded font-medium flex items-center gap-2">
                🗑️ Eliminar
            </button>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        // Aquí puedes agregar scripts adicionales si es necesario
    </script>