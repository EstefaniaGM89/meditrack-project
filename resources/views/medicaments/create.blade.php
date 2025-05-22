<!-- Vista de creació de pacients -->
@extends('layouts.app')

@section('title', 'Afegir Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">👥 Afegir Pacient</h2>

    <x-alert-errors />

    <form action="{{ route('pacients.store') }}" method="POST" class="space-y-4 max-w-2xl text-gray-800 dark:text-gray-100">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Nom</label>
                <input type="text" name="nom" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Cognoms</label>
                <input type="text" name="cognoms" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Gènere</label>
                <select name="genere" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                    <option value="">-- Selecciona gènere --</option>
                    <option value="Home">Home</option>
                    <option value="Dona">Dona</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Data de naixement</label>
                <input type="date" name="data_naixement" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Telèfon</label>
                <input type="text" name="telefon" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Adreça</label>
                <input type="text" name="adreca" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Ciutat</label>
                <input type="text" name="ciutat" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Codi Postal</label>
                <input type="text" name="codi_postal" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Província</label>
                <select name="provincia" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                    <option value="">-- Selecciona una província --</option>
                    <option value="Barcelona">Barcelona</option>
                    <option value="Girona">Girona</option>
                    <option value="Tarragona">Tarragona</option>
                    <option value="Lleida">Lleida</option>
                    <!-- Puedes añadir más provincias aquí -->
                </select>
            </div>

            <div>
                <label class="block font-semibold">Núm. Document</label>
                <input type="text" name="num_document" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <div>
                <label class="block font-semibold">Mètode de contacte</label>
                <input type="text" name="metode_contacte" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Observacions</label>
            <textarea name="observacions" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Al·lèrgies</label>
            <textarea name="alergies" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Medicaments</label>
            <textarea name="medicaments" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Antecedents</label>
            <textarea name="antecedents" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="2"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Vacunes</label>
            <textarea name="vacunes" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white" rows="2"></textarea>
        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="btn-guardar">
                💾 Guardar
            </button>

            <a href="{{ route('pacients.index') }}"
                class="bg-gray-400 hover:bg-gray-500 dark:bg-gray-700 dark:hover:bg-gray-500 text-white px-4 py-2 rounded flex items-center gap-2 font-semibold">
                Cancel·lar
            </a>
        </div>
    </form>
@endsection
