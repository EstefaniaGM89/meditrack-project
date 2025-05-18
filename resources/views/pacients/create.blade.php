<!-- Vista de creació de pacients -->
@extends('layouts.app')

@section('title', 'Afegir Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">👥 Afegir Pacient</h2>

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

        @php
            $provincies = [
                'Álava', 'Albacete', 'Alicante', 'Almería', 'Asturias', 'Ávila', 'Badajoz', 'Barcelona',
                'Burgos', 'Cáceres', 'Cádiz', 'Cantabria', 'Castellón', 'Ciudad Real', 'Córdoba', 'Cuenca',
                'Girona', 'Granada', 'Guadalajara', 'Guipúzcoa', 'Huelva', 'Huesca', 'Illes Balears',
                'Jaén', 'La Coruña', 'La Rioja', 'Las Palmas', 'León', 'Lleida', 'Lugo', 'Madrid',
                'Málaga', 'Murcia', 'Navarra', 'Ourense', 'Palencia', 'Pontevedra', 'Salamanca',
                'Santa Cruz de Tenerife', 'Segovia', 'Sevilla', 'Soria', 'Tarragona', 'Teruel',
                'Toledo', 'Valencia', 'Valladolid', 'Vizcaya', 'Zamora', 'Zaragoza'
            ];
        @endphp

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
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">{{ $label }}</label>

                    @if ($name === 'provincia')
                        <select name="provincia" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                            <option value="">-- Selecciona una província --</option>
                            @foreach ($provincies as $provincia)
                                <option value="{{ $provincia }}" @if(old('provincia') == $provincia) selected @endif>
                                    {{ $provincia }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input
                            type="{{ in_array($name, ['email']) ? 'email' : ($name === 'pass' ? 'password' : ($name === 'data_naixement' ? 'date' : 'text')) }}"
                            name="{{ $name }}"
                            value="{{ old($name) }}"
                            class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white"
                            {{ in_array($name, ['nom', 'num_document', 'email', 'pass', 'data_naixement']) ? 'required' : '' }}>
                    @endif
                </div>
            @endforeach
        </div>

        @foreach (['Observacions' => 'observacions', 'Al·lèrgies' => 'alergies', 'Medicaments' => 'medicaments', 'Malalties' => 'malalties', 'Vacunes' => 'vacunes'] as $label => $name)
            <div class="mt-2">
                <label class="block font-semibold text-gray-700 dark:text-gray-300">{{ $label }}</label>
                <textarea name="{{ $name }}" rows="2"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old($name) }}</textarea>
            </div>
        @endforeach

        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn-guardar">
                💾 Guardar
            </button>

            <a href="{{ route('pacients.index') }}"
                class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-green-500 text-white px-4 py-2 rounded font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
