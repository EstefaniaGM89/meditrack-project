@extends('layouts.app')

@section('title', 'Afegir Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Afegir Pacient</h2>

    @if ($errors->any())
        <div class="bg-red-100 dark:bg-red-300 text-red-700 dark:text-red-900 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacients.store') }}" method="POST" class="space-y-4 max-w-2xl text-gray-800 dark:text-gray-100">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ([
                'Nom' => 'nom',
                'Núm. Document' => 'num_document',
                'Email' => 'email',
                'Contrasenya' => 'pass',
                'Data de naixement' => 'data_naixement',
                'Telèfon' => 'telefon',
                'Adreça' => 'adreca',
                'Ciutat' => 'ciutat',
                'Codi Postal' => 'codi_postal',
                'Província' => 'provincia',
                'País' => 'pais',
                'Mètode de contacte' => 'metode_contacte'
            ] as $label => $name)
                <div>
                    <label class="block font-semibold">{{ $label }}</label>
                    <input
                        type="{{ in_array($name, ['email']) ? 'email' : ($name === 'pass' ? 'password' : ($name === 'data_naixement' ? 'date' : 'text')) }}"
                        name="{{ $name }}"
                        class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-black dark:text-white"
                        {{ in_array($name, ['nom', 'num_document', 'email', 'pass', 'data_naixement']) ? 'required' : '' }}>
                </div>
            @endforeach
        </div>

        @foreach ([
            'Observacions' => 'observacions',
            'Al·lèrgies' => 'alergies',
            'Medicaments' => 'medicaments',
            'Antecedents' => 'antecedents',
            'Vacunes' => 'vacunes'
        ] as $label => $name)
            <div class="mt-2">
                <label class="block font-semibold">{{ $label }}</label>
                <textarea name="{{ $name }}" rows="2"
                    class="w-full p-2 border border-gray-300 dark:border-gray-700 rounded bg-white dark:bg-gray-800 text-black dark:text-white"></textarea>
            </div>
        @endforeach

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-700 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                💾 Guardar
            </button>
            <a href="{{ route('pacients.index') }}"
                class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-4 py-2 rounded font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
