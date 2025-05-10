@extends('layouts.app')

@section('title', 'Editar Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Editar Pacient</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacients.update', $pacient->id) }}" method="POST" class="space-y-4 max-w-2xl">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $pacient->nom) }}" class="w-full p-2 border rounded"
                    required>
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $pacient->email) }}"
                    class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Contrasenya (només si vols canviar-la)</label>
                <input type="password" name="pass" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Data de naixement</label>
                <input type="date" name="data_naixement" value="{{ old('data_naixement', $pacient->data_naixement) }}"
                    class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Telèfon</label>
                <input type="text" name="telefon" value="{{ old('telefon', $pacient->telefon) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Adreça</label>
                <input type="text" name="adreca" value="{{ old('adreca', $pacient->adreca) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Ciutat</label>
                <input type="text" name="ciutat" value="{{ old('ciutat', $pacient->ciutat) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Codi Postal</label>
                <input type="text" name="codi_postal" value="{{ old('codi_postal', $pacient->codi_postal) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Província</label>
                <input type="text" name="provincia" value="{{ old('provincia', $pacient->provincia) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">País</label>
                <input type="text" name="pais" value="{{ old('pais', $pacient->pais) }}" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Núm. Document</label>
                <input type="text" name="num_document" value="{{ old('num_document', $pacient->num_document) }}"
                    class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Mètode de contacte</label>
                <input type="text" name="metode_contacte" value="{{ old('metode_contacte', $pacient->metode_contacte) }}"
                    class="w-full p-2 border rounded">
            </div>
        </div>

        <div class="mt-6">
            <label class="block font-semibold">Observacions</label>
            <textarea name="observacions" rows="3"
                class="w-full p-2 border rounded">{{ old('observacions', $pacient->observacions) }}</textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Al·lèrgies</label>
            <textarea name="alergies" rows="2"
                class="w-full p-2 border rounded">{{ old('alergies', $pacient->alergies) }}</textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Medicaments</label>
            <textarea name="medicaments" rows="2"
                class="w-full p-2 border rounded">{{ old('medicaments', $pacient->medicaments) }}</textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Antecedents</label>
            <textarea name="antecedents" rows="2"
                class="w-full p-2 border rounded">{{ old('antecedents', $pacient->antecedents) }}</textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Vacunes</label>
            <textarea name="vacunes" rows="2"
                class="w-full p-2 border rounded">{{ old('vacunes', $pacient->vacunes) }}</textarea>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-yellow-700 hover:bg-green-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                💾 Guardar
            </button>

            <a href="{{ route('pacients.index') }}" class="bg-gray-300 px-4 py-2 rounded flex items-center gap-2 font-semibold hover:bg-green-500">Cancel·lar</a>
        </div>
    </form>
@endsection