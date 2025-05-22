@extends('layouts.app')

@section('title', 'Afegir Pacient')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">👥 Afegir Pacient</h2>

    <x-alert-errors />

    <form action="{{ route('pacients.store') }}" method="POST" class="space-y-4 max-w-2xl text-gray-800 dark:text-gray-100">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nom -->
            <div>
                <label class="block font-semibold">Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Cognoms -->
            <div>
                <label class="block font-semibold">Cognoms</label>
                <input type="text" name="cognoms" value="{{ old('cognoms') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Gènere -->
            <div>
                <label class="block font-semibold">Gènere</label>
                <select name="genere" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                    <option value="">-- Selecciona gènere --</option>
                    <option value="Home" {{ old('genere') == 'Home' ? 'selected' : '' }}>Home</option>
                    <option value="Dona" {{ old('genere') == 'Dona' ? 'selected' : '' }}>Dona</option>
                </select>
            </div>

            <!-- Email -->
            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Data naixement -->
            <div>
                <label class="block font-semibold">Data de naixement</label>
                <input type="date" name="data_naixement" value="{{ old('data_naixement') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Telèfon -->
            <div>
                <label class="block font-semibold">Telèfon</label>
                <input type="text" name="telefon" value="{{ old('telefon') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Adreça -->
            <div>
                <label class="block font-semibold">Adreça</label>
                <input type="text" name="adreca" value="{{ old('adreca') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Ciutat -->
            <div>
                <label class="block font-semibold">Ciutat</label>
                <input type="text" name="ciutat" value="{{ old('ciutat') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Codi Postal -->
            <div>
                <label class="block font-semibold">Codi Postal</label>
                <input type="text" name="codi_postal" value="{{ old('codi_postal') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Província -->
            <div>
                <label class="block font-semibold">Província</label>
                <select name="provincia" class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
                    <option value="">-- Selecciona una província --</option>
                    <option value="A Coruña" {{ old('provincia') == 'A Coruña' ? 'selected' : '' }}>A Coruña</option>
                    <option value="Álava" {{ old('provincia') == 'Álava' ? 'selected' : '' }}>Álava</option>
                    <option value="Albacete" {{ old('provincia') == 'Albacete' ? 'selected' : '' }}>Albacete</option>
                    <option value="Alicante" {{ old('provincia') == 'Alicante' ? 'selected' : '' }}>Alicante</option>
                    <option value="Almería" {{ old('provincia') == 'Almería' ? 'selected' : '' }}>Almería</option>
                    <option value="Asturias" {{ old('provincia') == 'Asturias' ? 'selected' : '' }}>Asturias</option>
                    <option value="Ávila" {{ old('provincia') == 'Ávila' ? 'selected' : '' }}>Ávila</option>
                    <option value="Badajoz" {{ old('provincia') == 'Badajoz' ? 'selected' : '' }}>Badajoz</option>
                    <option value="Barcelona" {{ old('provincia') == 'Barcelona' ? 'selected' : '' }}>Barcelona</option>
                    <option value="Burgos" {{ old('provincia') == 'Burgos' ? 'selected' : '' }}>Burgos</option>
                    <option value="Cáceres" {{ old('provincia') == 'Cáceres' ? 'selected' : '' }}>Cáceres</option>
                    <option value="Cádiz" {{ old('provincia') == 'Cádiz' ? 'selected' : '' }}>Cádiz</option>
                    <option value="Cantabria" {{ old('provincia') == 'Cantabria' ? 'selected' : '' }}>Cantabria</option>
                    <option value="Castellón" {{ old('provincia') == 'Castellón' ? 'selected' : '' }}>Castellón</option>
                    <option value="Ciudad Real" {{ old('provincia') == 'Ciudad Real' ? 'selected' : '' }}>Ciudad Real</option>
                    <option value="Córdoba" {{ old('provincia') == 'Córdoba' ? 'selected' : '' }}>Córdoba</option>
                    <option value="Cuenca" {{ old('provincia') == 'Cuenca' ? 'selected' : '' }}>Cuenca</option>
                    <option value="Girona" {{ old('provincia') == 'Girona' ? 'selected' : '' }}>Girona</option>
                    <option value="Granada" {{ old('provincia') == 'Granada' ? 'selected' : '' }}>Granada</option>
                    <option value="Guadalajara" {{ old('provincia') == 'Guadalajara' ? 'selected' : '' }}>Guadalajara</option>
                    <option value="Guipúzcoa" {{ old('provincia') == 'Guipúzcoa' ? 'selected' : '' }}>Guipúzcoa</option>
                    <option value="Huelva" {{ old('provincia') == 'Huelva' ? 'selected' : '' }}>Huelva</option>
                    <option value="Huesca" {{ old('provincia') == 'Huesca' ? 'selected' : '' }}>Huesca</option>
                    <option value="Illes Balears" {{ old('provincia') == 'Illes Balears' ? 'selected' : '' }}>Illes Balears
                    </option>
                    <option value="Jaén" {{ old('provincia') == 'Jaén' ? 'selected' : '' }}>Jaén</option>
                    <option value="La Rioja" {{ old('provincia') == 'La Rioja' ? 'selected' : '' }}>La Rioja</option>
                    <option value="Las Palmas" {{ old('provincia') == 'Las Palmas' ? 'selected' : '' }}>Las Palmas</option>
                    <option value="León" {{ old('provincia') == 'León' ? 'selected' : '' }}>León</option>
                    <option value="Lleida" {{ old('provincia') == 'Lleida' ? 'selected' : '' }}>Lleida</option>
                    <option value="Lugo" {{ old('provincia') == 'Lugo' ? 'selected' : '' }}>Lugo</option>
                    <option value="Madrid" {{ old('provincia') == 'Madrid' ? 'selected' : '' }}>Madrid</option>
                    <option value="Málaga" {{ old('provincia') == 'Málaga' ? 'selected' : '' }}>Málaga</option>
                    <option value="Murcia" {{ old('provincia') == 'Murcia' ? 'selected' : '' }}>Murcia</option>
                    <option value="Navarra" {{ old('provincia') == 'Navarra' ? 'selected' : '' }}>Navarra</option>
                    <option value="Ourense" {{ old('provincia') == 'Ourense' ? 'selected' : '' }}>Ourense</option>
                    <option value="Palencia" {{ old('provincia') == 'Palencia' ? 'selected' : '' }}>Palencia</option>
                    <option value="Pontevedra" {{ old('provincia') == 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                    <option value="Salamanca" {{ old('provincia') == 'Salamanca' ? 'selected' : '' }}>Salamanca</option>
                    <option value="Santa Cruz de Tenerife" {{ old('provincia') == 'Santa Cruz de Tenerife' ? 'selected' : '' }}>Santa Cruz de Tenerife</option>
                    <option value="Segovia" {{ old('provincia') == 'Segovia' ? 'selected' : '' }}>Segovia</option>
                    <option value="Sevilla" {{ old('provincia') == 'Sevilla' ? 'selected' : '' }}>Sevilla</option>
                    <option value="Soria" {{ old('provincia') == 'Soria' ? 'selected' : '' }}>Soria</option>
                    <option value="Tarragona" {{ old('provincia') == 'Tarragona' ? 'selected' : '' }}>Tarragona</option>
                    <option value="Teruel" {{ old('provincia') == 'Teruel' ? 'selected' : '' }}>Teruel</option>
                    <option value="Toledo" {{ old('provincia') == 'Toledo' ? 'selected' : '' }}>Toledo</option>
                    <option value="Valencia" {{ old('provincia') == 'Valencia' ? 'selected' : '' }}>Valencia</option>
                    <option value="Valladolid" {{ old('provincia') == 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                    <option value="Vizcaya" {{ old('provincia') == 'Vizcaya' ? 'selected' : '' }}>Vizcaya</option>
                    <option value="Zamora" {{ old('provincia') == 'Zamora' ? 'selected' : '' }}>Zamora</option>
                    <option value="Zaragoza" {{ old('provincia') == 'Zaragoza' ? 'selected' : '' }}>Zaragoza</option>
                </select>
            </div>
            <!-- Núm. Document -->
            <div>
                <label class="block font-semibold">Núm. Document</label>
                <input type="text" name="num_document" value="{{ old('num_document') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Mètode de contacte -->
            <div>
                <label class="block font-semibold">Mètode de contacte</label>
                <input type="text" name="metode_contacte" value="{{ old('metode_contacte') }}"
                    class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">
            </div>
        </div>

        <!-- Observacions -->
        <div>
            <label class="block font-semibold">Observacions</label>
            <textarea name="observacions" rows="2"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old('observacions') }}</textarea>
        </div>

        <!-- Al·lèrgies -->
        <div>
            <label class="block font-semibold">Al·lèrgies</label>
            <textarea name="alergies" rows="2"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old('alergies') }}</textarea>
        </div>

        <!-- Medicaments -->
        <div>
            <label class="block font-semibold">Medicaments</label>
            <textarea name="medicaments" rows="2"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old('medicaments') }}</textarea>
        </div>

        <!-- Antecedents -->
        <div>
            <label class="block font-semibold">Antecedents</label>
            <textarea name="antecedents" rows="2"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old('antecedents') }}</textarea>
        </div>

        <!-- Vacunes -->
        <div>
            <label class="block font-semibold">Vacunes</label>
            <textarea name="vacunes" rows="2"
                class="w-full p-2 border rounded dark:bg-gray-800 dark:text-white">{{ old('vacunes') }}</textarea>
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