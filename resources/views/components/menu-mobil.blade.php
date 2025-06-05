{{-- components/menu-mobil.blade.php --}}
<div class="grid grid-cols-2 gap-4 mt-2 mb-6 md:hidden">
    <a href="{{ url('/') }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-indigo-700 font-semibold hover:bg-indigo-50 dark:bg-gray-800 dark:text-indigo-200 dark:hover:bg-indigo-700">
        🏠 Dashboard
    </a>
    <a href="{{ route('personal-sanitari.index') }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-purple-700 font-semibold hover:bg-purple-50 dark:bg-gray-800 dark:text-purple-300 dark:hover:bg-purple-800">
        👩‍⚕️ Personal Sanitari
    </a>
    <a href="{{ route('pacients.index') }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-indigo-700 font-semibold hover:bg-indigo-50 dark:bg-gray-800 dark:text-indigo-200 dark:hover:bg-indigo-700">
        👥 Pacients
    </a>
    <a href="{{ route('medicaments.index') }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-rose-700 font-semibold hover:bg-rose-50 dark:bg-gray-800 dark:text-rose-300 dark:hover:bg-rose-800">
        💊 Medicaments
    </a>
    <a href="{{ route('recordatoris.index') }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-yellow-700 font-semibold hover:bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-yellow-800">
        ⏰ Recordatoris
    </a>
    <a href="{{ route('recordatoris.index', ['filtre' => 'pendents']) }}"
        class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-purple-700 font-semibold hover:bg-purple-50 dark:bg-gray-800 dark:text-purple-300 dark:hover:bg-purple-800">
        🔔 Preses pendents
    </a>
</div>
