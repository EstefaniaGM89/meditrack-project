@extends('layouts.app')

@section('title', 'Afegir Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Afegir Pacient</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacients.store') }}" method="POST" class="space-y-4 max-w-2xl">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Nom</label>
                <input type="text" name="nom" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Núm. Document</label>
                <input type="text" name="num_document" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Contrasenya</label>
                <input type="password" name="pass" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Data de naixement</label>
                <input type="date" name="data_naixement" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-semibold">Telèfon</label>
                <input type="text" name="telefon" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Adreça</label>
                <input type="text" name="adreca" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Ciutat</label>
                <input type="text" name="ciutat" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Codi Postal</label>
                <input type="text" name="codi_postal" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Província</label>
                <input type="text" name="provincia" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">País</label>
                <input type="text" name="pais" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-semibold">Mètode de contacte</label>
                <input type="text" name="metode_contacte" class="w-full p-2 border rounded">
            </div>
        </div>

        <div class="mt-6">
            <label class="block font-semibold">Observacions</label>
            <textarea name="observacions" rows="3" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Al·lèrgies</label>
            <textarea name="alergies" rows="2" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Medicaments</label>
            <textarea name="medicaments" rows="2" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Antecedents</label>
            <textarea name="antecedents" rows="2" class="w-full p-2 border rounded"></textarea>
        </div>

        <div class="mt-2">
            <label class="block font-semibold">Vacunes</label>
            <textarea name="vacunes" rows="2" class="w-full p-2 border rounded"></textarea>
        </div>

        {{-- Aquí puedes usar select si tienes tablas para tipus_pacient, metges o tipus_document --}}
        <div class="flex gap-3 mt-6">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('pacients.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Cancel·lar</a>
        </div>
    </form>
@endsection